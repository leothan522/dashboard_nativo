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
    protected bool $softDelete = false;
    protected string $deleted_at = '';

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
        //select * from parametros;
        $rows = [];
        try {
            if ($this->softDelete){
                $this->deleted_at = "WHERE deleted_at IS NULL";
            }
            $sql = "select * from {$this->table} {$this->deleted_at}  {$this->orderBy} {$this->limit};";
            $rows = $this->query($sql)->get();
        }catch (PDOException $e){
            $this->showError('Error en el Model', $e);
        }
        return $rows;
    }

    public function find($id): mixed
    {
        //SELECT * FROM parametros WHERE id = 1;
        $rows = null;
        try {
            if ($this->softDelete){
                $this->deleted_at = "AND deleted_at IS NULL";
            }
            $sql = "select * from {$this->table} WHERE id = ? {$this->deleted_at};";
            $rows = $this->query($sql, [$id])->first();
        }catch (PDOException $e){
            $this->showError('Error en el Model', $e);
        }
        return $rows;
    }

    public function where($column, $operator, $value = 'nullable'): static
    {
        //SELECT * FROM parametros WHERE valor = 'yonathan';
        //valor IS NULL
        //tabla_id IS NOT NULL

        if ($value == 'nullable'){
            $value = $operator;
            $operator = '=';
        }

        try {

            if ($this->softDelete){
                $this->deleted_at = "AND deleted_at IS NULL";
            }

            if (is_null($value)){
                if ($operator == '='){
                    $value = 'IS NULL';
                }else{
                    $value= 'IS NOT NULL';
                }
                $sql = "select * from {$this->table} WHERE {$column} {$value} {$this->deleted_at} {$this->orderBy} {$this->limit};";
                $this->query($sql);
            }else{
                $sql = "select * from {$this->table} WHERE {$column} {$operator} ? {$this->deleted_at} {$this->orderBy} {$this->limit};";
                $this->query($sql, [$value]);
            }
        }catch (PDOException $e){
            $this->showError('Error en el Model', $e);
        }
        return $this;
    }

    public function save($data)
    {
        //INSERT INTO prueba (nombre, apellido) VALUES ('hola', 'tonton');

        $columns = array_values($this->fillable);
        $columns[] = 'created_at';
        $columns = implode(', ', $columns);
        $data[] = getFecha();

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
        //UPDATE parametros SET nombre = 'aaa', apellido = 'bbbb' WHERE  id = 6;
        $data['updated_at'] = getFecha();
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
        //DELETE FROM parametros WHERE  id = 33;
        try {
            if ($this->softDelete){
                $this->update($id, [
                    'deleted_at' => getFecha()
                ]);
            }else{
                $sql = "DELETE FROM {$this->table} WHERE  id = ?;";
                $this->query($sql, [$id]);
            }
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
        //ORDER BY nombre ASC
        if (empty($this->orderBy)){
            if ($opt != 'ASC'){ $opt = 'DESC'; }
            $this->orderBy = "ORDER BY {$column} {$opt}";
        }
        return $this;
    }

    public function onDelete($column, $operator, $value = 'nullable'): static
    {
        //SELECT * FROM parametros WHERE valor = 'yonathan';
        //valor IS NULL
        //tabla_id IS NOT NULL

        if ($value == 'nullable'){
            $value = $operator;
            $operator = '=';
        }

        try {

            $this->deleted_at = "AND deleted_at IS NOT NULL";

            if (is_null($value)){
                if ($operator == '='){
                    $value = 'IS NULL';
                }else{
                    $value= 'IS NOT NULL';
                }
                $sql = "select * from {$this->table} WHERE {$column} {$value} {$this->deleted_at} {$this->orderBy} {$this->limit};";
                $this->query($sql);
            }else{
                $sql = "select * from {$this->table} WHERE {$column} {$operator} ? {$this->deleted_at} {$this->orderBy} {$this->limit};";
                $this->query($sql, [$value]);
            }
        }catch (PDOException $e){
            $this->showError('Error en el Model', $e);
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