<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Euphoric 2025</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/auth.css">
    <link rel="stylesheet" href="./assets/css/dark-mode.css">

    <link href="https://fonts.googleapis.com/css2?family=Frijole&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="auth-container">
        <h2>Sign Up</h2>
        <form action="signup_process.php" method="post" class="auth-form" id="signupForm">
            <label for="signup-name">Name</label>
            <input type="text" id="signup-name" name="name" required>
            <label for="signup-email">Email</label>
            <input type="email" id="signup-email" name="email" required>
            <label for="signup-password">Password</label>
            <input type="password" id="signup-password" name="password" required>
            <label for="signup-confirm-password">Confirm Password</label>
            <input type="password" id="signup-confirm-password" name="confirm_password" required>
            <label for="signup-role">Role</label>
            <select id="signup-role" name="role" required>
                <option value="">Select Role</option>
                <option value="student">Student</option>
                <option value="coordinator">Coordinator</option>
                <option value="admin">Admin</option>
            </select>
            <button type="submit">Sign Up</button>
        </form>
        <div class="google-login-separator"><span>or</span></div>
        <button class="google-login-btn" id="googleSignupBtn" type="button">
            <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" alt="Google icon"> Sign up with Google
        </button>
        <p>Already have an account? <a href="login.php">Login</a></p>
    </div>
    <script>
    // Simple demo: set isAuthenticated on signup
    //document.getElementById('signupForm').addEventListener('submit', function(e) {
       // e.preventDefault();
        // Basic password match check
        //var pwd = document.getElementById('signup-password').value;
        //var cpwd = document.getElementById('signup-confirm-password').value;
        //if (pwd !== cpwd) {
            //alert('Passwords do not match!');
            //return;
        //}
        //localStorage.setItem('isAuthenticated', 'true');
        //window.location.href = 'index.html';
    //});
    document.getElementById('googleSignupBtn').addEventListener('click', function() {
        // Simulate Google signup
        localStorage.setItem('isAuthenticated', 'true');
        window.location.href = 'index.php';
    });
    </script>
</body>
</html>