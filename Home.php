<?php 
    session_start() ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="StyleHome.css">
    <link rel="stylesheet" href="StyleNav.css">
    <link rel="stylesheet" href="StyleFooter.css">
    <title>BOOKER</title>
</head>
<body>
    <!-- Navbar -->   
    <?php 
        include('Nav.php');
    ?> 
    <!-- main -->
        <main>
            <div id="div-header-img">
                <h1>Where the world comes to stay</h1>
                <?php echo" welcom ". $_SESSION['FirstName'] ;
                        // print_r($_SESSION['FirstName']);
                        // var_dump($_SESSION['FirstName']);
                  ?>
            </div>
            <section id="section-about">
                <div class="d-flex">
                    <div>
                        <h2>ABOUT BOOKER</h2>
                        <P> Perfectly situated between the
                            city’s ancient medina and the 
                            cosmopolitan neighbourhoods
                            of the Ville Nouvelle, Four Seasons
                            Resort Marrakech welcomes you
                            with a blissful retreat – 16 hectares
                            (40 acres) filled with Moorish
                            gardens and refreshing pools. 
                            Here, traditional values and
                            contemporary comforts unite.
                            Experience true relaxation at our
                            Moroccan spa, let the kids play in 
                            their very own kasbah, and take in
                            views of the Atlas Mountains from
                            your private terrace.
                        </P>
                    </div>
                    <div id="About-img">
                        <img src="./Photo/image About 1.png" alt="">
                    </div>
                </div>
            </section>
            <section id="visit-rooms">
                <h1>Our selection of rooms and suites</h1>
                <div>
                    <a href="BookNow.php"  id="button-visit-rooms" class="btn btn-lg" role="button">VISIT THE ROOMS</a>

                    <!-- <button id="button-visit-rooms">VISIT THE ROOMS </button> -->
                </div>
            </section>
            <section id="section-garden">
                <h2>DISCOVER THE FABULOUS GARDEN</h2>
                <p> A 20 000 m2 green park teeming with giant palm
                    trees and roses of Pierre de Ronsard, which diffuse
                    their soft and refined scents, century-old olive 
                    trees... nature unfolds without limits.
                    A small green Eden where the lapping of fountains 
                    and rocky waterfalls merge with the song of birds.
                    Not to mention the soothing pools enclosed by two
                    colonnaded galleries and the outdoor lagoon-coloured
                    swimming pool, which stands in the heart of the hotel.
                </p>
                <div class="d-flex justify-content-around galleri">
                    <div><img src="./Photo/galleri 3.jpg" alt=""></div>
                    <div><img src="./Photo/galleri 2.jpg" alt=""></div>
                    <div><img src="./Photo/galleri 1.jpg" alt=""></div>
                </div>
            </section>
            <section id="section-background">
                <h1>Everyone feels at home here in a spirit of simplicity, 
                    to everyone’s delight – and especially the kids!</h1>
            </section>            
        </main>
    <!-- Footer -->
    <?php 
        include('Footer.php');
    ?>
</body>
</html>