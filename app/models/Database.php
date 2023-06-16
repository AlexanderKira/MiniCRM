<?php
//app/models/database.php

class Database{
    private static $instance = null;

    private $conn; 

    private $host = "localhost";

    private $user = "root";

    private $pass = "";

    private $name = "testcrm";

    private function __construct()
    {
        //$this->conn объект подключения к базе данных
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->name);
        if($this->conn->connect_error){
            die('Ошибка подключения' . $this->conn->connect_error);
        }
    }

    //возвращает сам объект класса 'Database'
    public static function getInstance()
    {
        if(!self::$instance){
            self::$instance = new Database();
        }
        return self::$instance;
    }

    //метод, который возвращает объект подключения к БД
    public function getConnection()
    {
        return $this->conn;
    }

}

?>