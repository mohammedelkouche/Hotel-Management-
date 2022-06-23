<?php
    session_start() ;
    include('Connection.php');
    if(isset($_POST["add_to_cart"])){
        // if($_SESSION["CHECK RATES"]){  
                $id = $_GET['id'];
                $_SESSION['CHECK RATES'][$id] = array(
                    'rid' => $id 
                );
        // }       
    }
    if(isset($_GET['remove'])){
        $remove = $_GET['remove'] ;
        unset($_SESSION['CHECK RATES'][$remove]);
        header("location:CartPage.php");
    }
    // echo "<pre>";
    //     print_r($_SESSION['CHECK RATES']);
    // echo "</pre>" ;
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
    <!-- <link rel="stylesheet" href="StyleHome.css"> -->
    <link rel="stylesheet" href="StyleNav.css">
    <link rel="stylesheet" href="StyleFooter.css">
    <link rel="stylesheet" href="StyleCart.css">
    <title>BOOKER</title>
</head>
<body>
    <?php 
        include('Nav.php');
    ?>
    <div id="title-page">
        <h2>YOUR RESERVATION</h2>
    </div>
    <section>

        <?php 
        foreach($_SESSION['CHECK RATES'] as $key => $value ){
            
            $query = "SELECT room.Label , room.Description , photo.MainImg , room.IdRoom , room.Size , room.OccupancyAdults , room.OccupancyChildren , room.PricePerNight , room.UniqueFeatures , room.Views , room.Beds , room.Bathroom , photo.Image1, photo.Image2
                    FROM  photo INNER JOIN room ON photo.IdRoom = room.IdRoom 
                    WHERE room.IdRoom = $key ";
                    $result = $conn->query( $query) ;
            foreach( $result as $worth){
            ?>
                <div class="d-flex  room-booking border border-2 rounded-2">
                    <div><img class="rounded-3 m-1" src="Photo/Room/<?php echo $worth ['MainImg'] ?>" style="width: 15em; height: 10rem;" alt="" ></div>
                    <div class="d-flex ">
                        <div class="borer border-2 text-center mx-1 mt-4 text-muted text-lowercase ">
                          <h4><?php echo $worth["Label"] ; ?></h4>  
                        </div>
                        <div class="action-button text-center mx-4 mt-4">
                            <div><a href='CartPage.php?remove=<?php echo $worth["IdRoom"] ?>' class="btn p-2 m-1 btn-danger fw-bold" role="button">DELET</a></div>
                            <div><a href='CartPage.php?edit=<?php echo $worth["IdRoom"] ?>' class="btn p-2 m-1 btn-secondary fw-bold" role="button">edit</a></div>
                        </div>
                    </div>
                </div>
        <?php 
        }
        }
        ?>
    </section>
    <?php 
        include('Footer.php');
    ?>
</body>
</html>