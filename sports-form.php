<?php
$page = 'sports-form';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports Registration</title>
    <link rel="stylesheet" href="assets/css/register-styles.css">
    <link rel="stylesheet" href="assets/lib/toast-simple-notify/simple-notify.min.css" />
    <script src="assets/lib/jquery/jquery.min.js"></script>
    <link rel="stylesheet" href="assets/lib/toast-simple-notify/simple-notify.min.css" />

</head>
<body>
    <div class="registration-container">
        <div class="registration-form">
            <h2>Sports Registration</h2>
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
                    <label>Sports Events:</label>
                    <div class="event-checkboxes">
                       
                        <label><input type="checkbox" name="sportsEvents[]" value="shotput">Shot Put</label>
                        <label><input type="checkbox" name="sportsEvents[]" value="smallrace">100m race</label>
                        <label><input type="checkbox" name="sportsEvents[]" value="longrace">200m race</label>
                        <label><input type="checkbox" name="sportsEvents[]" value="badminton">Badminton</label>
                        <label><input type="checkbox" name="sportsEvents[]" value="chess">Chess</label>
                        <label><input type="checkbox" name="sportsEvents[]" value="carrom">Carrom</label>
                        <label><input type="checkbox" name="sportsEvents[]" value="longjump">Long Jump</label>
                        <label><input type="checkbox" name="sportsEvents[]" value="lemonrace">Lemon race</label>
                        <label><input type="checkbox" name="sportsEvents[]" value="tabletennis">Table Tennis</label>
                    </div>
                </div>

                <!-- team submission -->

                <div class="team-submission">
                    <div class="team-note-box">
                    <p class="team-note">Only the team captain is authorized to fill out the form for team events.</p>
                    </div>
                    <div class="team-events">
                        <label><input type="checkbox" name="sportsEvents[]" value="cricket">Cricket</label>
                        <label><input type="checkbox" name="sportsEvents[]" value="volleyball">Volleyball</label>
                        <label><input type="checkbox" name="sportsEvents[]" value="basketball">Basketball</label>
                        <label><input type="checkbox" name="sportsEvents[]" value="tugofwar">Tug of war</label>
                        <label><input type="checkbox" name="sportsEvents[]" value="relayrace">400m Relay Race</label>
                    </div>
                    <div class="team-members">
                        <label for="teamMembers">Team Members Names:</label>
                        <textarea id="teamMembers" name="teamMembers"></textarea>
                    </div>
                </div>
                <input type="hidden" name="form_action" id="form_action" value="create_msa">
                <!-- button -->
                <div class="submit-button-container">
                    <button type="submit" class="register-btn">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <script src="assets/js/sportsvalidation.js"></script>
    <script src="assets/js/sportsajax.js"></script>
    <script src="assets/lib/toast-simple-notify/simple-notify.min.js"></script>
</body>
</html>