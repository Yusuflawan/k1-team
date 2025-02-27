<?php

class Database {
    private $dbName = DB_NAME;
    private $dbUser = DB_USER;
    private $dbHost = DB_HOST;
    private $dbPassword = DB_PASSWORD;

    private $dbHandler;
    private $error;

    public function connect(){
        $conn = 'mysql:host='. $this->dbHost. ';dbname='. $this->dbName;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        try {
            $this->dbHandler = new PDO($conn, $this->dbUser, $this->dbPassword, $options); 
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

}



