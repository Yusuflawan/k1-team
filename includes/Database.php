<?php

class Database {
    private $dbHost = DB_HOST;
    private $dbName = DB_NAME;
    private $dbUser = DB_USER;
    private $dbPass = DB_PASSWORD;

    private $pdo;
    private $error;

    public function connect(){
        $dsn = 'mysql:host=' . $this->dbHost . ';dbname=' . $this->dbName;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        try {
            $this->pdo = new PDO($dsn, $this->dbUser, $this->dbPass, $options);
           
            return $this->pdo;
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            die("DB connection failed" . $this->error);
        }
    }
}