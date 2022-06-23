<?php
    $Shop = $_GET["id"];
    include('Connection.php');
    $sql = "SELECT room.Label , room.Description , photo.MainImg , room.IdRoom , room.Size , room.OccupancyAdults , room.OccupancyChildren , room.PricePerNight , room.UniqueFeatures , room.Views , room.Beds , room.Bathroom , photo.Image1, photo.Image2
            FROM  photo INNER JOIN room ON photo.IdRoom = room.IdRoom 
            WHERE room.IdRoom = $Shop" ;
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
    <link rel="stylesheet" href="StyleDetailRoom.css">
    <title>BOOKER</title>
</head>
<body>
    <?php 
        include('Nav.php');
        if($result->num_rows > 0){
            $row = $result->fetch_assoc()
        ?>
    <div id="div-header-img">
        <img id="detail-img" src="Photo/Room/<?php echo $row ['MainImg'] ?>" alt="">
    </div>
    <section id="section">
            <form action="CartPage.php?id=<?php echo $row['IdRoom'];?>" method = "POST" >
                <div class="div-submit-btn">
                <!-- <div id="button-addtocart"> -->
                    <input type="submit" id="button-add" name="add_to_cart" value = "CHECK RATES" class="btn btn-lg">
                <!-- </div> -->
                </div>
            </form>
        <div  class="container-fluid ">
            <ul >
                <li><span>Label</span>  : <?php echo $row["Label"] ; ?></li>
                <li><span>Description</span> : <?php echo $row["Description"] ; ?></li>
                <li><span>Size</span> : <?php echo $row["Size"] ; ?></li>
                <li><span>OccupancyAdults</span> : <?php echo $row["OccupancyAdults"] ; ?></li>
                <li><span>OccupancyChildren</span> : <?php echo $row["OccupancyChildren"] ; ?></li>
                <li><span>PricePerNight</span> : <?php echo $row["PricePerNight"] ." DH" ; ?></li>
                <li><span>UniqueFeatures</span> : <?php echo $row["UniqueFeatures"] ; ?></li>
                <li><span>Views</span> : <?php echo $row["Views"] ; ?></li>
                <li><span>Beds</span> : <?php echo $row["Beds"] ; ?></li>
                <li><span>Bathroom</span> : <?php echo $row["Bathroom"] ; ?></li>
            </ul>
        </div>
        <div class="row d-flex gallery"  > 
            <div class="col-sm-12 col-md-6 col-lg-6 rounded-2 "><img  src="Photo/Room/<?php echo $row ['Image1'] ?>" alt="" style="width: 30em; height: 22rem;"></div>
            <div class="col-sm-12 col-md-6 col-lg-6 "><img src="Photo/Room/<?php echo $row ['Image2'] ?>" alt="" style="width: 30rem; height: 22rem;"></div>
        </div>
        <?php  
            }
        ?>
            
    </section>
    <?php 
        include('Footer.php');
    ?>
</body>
</html>