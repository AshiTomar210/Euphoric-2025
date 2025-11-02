<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Euphoric 2025</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/auth.css">
    <link href="https://fonts.googleapis.com/css2?family=Frijole&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        #login-email, #login-password{
            background-color: grey;
        }
        button[type='submit']{
            background-color: whitesmoke;
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <h2>Login</h2>
        <form action="login_process.php" method="post" class="auth-form" id="loginForm">
            <label for="login-email">Email</label>
            <input type="email" id="login-email" name="email" required>
            <label for="login-password">Password</label>
            <input type="password" id="login-password" name="password" required>
            <button type="submit">Login</button>
        </form>
        <div class="google-login-separator"><span>or</span></div>
        <button class="google-login-btn" id="googleLoginBtn" type="button">
            <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" alt="Google icon"> Login with Google
        </button>
        <p>Don't have an account? <a href="signup.html">Sign up</a></p>
    </div>
    <script>
    // Simple demo: set isAuthenticated on login
    /* document.getElementById('loginForm').addEventListener('submit', function(e) {
        e.preventDefault();
        // You can add real validation here
        localStorage.setItem('isAuthenticated', 'true');
        window.location.href = 'index.php';
    }); */
    document.getElementById('googleLoginBtn').addEventListener('click', function() {
        // Simulate Google login
        localStorage.setItem('isAuthenticated', 'true');
        window.location.href = 'index.php';
    });
    </script>
</body>
</html>