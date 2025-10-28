<?php

class Database
{
    private $pdo = null;
    private $host;
    private $dbname;
    private $user;
    private $pass;


    private function connect()
    {
        $this->host = 'localhost';
        $this->dbname = 'test';
        $this->user = 'root';
        $this->pass = '';
        
        $dsn = "mysql:host={$this->host};dbname={$this->dbname};";

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ];

        try {
            $this->pdo = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            error_log('Connection failed: ' . $e->getMessage());
            $this->pdo = null;
        }
    }

    public function getConnection()
    {
        if ($this->pdo === null) {
            $this->connect();
        }
        return $this->pdo;
    }
}