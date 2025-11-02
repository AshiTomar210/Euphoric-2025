<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3x3 Interactive Gallery</title>
    <link rel="stylesheet" href="gallery-styles.css">
    <link rel="stylesheet" href="./assets/css/styles.css">
</head>
<body>
    <!-- ✅ Navbar Include -->
  <?php include './navbar.php'; ?>

    <!-- Gallery Section -->
    <div class="gallery-container">
        <h2>Gallery Highlights</h2>
        <div class="gallery-images">
           
        <img src="img/nimage2.jpg" alt="Image 1">
        <img src="img/nimage3.jpg" alt="Image 2">
        <img src="img/nimage4.jpg" alt="Image 3">
        <img src="img/nimage5.jpg" alt="Image 4">
        <img src="img/nimage6.jpg" alt="Image 5">
        <img src="img/nimage7.jpg" alt="Image 6">
        <img src="img/nimage8.jpg" alt="Image 7">
        <img src="img/nimage9.jpg" alt="Image 8">
        <img src="img/nimage10.jpg" alt="Image 9">
        <img src="img/nimage11.jpg" alt="Image 10">
        <img src="img/nimage12.jpg" alt="Image 11">
        <img src="img/nimage13.jpg" alt="Image 12">
        <img src="img/nimage14.jpg" alt="Image 13">
        <img src="img/nimage15.jpg" alt="Image 14">
        <img src="img/nimage8.jpg" alt="Image 15">

            
        </div>
    </div>

    <!-- Modal / Lightbox -->
    <div id="image-modal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="modal-img">
        <div id="caption"></div>
        <a class="prev">&#10094;</a>
        <a class="next">&#10095;</a>
    </div>

     <!-- ✅ Footer Include -->
  <?php include './footer.php'; ?>

    <!-- JS -->
    <script src="assets/js/gallery.js"></script>
    <script>
       
        fetch("navbar.html")
            .then(res => res.text())
            .then(data => document.getElementById("navbar-container").innerHTML = data);
    </script>
</body>
</html>
