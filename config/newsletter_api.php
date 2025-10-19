<?php
session_start();

include_once 'database.php';
include_once 'db_operations.php';

$obj = new DbOperations();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {



    // Sanitize input
    $email = htmlspecialchars($_POST['email']);
    $contact_number = htmlspecialchars($_POST['contact_number']);

    // Basic validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "error: Invalid email format.";
        exit;
    }

    if (empty($contact_number)) {
        echo "error: Contact number is required.";
        exit;
    }

    try {

        $sql = "
        CREATE TABLE IF NOT EXISTS newsletter_subscribers (
            id INT AUTO_INCREMENT PRIMARY KEY,
            email VARCHAR(255) NOT NULL,
            contact_number VARCHAR(20) NOT NULL,
            subscribed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        );
        ";

        $conn->exec($sql);


        // Prepare insert query
        $query = "INSERT INTO newsletter_subscribers (email, contact_number) 
                  VALUES (:email, :contact_number)";
        $params = [
            'email' => $email,
            'contact_number' => $contact_number
        ];

        $lastInsertId = $obj->insert($query, $params);

        if ($lastInsertId) {
            $_SESSION['newsletter_data'] = [
                'email' => $email,
                'contact_number' => $contact_number
            ];

            echo "success"; // Can be used in JavaScript for feedback
        } else {
            echo "error: Failed to subscribe.";
        }
    } catch (Exception $e) {
        error_log("Newsletter Error: " . $e->getMessage());
        echo "error: An internal server error occurred.";
    }
} else {
    echo "error: Invalid request method.";
}
?>
