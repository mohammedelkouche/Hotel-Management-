<?php
    session_start() ;
    include('Connection.php');
    if(isset($_POST["add_to_cart"])){
        // if($_SESSION["shopping cart"]){  
                $id = $_GET['id'];
 
                $_SESSION['cartArray'][$id] = array(
                    'rid' => $id ,
                ) ;      
        // }  
    //     echo "<pre>";
    // print_r($_SESSION['cartArray']);
    // echo "</pre>" ; 
    }
    
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
    foreach($_SESSION['cartArray'] as $key => $value ){
        
        $query = "SELECT room.Label , room.Description , photo.MainImg , room.IdRoom , room.Size , room.OccupancyAdults , room.OccupancyChildren , room.PricePerNight , room.UniqueFeatures , room.Views , room.Beds , room.Bathroom , photo.Image1, photo.Image2
                FROM  photo INNER JOIN room ON photo.IdRoom = room.IdRoom 
                WHERE room.IdRoom = $key";
        $result = mysqli_query( $conn, $query) ;
        foreach( $result as $worth){
    ?>
    <div>
        <div><img src="Photo/Room/<?php echo $worth ['MainImg'] ?>" style="width: 15em; height: 10rem;" alt="" ></div>
        <div>
            <div>
                <?php echo $worth["Label"] ; ?>
            </div>
            <div>
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