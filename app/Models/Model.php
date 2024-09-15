<?php

namespace app\Models;

use JetBrains\PhpStorm\NoReturn;
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

    protected string $limit = '';

    protected string $orderBy = '';

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

    public function query($sql, $data = []): static
    {
        if ($data){
            $stmt = $this->CONNECTION->prepare($sql);
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            for ($i = 0; $i < count($data); $i++){
                $stmt->bindParam($i + 1, $data[$i]);
            }
            $stmt->execute();
            $this->QUERY = $stmt;
        }else{
            $this->QUERY = $this->CONNECTION->prepare($sql);
            $this->QUERY->setFetchMode(PDO::FETCH_OBJ);
            $this->QUERY->execute();
        }
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

    public function count(): int
    {
        return $this->QUERY->rowCount();
    }

    public function all(): array
    {
        //select * from prueba;
        $rows = [];
        try {
            $sql = "select * from {$this->table} {$this->orderBy} {$this->limit};";
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
            $sql = "select * from {$this->table} WHERE id = ?;";
            $rows = $this->query($sql, [$id])->first();
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
            $sql = "select * from {$this->table} WHERE {$column} {$operator} ? {$this->orderBy} {$this->limit};";
            $this->query($sql, [$value]);
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

        try {
            $sql = "INSERT INTO {$this->table} ({$columns}) VALUES (".str_repeat('?, ', count($data) - 1)."?);";
            $this->query($sql, $data);
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
            $fields[] = "{$key} = ?";
        }
        $fields = implode(', ', $fields);

        try {
            $sql = "UPDATE {$this->table} SET {$fields} WHERE  id = ?";
            $values = array_values($data);
            $values[] = $id;
            $this->query($sql, $values);
        }catch (PDOException $e){
            $this->showError('Error en el Model', $e);
        }

        return $this->find($id);
    }

    public function delete($id): void
    {
        //DELETE FROM prueba WHERE  id = 33;
        try {
            $sql = "DELETE FROM {$this->table} WHERE  id = ?;";
            $this->query($sql, [$id]);
        }catch (PDOException $e){
            $this->showError('Error en el Model', $e);
        }
    }

    public function limit(int $limit): static
    {
        //LIMIT 1000;
        if (empty($this->limit)){
            $this->limit = "LIMIT {$limit}";
        }
        return $this;
    }

    public function orderBy($column, $opt = 'ASC'): static
    {
        if (empty($this->orderBy)){
            if ($opt != 'ASC'){ $opt = 'DESC'; }
            $this->orderBy = "ORDER BY {$column} {$opt}";
        }
        return $this;
    }

    #[NoReturn] protected function showError($title, $e): void
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