<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="../../assets/css/styles.css"> -->
    <style>



        *{
            margin:0;
            padding:0;
            box-sizing: border-box;
        }

    .navbar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  /* border:1px solid black; */
  background-color: rgb(251, 248, 248);
  /* padding: 10px 20px; */
  /* background: var(--bg-color); */
  /* color: var(--text-color); */
  font-family: sans-serif;
  width: 100%;
  border-bottom-width: 4px;
  border-bottom-style: solid;
  border-image: linear-gradient(0.25turn, rgba(255,249,34), rgba(255,0,128), rgba(56,2,155,0));
  border-image-slice: 1;
  border-bottom-right-radius: 10px;
  border-bottom-left-radius: 10px;
  /* position: fixed; */
  /* top: 0; */
  /* left: 0; */
  /* right: 0; */
  /* z-index: 50; */
  /* flex-wrap: wrap; */
  /* box-sizing: border-box; */
}

    .navbar-logo img {
  height: 60px;
  width: auto;
  max-width: 100%;
}

.navbar-links {
  display: flex;
  align-items: center;
  gap: 20px;
  list-style: none;
  margin: 0;
  padding: 0;
}

.navbar-links li:hover{
     border-bottom-width: 2px;
  border-bottom-style: solid;
  border-image: linear-gradient(0.25turn, rgba(255,249,34), rgba(255,0,128), rgba(56,2,155,0));
  border-image-slice: 1;
  border-bottom-right-radius: 2px;
  border-bottom-left-radius: 2px;
}

.navbar-links a {
  text-decoration: none;
  color: var(--link-color);
  padding: 8px 12px;
  border-radius: 5px;
  transition: box-shadow 0.3s;
}
.navbar-links a:hover {
  box-shadow: 0 0 10px 2px var(--accent-color);
}


/* ================= Hamburger ================= */
/* Default hidden */
#menu-trigger {
  display: none;
  font-size: 2em;
  color: var(--accent-color);
  cursor: pointer;
  margin-left: auto;
}

/* Show only on small screens */
@media (max-width: 1000px) {
  #menu-trigger {
    display: block;
  }

  .navbar-links {
    display: none;
    flex-direction: column;
    background: var(--bg-color);
    position: absolute;
    top: 100%;
    left: 0;
    width: 100%;
    padding: 10px 0;
    text-align: center;
  }
  .navbar-links.active {
    display: flex;
  }
  .navbar-links li {
    margin: 10px 0;
  }
  .register-btn {
    margin-left: 0;
  }
}

/* Desktop override */
@media (min-width: 1001px) {
  .navbar-links {
    display: flex !important;
    flex-direction: row;
    position: static;
    background: none;
    padding: 0;
  }
}

