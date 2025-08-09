<?php
session_start(); // <-- Add this at the very top

include_once 'database.php';
include_once 'db_operations.php';
$obj = new DbOperations();

if (isset($_POST['form_action']) && $_POST['form_action'] == 'create_msa') {
    // Sanitize and retrieve POST data
    $name = htmlspecialchars($_POST['name']);
    $branch = htmlspecialchars($_POST['branch']);
    $year = htmlspecialchars($_POST['year']);
    $admissionId = htmlspecialchars($_POST['admissionId']);
    $phone = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);
    $events = isset($_POST['culturalEvents']) ? implode(", ", $_POST['culturalEvents']) : 'No events selected';
    $teamMembers = isset($_POST['teamMembers']) ? htmlspecialchars($_POST['teamMembers']) : 'N/A';


    try {
        // Your database insertion logic remains the same
        $query = "INSERT INTO cultural_data (name, branch, year, admissionId, phone, email, events) VALUES (:name, :branch, :year, :admissionId, :phone, :email, :events)";
        $params = ['name' => $name, 'branch' => $branch, 'year' => $year, 'admissionId' => $admissionId, 'phone' => $phone, 'email' => $email, 'events' => $events];

        $lastInsertId = $obj->insert($query, $params);

        if ($lastInsertId) {
            // --- NEW: Store data in session for the success page ---
            $_SESSION['registration_data'] = [
                'name' => $name,
                'email' => $email,
                'events' => $events,
                'branch' => $branch,
                'teamMembers' => isset($_POST['teamMembers']) ? htmlspecialchars($_POST['teamMembers']) : 'N/A',
                'eventType' => 'Cultural'
            ];
            // --- End of new code ---

            echo "success"; // This now acts as a signal for our JavaScript
        } else {
            echo "error: Database insertion failed.";
        }
    } catch (Exception $e) {
        error_log("Database Error: " . $e->getMessage());
        echo "error: An internal server error occurred.";
    }
} else {
    echo "error: Invalid request.";
}
?>