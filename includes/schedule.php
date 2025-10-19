<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule</title>
    <link rel="stylesheet" href="../assets/css/schedule.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="stylesheet" href="../assets/css/dark-mode.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Frijole&display=swap" rel="stylesheet">
     <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
</head>
<body>
    <!-- ✅ Navbar Include -->
  <?php include './navbar.php'; ?>
    <div class="schedule-container">
        <div class="schedule-block">
            <h2>Schedule</h2>
            <table>
                <thead>
                    <tr>
                        <th>Event</th>
                        <th>Date</th>
                        <th>Venue</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Sports events</td>
                        <td>March 27,28, 2025</td>
                        <td>Sports ground</td>
                    </tr>
                    <tr>
                        <td>Cultural events</td>
                        <td>March 29, 2025</td>
                        <td>Open Stage</td>
                    </tr>
                    <tr>
                        <td>Technical events</td>
                        <td>March 29, 2025</td>
                        <td>Auditorium</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
 <script>
   
    fetch("navbarNotForMainPage.html")
        .then(res => res.text())
        .then(data => {
            document.getElementById("navbar-container").innerHTML = data;

            const themeToggle = document.getElementById('theme-toggle');
            const themeIcon = document.getElementById('theme-icon');
            // Apply saved theme on page load
            const savedTheme = localStorage.getItem('theme');
            if (savedTheme === 'dark') {
                document.body.classList.add('dark-mode');
                document.body.classList.remove('light-mode');
                themeIcon.textContent = '☀️';
            } else {
                document.body.classList.remove('dark-mode');
                document.body.classList.add('light-mode');
                themeIcon.textContent = '🌙';
            }
            // Theme toggle event listener
            if (themeToggle && themeIcon) {
                    themeToggle.addEventListener('click', function () {
                        const isDark = document.body.classList.toggle('dark-mode');
                        document.body.classList.toggle('light-mode', !isDark);
                        themeIcon.textContent = isDark ? '☀️' : '🌙';
                        localStorage.setItem('theme', isDark ? 'dark' : 'light');
                    });
            }
        }     
    );

    
    document.addEventListener('DOMContentLoaded', function () {
        const successMessage = document.querySelector('.message.success');
        if (successMessage) {
            setTimeout(function () {
                successMessage.style.opacity = '0';
                setTimeout(function () {
                    successMessage.style.display = 'none';
                }, 300);
            }, 5000);
        }
    });
</script>
<!-- ✅ Footer Include -->
  <?php include './footer.php'; ?>

</body>
</html>