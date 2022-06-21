<?php
    include('Connection.php');
    $sql = "SELECT room.Label , room.Description , photo.MainImg ,room.IdRoom
    FROM  photo INNER JOIN room ON photo.IdRoom = room.IdRoom" ;
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
    <link rel="stylesheet" href="StyleHome.css">
    <link rel="stylesheet" href="StyleNav.css">
    <link rel="stylesheet" href="StyleFooter.css">
    <link rel="stylesheet" href="StyleBookNow.css">
    <title>BOOKER</title>
</head>
<body>
    <?php 
            include('Nav.php');
    ?>
    <div id="div-header-img">
        <h1>Where the world comes to stay</h1>
    </div>
    <div class="d-flex justify-content-evenly check">
        <div class="check-All"><span>Check-in<i class="fa-solid fa-calendar-days"></i></span></div>
        <div class="check-All"><span>Check-out<i class="fa-solid fa-calendar-days"></i></span></div>
        <div class="check-All"><button>Sherch</button></div>
    </div>
    <section id="section">
        <div class="row">
        <?php  
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
        ?>
            <div class="col-sm-12 col-md-6 col-lg-4 imgcard">
                <div class="card" style="width: 22rem; height: 30rem;">
                    <img src="Photo/Room/<?php echo $row ['MainImg'] ;?>" class="card-img-top" alt="">
                    <div class="card-body">
                        <h3 class="card-title"><?php echo $row ['Label'] ;?></h3>
                        <p class="card-text"><?php echo $row ['Description'] ;?></p>
                        <div class="card-button btn">
                            <a href="DetailRoom.php?id=<?php echo $row['IdRoom'];?>">CHECK RATES</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php  
                }
            }
        ?>
            
        </div>
    </section>
    <?php 
        include('Footer.php');
    ?>
</body>
</html>