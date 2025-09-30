<?php

class Database {
    private $host = "localhost";
    private $db_name = "euphoric_2025";
    private $username = "root";
    private $password = "";
    private $conn = null;
    private $created_db = false;

    public function getConnection() {
        if ($this->conn === null) {
            try {
                // First, try to connect to the specific database
                $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                // If database doesn't exist, create it
                if ($e->getCode() == 1049) {
                    $this->createDatabase();
                } else {
                    die("Connection error: " . $e->getMessage());
                }
            }
        }
        return $this->conn;
    }

    private function createDatabase() {
        try {
            // Connect without specifying database
            $temp_conn = new PDO("mysql:host={$this->host}", $this->username, $this->password);
            $temp_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // Create database
            $temp_conn->exec("CREATE DATABASE IF NOT EXISTS `{$this->db_name}` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
            
            // Now connect to the newly created database
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // Create the lost_and_found table
            $this->createTables();
            
        } catch (PDOException $e) {
            die("Database creation error: " . $e->getMessage());
        }
    }

    private function createTables() {
    // Lost and found table (already present)
     $sql1 = "CREATE TABLE IF NOT EXISTS `lost_and_found` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `title` varchar(150) NOT NULL,
        `description` text NOT NULL,
        `location` varchar(255) NOT NULL,
        `date_found` date DEFAULT NULL,
        `time_found` time DEFAULT NULL,
        `image_path` varchar(255) DEFAULT NULL,
        `contact_info` varchar(255) NOT NULL,
        `status` enum('lost','found') NOT NULL DEFAULT 'lost',
        `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
        PRIMARY KEY (`id`),
        KEY `idx_status` (`status`),
        KEY `idx_created_at` (`created_at`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";

    // Users table
     $sql2 = "CREATE TABLE IF NOT EXISTS `users` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `name` varchar(100) NOT NULL,
        `email` varchar(150) NOT NULL UNIQUE,
        `password` varchar(255) NOT NULL,
        `role` enum('student','coordinator','admin') NOT NULL DEFAULT 'student',
        `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";

    try {
        $this->conn->exec($sql1);
        $this->conn->exec($sql2);
    } catch (PDOException $e) {
        die("Table creation error: " . $e->getMessage());
    }
   }


    // Method to check if connection is valid
    public function isConnected() {
        return $this->conn !== null;
    }

    // Method to get database name
    public function getDatabaseName() {
        return $this->db_name;
    }

    // Method to close connection
    public function closeConnection() {
        $this->conn = null;
    }
}
?>