/* ================= Buttons ================= */
.register-btn {
  background-image: linear-gradient(#e91e63, #9c27b0);
  border: none;
  color: white;
  font-size: inherit;
  cursor: pointer;
  padding: 8px 15px;
  border-radius: 5px;
  transition: box-shadow 0.3s ease, opacity 0.5s ease;
  animation: blinker 1s linear infinite;
  margin-left: 20px;
  text-align: center;
}
.register-btn:hover {
  box-shadow: 0 0 10px 2px #e91e63;
  background-color: linear-gradient(#e91e63, #9c27b0);
  transform: scale(1.05);
}
@keyframes blinker {
  50% {
    opacity: 0.7;
  }
}



    .hero {
      text-align: center;
      /* margin-bottom: 2rem; */
      margin-top:50px;
      /* border:1px solid black; */
      height:150px;
    }

    .hero h2 {
      font-size: 4.4rem;
      font-weight: 700;
      /* color: var(--accent, #f7ff02); */
      background: -webkit-linear-gradient(#e91e63, #9c27b0);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
      margin-bottom: 0.5rem;
    }

    .hero p {
      font-size: 1.1rem;
      opacity: 0.85;
    }

    .hero-illustration {
      margin: 1.5rem auto;
      width: 250px;
      animation: float 3s ease-in-out infinite;
    }


        .rules-section {
            width:80%;
      margin: auto;
      margin-top:100px;
      padding: 1.5rem;
      border-radius: 18px;
      background: rgba(255,255,255,0.07);
      backdrop-filter: blur(12px);
      box-shadow: 0 8px 30px rgba(0,0,0,0.25);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .rules-section:hover {
      transform: translateY(-6px) scale(1.02);
      box-shadow: 0 12px 35px rgba(0,0,0,0.35);
    }

    .rules-section h3 {
      font-size: 1.6rem;
      display: flex;
      align-items: center;
      gap: 0.6rem;
      margin-bottom: 1rem;
      color: var(--accent, #3498db);
    }

    .rules-section h3 .icon {
      font-size: 1.8rem;
      animation: bounce 2s infinite;
    }

    .rules-section ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .rules-section li {
  margin: 0.6rem 0;
  height:60px;
  padding: 0.6rem 1rem;
  border-left: 4px solid var(--accent, #3498db);
  border-radius: 25px; /* cylindrical */
  background: rgba(0,0,0,0.05);
  cursor: pointer;
  transition: all 0.3s ease;
  color: inherit;
}

/* When hovered */
.rules-section li:hover {
  background: var(--accent, #3498db);
  color: #fff;
  transform: scale(1.05);
  box-shadow: 0 4px 15px rgba(0,0,0,0.3);
}

/* Ensure link text also changes */
.rules-section li a {
  text-decoration: none;
  font-size:24px;
  margin-top:8px;
  margin-left:20px;
  color: inherit;
  display: block; /* link fills whole li */
  width: 100%;
  height: 100%;
}

.rules-section li:hover a {
  color: #fff;
}

    .rules-section a {
      text-decoration: none;
      color: inherit;
      font-weight: 500;
    }

    /* Animations */
    @keyframes fadeIn {
      from {opacity: 0; transform: translateY(30px);}
      to {opacity: 1; transform: translateY(0);}
    }

    @keyframes bounce {
      0%, 100% {transform: translateY(0);}
      50% {transform: translateY(-5px);}
    }

    @keyframes float {
      0%, 100% {transform: translateY(0);}
      50% {transform: translateY(-12px);}
    }

    .theme-toggle img{
        width:30px;
        height:30px;
        background-color: transparent;
        border:none;
    }

    .theme-toggle{
        border:none;
        background-color: transparent;
        cursor:pointer;
    }

    body.dark-mode {
        background: linear-gradient(135deg, #2c3e50, #4b0082);
    }

    .navbar.dark-mode {
        background: rgba(44, 62, 80, 0.95);
    }

    .dark-toggle {
  background: none;
  border: none;
  font-size: 1.5rem;
  cursor: pointer;
  color: inherit;
  margin-left: 15px;
}

/* Dark Mode Styles */
body.dark-mode {
  background-color: #121212;
  color: #e0e0e0;
}

body.dark-mode .navbar {
  background-color: #1f1f1f;
  color: #e0e0e0;
}

body.dark-mode .nav-links a {
  color: #e0e0e0;
}

body.dark-mode .nav-links a.active {
  color: #90caf9;
}

body.dark-mode .login-modal {
  background-color: rgba(30, 30, 30, 0.95);
}

body.dark-mode .login-content {
  background-color: #2a2a2a;
  color: #fff;
}

body.dark-mode .login-form input {
  background-color: #444;
  color: #fff;
  border: 1px solid #666;
}

body.dark-mode .login-form button {
  background-color: #2196f3;
  color: white;
}

body.dark-mode .feature-card {
  background-color: #2c2c2c;
  color: #eee;
  border: 1px solid #444;
}

body.dark-mode footer {
  background-color: #1a1a1a;
  color: #ccc;
}

body.dark-mode .footer-section a {
  color: #90caf9;
}

body.dark-mode .footer-bottom {
  border-top: 1px solid #444;
}

    </style>
</head>
<body>

    <nav class="navbar">
    <div class="navbar-logo">
        <img src="../img/clg logo.jpg" alt="Logo">
    </div>
    <span id="menu-trigger">&#9776;</span>
    <ul class="navbar-links">
        <li><a href="../../index.php">Home</a></li>
        <li><a href="../schedule.php">Schedule</a></li>
        <li><a href="../coordinators.php">Coordinators</a></li>
        <li><a href="../rules.php">Rules</a></li>
        <li><a href="./event_listing.php">Events</a></li>
        <li><a href="../lost-and-found.php">Lost & Found</a></li>
        <a href="../register-links.php"><button class="register-btn">Register</button></a>
        <button class="theme-toggle"><img src="../../img/themes.png" alt="theme toggle"></button>
    </ul>
</nav>

    <!-- Hero Section -->
    <div class="hero">
      <h2>Events Listing</h2>
      <p>Stay informed, don't miss the deadline, and enjoy the events responsibly </p>
    </div>

    <!-- Cultural Events -->
    <div class="rules-section">
      <h3><span class="icon">🎭</span> Cultural Events</h3>
      <ul>
        <li><a href="#">Dance (solo & group)</a>
        </li>
        <li><a href="#">Singing (solo & group)</a></li>
        <li><a href="#">Rangoli</a></li>
        <li><a href="#">Nukkad Natak</a></li>
        <li><a href="#">Skit</a></li>
        <li><a href="#">Poetry</a></li>
        <li><a href="#">Mimicry</a></li>
        <li><a href="#">Musical Instrument</a></li>
      </ul>
    </div>

    <!-- Technical Events -->
    <div class="rules-section">
      <h3><span class="icon">⚙️</span> Technical Events</h3>
      <ul>
        <li><a href="#">LAN Game</a></li>
        <li><a href="#">Crossword Puzzle</a></li>
        <li><a href="#">Extempore</a></li>
        <li><a href="#">Debate</a></li>
        <li><a href="#">Ad Mad Show</a></li>
      </ul>
    </div>

    <!-- Sports Events -->
    <div class="rules-section">
      <h3><span class="icon">🏆</span> Sports Events</h3>
      <ul>
        <li><a href="#">Cricket</a></li>
        <li><a href="#">Volleyball</a></li>
        <li><a href="#">Basketball</a></li>
        <li><a href="#">Shot Put</a></li>
        <li><a href="#">Race</a></li>
        <li><a href="#">Tug of War</a></li>
        <li><a href="#">Badminton</a></li>
        <li><a href="#">Chess</a></li>
        <li><a href="#">Carrom</a></li>
        <li><a href="#">Long Jump</a></li>
        <li><a href="#">Lemon Race</a></li>
        <li><a href="#">Table Tennis</a></li>
      </ul>
    </div>

  </div>

</body>
<script src="./event.js" defer></script>
</html>