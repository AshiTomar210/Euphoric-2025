<?php
$page = 'technical-form';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technical Registration</title>
    <link rel="stylesheet" href="assets/css/register-styles.css">
    <link rel="stylesheet" href="assets/lib/toast-simple-notify/simple-notify.min.css" />
    <script src="assets/lib/jquery/jquery.min.js"></script>
    <link rel="stylesheet" href="assets/lib/toast-simple-notify/simple-notify.min.css" />
</head>
<body>
    <div class="registration-container">
        <div class="registration-form">
            <h2>Technical Registration</h2>
            <form id="registrationForm">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="branch">Branch:</label>
                    <input type="text" id="branch" name="branch">
                </div>
                <div class="form-group">
                    <label for="year">Year:</label>
                    <input type="number" id="year" name="year">
                </div>
                <div class="form-group">
                    <label for="admissionId">Admission ID:</label>
                    <input type="text" id="admissionId" name="admissionId">
                </div>
                <div class="form-group">
                    <label for="phone">Contact Number:</label>
                    <input type="tel" id="phone" name="phone">
                </div>
                <div class="form-group">
                    <label for="email">Email ID:</label>
                    <input type="email" id="email" name="email">
                </div>
                <div class="form-group">
                    <label>Technical Events:</label>
                    <div class="event-checkboxes">
                        <label><input type="checkbox" name="technicalEvents[]" value="LAN Game">LAN Game</label>
                        <label><input type="checkbox" name="technicalEvents[]" value="Crossword puzzle">Crossword puzzle</label>
                        <label><input type="checkbox" name="technicalEvents[]" value="Extempore">Extempore</label>
                        <label><input type="checkbox" name="technicalEvents[]" value="Debate">Debate</label>
                    </div>
                </div>
                
                <div class="team-submission">
                    <div class="team-note-box">
                        <p class="team-note">Only the team captain is authorized to fill out the form for team events.</p>
                    </div>
                    <div class="team-events">
                        <label><input type="checkbox" name="technicalEvents[]" value="AD MAD Show">AD MAD Show</label>
                    </div>
                    <div class="team-members">
                        <label for="teamMembers">Team Members Names:</label>
                        <textarea id="teamMembers" name="teamMembers"></textarea>
                    </div>
                </div>
                <input type="hidden" name="form_action" id="form_action" value="create_msa">
                <div class="submit-button-container">
                    <button type="submit" class="register-btn">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <script src="assets/js/techvalidation.js"></script>
    <script src="assets/js/techajax.js"></script>
    <script src="assets/lib/toast-simple-notify/simple-notify.min.js"></script>
</body>
</html>