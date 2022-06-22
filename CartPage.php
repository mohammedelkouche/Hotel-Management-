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
    echo "<pre>";
        print_r($_SESSION['CHECK RATES']);
    echo "</pre>" ;
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
    <title>BOOKER</title>
</head>
<body>
    <?php 
    include('Nav.php');
    foreach($_SESSION['CHECK RATES'] as $key => $value ){
        
        $query = "SELECT room.Label , room.Description , photo.MainImg , room.IdRoom , room.Size , room.OccupancyAdults , room.OccupancyChildren , room.PricePerNight , room.UniqueFeatures , room.Views , room.Beds , room.Bathroom , photo.Image1, photo.Image2
                FROM  photo INNER JOIN room ON photo.IdRoom = room.IdRoom 
                WHERE room.IdRoom = $key ";
                $result = $conn->query( $query) ;
        foreach( $result as $worth){
        ?>
            <div>
                <div><img src="Photo/Room/<?php echo $worth ['MainImg'] ?>" style="width: 15em; height: 10rem;" alt="" ></div>
                <div class="d-flex ">
                    <div>
                        <?php echo $worth["Label"] ; ?>
                    </div>
                    <div>
                    <a href='CartPage.php?remove=<?php echo $worth["IdRoom"] ?>' class="btn btn-primary btn-lg" role="button">DELET</a>
                    <a href='CartPage.php?edit=<?php echo $worth["IdRoom"] ?>' class="btn btn-primary btn-lg" role="button">edit</a>

                        <!-- <button>delet</button> -->

                        <!-- button ou a pour supprimer -->
                        <!-- button ou a pour modifier -->
                    </div>
                </div>
            </div>
            
    <?php 
       }
    }
        include('Footer.php');
    ?>
</body>
</html>