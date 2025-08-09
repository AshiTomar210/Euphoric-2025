<?php
session_start();

// Redirect if no data is found
if (!isset($_SESSION['registration_data'])) {
    header('Location: /Euphoric-2025/index.php');
    exit();
}

$data = $_SESSION['registration_data'];

// Logic to check for team info and get event type
$hasTeamInfo = isset($data['teamMembers']) && $data['teamMembers'] !== 'N/A' && !empty(trim($data['teamMembers']));
$eventType = isset($data['eventType']) ? htmlspecialchars($data['eventType']) : 'Event';

// Unset the session data
unset($_SESSION['registration_data']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Complete!</title>
    <link href="https://fonts.googleapis.com/css2?family=Creepster&family=Segoe+UI&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/success.css" />

</head>
<body>

    <div class="registration-container">
        <div class="registration-form">
            <h2>Thank You!</h2>
            <p class="success-message">Your registration has been submitted to the realm.</p>

            <div class="summary-details">
                <div class="summary-item">
                    <span class="summary-label">Category</span>
                    <span class="summary-value event-type-badge event-type-<?php echo strtolower($eventType); ?>">
                        <?php echo $eventType; ?>
                    </span>
                </div>
                <div class="summary-item">
                    <span class="summary-label">Name</span>
                    <span class="summary-value"><?php echo htmlspecialchars($data['name']); ?></span>
                </div>
                <div class="summary-item">
                    <span class="summary-label">Branch</span>
                    <span class="summary-value"><?php echo htmlspecialchars($data['branch']); ?></span>
                </div>
                <div class="summary-item">
                    <span class="summary-label">Email</span>
                    <span class="summary-value"><?php echo htmlspecialchars($data['email']); ?></span>
                </div>
                <div class="summary-item">
                    <span class="summary-label">Events</span>
                    <span class="summary-value"><?php echo htmlspecialchars($data['events']); ?></span>
                </div>
                
                <?php if ($hasTeamInfo): ?>
                <!-- This block only shows if there is team info -->
                <div class="summary-item">
                    <span class="summary-label">Team Members</span>
                    <span class="summary-value"><?php echo htmlspecialchars($data['teamMembers']); ?></span>
                </div>
                <?php endif; ?>
            </div>

            <div class="nav-buttons">
                <a href="/Euphoric-2025/index.php" class="button-link">Return Home</a>
                <a href="includes/register-links.php" class="button-link secondary">Register Another</a>
            </div>
        </div>
    </div>

</body>
</html>