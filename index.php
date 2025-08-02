<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Euphoric 2025</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Frijole&display=swap" rel="stylesheet">
</head>

<body>

    <div id="navbar-container"></div>
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
                <!-- Remove guest-box if you want only "To be updated" -->
                <div class="update-box">
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
        <div class="events-block">
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
        </div>
        <div class="events-block">
            <div class="register-button-container">
                <a href="includes/register-links.php"> <button class="register-btn">Register Now!!</button></a>
            </div>
        </div>
        <div class="gallery-preview">
            <h2>Gallery Highlights</h2>
            <div class="gallery-images scrolling-track">
                <img src="img/image1.jpg" alt="Gallery Image 1">
                <img src="img/image2.jpg" alt="Gallery Image 2">
                <img src="img/image3.jpg" alt="Gallery Image 3">
                <img src="img/image4.jpg" alt="Gallery Image 4">
                <img src="img/image5.jpg" alt="Gallery Image 5">

                <!-- Duplicates for infinite scroll -->
                <img src="img/image1.jpg" alt="Gallery Image 1 Duplicate">
                <img src="img/image2.jpg" alt="Gallery Image 2 Duplicate">
                <img src="img/image3.jpg" alt="Gallery Image 3 Duplicate">
                <img src="img/image4.jpg" alt="Gallery Image 4 Duplicate">
                <img src="img/image5.jpg" alt="Gallery Image 5 Duplicate">
            </div>
            <a href="gallery.html" class="view-more-btn">View More</a>
        </div>
    </div>

    <div id="footer-container"></div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/js/script.js"></script>

</body>

</html>