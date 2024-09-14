<?php

namespace app\Models;

use MongoDB\Driver\Query;
use PDO;
use PDOStatement;
use PDOException;

header("Access-Control-Allow-Origin: *");
date_default_timezone_set(APP_TIMEZONE);

class Model
{
    private PDO $CONNECTION;
    private PDOStatement $QUERY;
    protected $DB_CONNECTION = DB_CONNECTION;
    protected $DB_HOST = DB_HOST;
    protected $DB_PORT = DB_PORT;
    protected $DB_DATABASE = DB_DATABASE;
    protected $DB_USERNAME = DB_USERNAME;
    protected $DB_PASSWORD = DB_PASSWORD;

    protected string $table;
    protected array $fillable;

    public function __construct()
    {
        $this->connection();
    }

    private function connection(): void
    {
        try {
            $db_conexion = $this->DB_CONNECTION;
            $db_host = $this->DB_HOST;
            $db_port = $this->DB_PORT;
            $db_database = $this->DB_DATABASE;
            $db_username = $this->DB_USERNAME;
            $db_password = $this->DB_PASSWORD;
            $db_dns = "$db_conexion:host=$db_host;dbname=$db_database";
            $this->CONNECTION = new PDO($db_dns, $db_username, $db_password);
            $this->CONNECTION->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $e){
            $this->showError('Error de CONEXION', $e);
        }
    }

    public function query($sql): static
    {
        $this->QUERY = $this->CONNECTION->prepare($sql);
        $this->QUERY->setFetchMode(PDO::FETCH_OBJ);
        $this->QUERY->execute();
        return $this;
    }

    public function first(): mixed
    {
        return $this->QUERY->fetch();
    }

    public function get(): array
    {
        $rows = [];
        while($result = $this->QUERY->fetch()){
            $rows[] = $result;
        }
        return $rows;
    }

    public function all(): array
    {
        //select * from prueba;
        $rows = [];
        try {
            $sql = "select * from {$this->table};";
            $rows = $this->query($sql)->get();
        }catch (PDOException $e){
            $this->showError('Error en el Model', $e);
        }
        return $rows;
    }

    public function find($id): mixed
    {
        //SELECT * FROM prueba WHERE id = 1;
        $rows = null;
        try {
            $sql = "select * from {$this->table} WHERE id = {$id};";
            $rows = $this->query($sql)->first();
        }catch (PDOException $e){
            $this->showError('Error en el Model', $e);
        }
        return $rows;
    }

    public function where($column, $operator, $value = null): static
    {
        //SELECT * FROM prueba WHERE nombre = 'yonathan';

        if (is_null($value)){
            $value = $operator;
            $operator = '=';
        }

        try {
            $sql = "select * from {$this->table} WHERE {$column} {$operator} '{$value}';";
            $this->query($sql);
        }catch (PDOException $e){
            $this->showError('Error en el Model', $e);
        }
        return $this;
    }

    public function save($data)
    {
        //INSERT INTO prueba (nombre, apellido) VALUES ('hola', 'tonton');

        $columns = array_values($this->fillable);
        $columns = implode(', ', $columns);

        $values = array_values($data);
        $values = "'". implode("', '", $values). "'";

        try {
            $sql = "INSERT INTO {$this->table} ({$columns}) VALUES ({$values});";
            $this->query($sql);
        }catch (PDOException $e){
            $this->showError('Error en el Model', $e);
        }

        $lastId = $this->CONNECTION->lastInsertId();
        return $this->find($lastId);
    }

    public function update($id, $data)
    {
        //UPDATE prueba SET nombre = 'aaa', apellido = 'bbbb' WHERE  id = 6;

        $fields = [];
        foreach ($data as $key => $value){
            $fields[] = "{$key} = '{$value}'";
        }
        $fields = implode(', ', $fields);

        try {
            $sql = "UPDATE {$this->table} SET {$fields} WHERE  id = {$id}";
            $this->query($sql);
        }catch (PDOException $e){
            $this->showError('Error en el Model', $e);
        }

        return $this->find($id);
    }

    public function delete($id): void
    {
        //DELETE FROM prueba WHERE  id = 33;
        try {
            $sql = "DELETE FROM {$this->table} WHERE  id = {$id};";
            $this->query($sql);
        }catch (PDOException $e){
            $this->showError('Error en el Model', $e);
        }
    }

    protected function showError($title, $e): void
    {
        header('Content-Type: application/json; charset=utf-8');
        $response['result'] = false;
        $response['icon'] = "error";
        $response['title'] = $title;
        $response['message'] = "PDOException {$e->getMessage()}";
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
        exit();
    }

}