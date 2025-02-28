<?php

include_once 'includes/config.php';
include_once 'includes/Database.php';


$db = new Database();
$pdo = $db->connect();


function getUser($pdo){
    try {
        $sql = "SELECT * FROM users";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return "Error: " . $e->getMessage();
    }
}

$users = getUser($pdo);
print_r($users);

function insertUser($pdo, $name, $email, $password){
    try {
        $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
    
        $stmt = $pdo->prepare($sql);
        
        // Bind parameters
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    
        // Execute statement
        if($stmt->execute()){
            return "User inserted successfully!";
        } else {
            return "Failed to insert user.";
    }
    } catch (PDOException $e) {
        return "Error: " . $e->getMessage();
    }
}

// insertUser($pdo, "Yusuf", "yusuflawan982@gmail.com", "123");