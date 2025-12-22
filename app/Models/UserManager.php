<?php

require_once __DIR__ . '/../../config/Database.php';

class UserManager
{
    private $conn;
    //Constructor to initialize the database connection
    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    //Function to retrieve a user by their email address
    public function getUserByEmail($email)
    {
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //Function to create a new user
    public function createUser($username, $email, $password)
    {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (username, email, password, created_at) 
                  VALUES (:username, :email, :password, NOW())";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $passwordHash);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}