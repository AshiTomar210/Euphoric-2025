<?php
$page = 'cultural-form';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cultural Registration</title>
    <link rel="stylesheet" href="./assets/css/register-styles.css">
    <link rel="stylesheet" href="./assets/lib/toast-simple-notify/simple-notify.min.css" />
    <script src="assets/lib/jquery/jquery.min.js"></script>
    <link rel="stylesheet" href="assets/lib/toast-simple-notify/simple-notify.min.css" />

</head>
<body>
    <div class="registration-container">
        <div class="registration-form">
            <h2>Cultural Registration</h2>
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
                    <label>Cultural Events:</label>
                    <div class="event-checkboxes">
                        <label><input type="checkbox" name="culturalEvents[]" value="Dance"> Dance</label>
                        <label><input type="checkbox" name="culturalEvents[]" value="Singing"> Singing</label>
                        <label><input type="checkbox" name="culturalEvents[]" value="Mimicry"> Mimicry</label>
                        <label><input type="checkbox" name="culturalEvents[]" value="Poetry"> Poetry</label>
                        <label><input type="checkbox" name="culturalEvents[]" value="Musical Instrument"> Musical Instrument</label>
                    </div>
                </div>
                
                <div class="team-submission">
                    <div class="team-note-box">
                        <p class="team-note">Only the team captain is authorized to fill out the form for team events.</p>
                    </div>
                    <div class="team-events">
                        <label><input type="checkbox" name="culturalEvents[]" value="Rangoli"> Rangoli</label>
                        <label><input type="checkbox" name="culturalEvents[]" value="Dance"> Dance(group)</label>
                        <label><input type="checkbox" name="culturalEvents[]" value="Singing"> Singing<br>(group)</label>
                        <label><input type="checkbox" name="culturalEvents[]" value="Nukkad Natak"> Nukkad Natak</label>
                        <label><input type="checkbox" name="culturalEvents[]" value="Skit"> Skit</label>                       
                    </div>
                    <div class="team-members">
                        <label for="teamMembers">Team Members Names:</label>
                        <textarea id="teamMembers" name="teamMembers"></textarea>
                    </div>
                </div>


                <input type="hidden" name="form_action" id="form_action" value="create_msa">
                <div class="submit-button-container">
                    <button type="submit" name="register-btn" id="register-btn" class="register-btn">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <script src="assets/js/validation.js"></script>
    <script src="assets/js/msa-form.js"></script>
    <script src="assets/lib/toast-simple-notify/simple-notify.min.js"></script>
</body>
</html>