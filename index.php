
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Euphoric 2025</title>
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Frijole&display=swap" rel="stylesheet">
     <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="stylesheet" href="./assets/css/dark-mode.css">

</head>

<body>
    <!-- Loading Screen -->
    <div id="loading-screen">
      <div class="loader">
        <i class="fa-solid fa-spinner"></i>
        <h2 id="loading-text">Ready for the fest<span class="dots"></span></h2>
      </div>
    </div>

    <!-- ✅ Navbar Include -->
  <?php include './navbar.php'; ?>

    <div class="content">
        <h1>Euphoric 2025</h1>
        <div class="slider-container">
            <div class="slider">
                <img src="img/image5.jpg" alt="Image 1">
                <img src="img/image2.jpg" alt="Image 2">
                <img src="img/image3.jpg" alt="Image 3">
                <img src="img/image4.jpg" alt="Image 4">
                <img src="img/image1.jpg" alt="Image 5">
            </div>
            <div class="dots">
                <span class="dot active"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>
        </div>
        <div class="description-block">
            <p>
                Euphoric 2025, hosted by <b>Sanskar Educational Group</b>, is a grand celebration of talent and creativity. Join us from <b> March 27th to March 29th</b> for a weekend filled with thrilling performances, engaging workshops, and unforgettable memories. Experience the vibrant atmosphere and showcase your skills. From captivating stage shows to interactive art installations, Euphoric 2025 offers something for everyone. Dive into a world of inspiration, connect with fellow enthusiasts, and create lasting bonds. Don't miss this opportunity to be part of an extraordinary event. Register now and prepare for an unforgettable experience!
            </p>
        </div>
        <div class="guests-block">
            <h2>Our Guests</h2>
            <div class="guests-row">
                <div class="guest-box">
                    <h3>To be updated...</h3>
                    <!-- <div class = "guest-image-container">
                        <img src="img/darshan.jpg" alt="Guest 1 Image" class="guest-image">
                        </div>
                        <p class="guest-description">
                            A renowned artist with a passion for innovation. Inspiring audiences with their unique vision.
                        </p> -->
                </div>
                <!-- <div class="guest-box">
                        <h3></h3>
                        <div class = "guest-image-container">
                        <img src="img/mohit.jpg" alt="Guest 2 Image" class="guest-image">
                        </div>
                        <p class="guest-description">
                            An expert in the field of technology. Sharing insights and experiences to empower the next generation.
                        </p>
                    </div> -->
            </div>
        </div>
        <!-- <div class="events-block">
            <h2 class="category-heading">Cultural Events</h2>
            <div class="events-row">
                <div class="event-item">Dance</div>
                <div class="event-item">Singing</div>
                <div class="event-item">Poetry</div>
                <div class="event-item">Rangoli</div>
                <div class="event-item">Skit</div>
                <div class="event-item">Nukkad Natak</div>
                <div class="event-item">Mimicry</div>
                <div class="event-item">Musical Instrument</div>
            </div>

            <h2 class="category-heading">Technical Events</h2>
            <div class="events-row">
                <div class="event-item">LAN Gaming</div>
                <div class="event-item">Crossword Puzzle</div>
                <div class="event-item">Extempore</div>
                <div class="event-item">Debate</div>
                <div class="event-item">AD MAD Show</div>
            </div>

            <h2 class="category-heading">Sports Events</h2>
            <div class="events-row">
                <div class="event-item">Cricket</div>
                <div class="event-item">Volleyball</div>
                <div class="event-item">Basketball</div>
                <div class="event-item">Chess</div>
                <div class="event-item">Carrom</div>
                <div class="event-item">400m Relay Race</div>
                <div class="event-item">100m Race</div>
                <div class="event-item">200m Race</div>
                <div class="event-item">Shot Put</div>
                <div class="event-item">Long Jump</div>
                <div class="event-item">Lemon Race</div>
                <div class="event-item">Badminton</div>
                <div class="event-item">Table Tennis</div>
                <div class="event-item">Tug of War</div>
            </div>
        </div> -->
        <div class="events-block">
            <h3>Events</h3>
            <div class="bento-grid">
                <div class="bento-item bento-culture events-block">
                    <h2 class="category-heading">Cultural Events</h2>
                    <ul class="events-row">
                        <li>Dance</li>
                        <li>Singing</li>
                        <li>Poetry</li>
                        <li>Rangoli</li>
                        <li>Skit</li>
                        <li>Nukkad Natak</li>
                        <li>Mimicry</li>
                        <li>Musical Instrument</li>
                    </ul>
                </div>
                <div class="bento-item bento-tech events-block">
                    <h2 class="category-heading">Technical Events</h2>
                    <ul class="events-row">
                        <li>LAN Gaming</li>
                        <li>Crossword Puzzle</li>
                        <li>Extempore</li>
                        <li>Debate</li>
                        <li>AD MAD Show</li>
                    </ul>
                </div>
                <div class="bento-item bento-sports events-block">
                    <h2 class="category-heading">Sports Events</h2>
                    <ul class="events-row">
                        <li>Cricket</li>
                        <li>Volleyball</li>
                        <li>Basketball</li>
                        <li>Chess</li>
                        <li>Carrom</li>
                        <li>400m Relay Race</li>
                        <li>100m Race</li>
                        <li>200m Race</li>
                        <li>Shot Put</li>
                        <li>Long Jump</li>
                        <li>Lemon Race</li>
                        <li>Badminton</li>
                        <li>Table Tennis</li>
                        <li>Tug of War</li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="events-block">
            <div class="register-button-container">
                <a href="includes/register-links.php"> <button class="register-btn">Register Now!!</button></a>
            </div>
        </div>
        <div class="gallery-preview">
            <div class="gallery">
                <h2>Gallery Highlights</h2>
                <div class="gallery-images scrolling-track">
                    <!-- Duplicates for infinite scroll -->
                <!-- <img src="img/nimage1.jpg" alt="Gallery Image 2"> -->
                <img src="img/nimage2.jpg" alt="Gallery Image 1">
                <img src="img/nimage3.jpg" alt="Gallery Image 3">
                <img src="img/nimage4.jpg" alt="Gallery Image 4">
                <img src="img/nimage15.jpg" alt="Gallery Image 6">
                <img src="img/nimage14.jpg" alt="Gallery Image 6">
                <img src="img/nimage5.jpg" alt="Gallery Image 6">
                <img src="img/nimage6.jpg" alt="Gallery Image 5">
                <img src="img/nimage7.jpg" alt="Gallery Image 6">
                <img src="img/nimage8.jpg" alt="Gallery Image 6">
                <img src="img/nimage9.jpg" alt="Gallery Image 6">
                <img src="img/nimage10.jpg" alt="Gallery Image 6">
                <img src="img/nimage11.jpg" alt="Gallery Image 6">
                <img src="img/nimage12.jpg" alt="Gallery Image 6">
                </div>
                <a href="gallery.html" class="view-more-btn">View More</a>
            </div>
        </div>
    </div>

    <button id="backToTop" title="Go to top" aria-label="Scroll to top">⇧</button>
     <!-- ✅ Footer Include -->
  <?php include './footer.php'; ?>
    
    <script src="assets/js/script.js"></script>
</body>

</html>
