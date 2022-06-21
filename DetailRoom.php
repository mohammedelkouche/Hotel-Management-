<?php
    $Shop = $_GET["id"];
    include('Connection.php');
    $sql = "SELECT room.Label , room.Description , photo.MainImg
    -- FROM  photo INNER JOIN room ON photo.IdRoom = room.IdRoom 
    FROM  photo INNER JOIN room ON photo.$Shop = room.$Shop
    " ;
    $result = $conn->query($sql) ;
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
        if($result->num_rows > 0){
            $row = $result->fetch_assoc()
        ?>
    <div id="div-header-img">
        <img src="Photo/Room/<?php echo $row ['MainImg'] ?>" alt="">
    </div>
    <section id="section">
        <div class="">
        <!-- <div class="card-button"><a href="DetailRoom.php?id=<?php echo $row["IdRoom"] ;?>" class="btn">CHECK RATES</a></div> -->

            <a href="" class="btn btn-primary btn-lg" role="button">CHECK RATES</a>
        </div>
        <div class="container-fluid">
            <ul>
                <li>Label : <?php echo $row["Label"] ; ?></li>
                <li>Description : <?php echo $row["Description"] ; ?></li>
                <li>Size : <?php echo $row["Size"] ; ?></li>
                <li>OccupancyAdults : <?php echo $row["OccupancyAdults"] ; ?></li>
                <li>OccupancyChildren : <?php echo $row["OccupancyChildren"] ; ?></li>
                <li>PricePerNight : <?php echo $row["PricePerNight"] ; ?></li>
                <li>UniqueFeatures : <?php echo $row["UniqueFeatures"] ; ?></li>
                <li>Views : <?php echo $row["Views"] ; ?></li>
                <li>Beds : <?php echo $row["Beds"] ; ?></li>
                <li>Bathroom : <?php echo $row["Bathroom"] ; ?></li>
            </ul>
        <?php  
            }
        ?>
            
        </div>
    </section>
    <?php 
        include('Footer.php');
    ?>
</body>
</html>