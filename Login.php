<?php
    include 'Connection.php' ;
    error_reporting(0) ;
    session_start() ;
    // Registre Form
    if (isset($_POST["REGISTER"])){

            $FirstName = $_POST['FirstName'];
            $LastName = $_POST['LastName'];
            $Adress = $_POST['Adress'];
            $Email = $_POST['Email'];
            $Password = $_POST['Password'];
            $PhonNumber = $_POST['PhonNumber'];
            $sql = "SELECT * FROM client WHERE email='$Email' AND password='$Password' ";
            $result = $conn->query($sql);
            if(!$result->num_rows > 0){
                $insertdata =   "INSERT INTO client (FirstName,LastName,Adress,Email,Password,PhoneNumber) 
                                VALUES ('$FirstName','$LastName','$Adress','$Email','$Password','$PhonNumber')" ;
                $Query =  $conn->query($insertdata);
                if($Query){
                echo " <script>alert('Wow! User Registration Completed.')</script>" ;
                $FirstName = "";
                $LastName = "";
                $Adress = "";
                $Email = "";
                $_POST['Password'] = "";
                $PhonNumber = "";
                }else{
                echo " <script>alert('Woops! Something Wrong Went.')</script>" ;

                }
            }else{
                echo " <script>alert('Woops! Email Already Exists .')</script>" ;

               
            }
    }
    // LOGIN Form
    if (isset($_POST["submit"])){
        $Email = $_POST['Email'];
        $Password = $_POST['Password'];
        $sql = "SELECT * FROM client WHERE Email = '$Email' AND Password ='$Password' " ;
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            $row = $result->fetch_assoc() ;
            $_SESSION['FirstName'] = $row['FirstNameq'] ;
            header("Location: Home.php") ;
        }else{
            echo " <script>alert('Woops! Email or Password is Wrong.')</script>" ;
        }
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
    <link rel="stylesheet" href="StyleNav.css">
    <link rel="stylesheet" href="StyleFooter.css">
    <link rel="stylesheet" href="StyleLogin.css">
    <title>BOOKER</title>
</head>
<body id="body-form">
    
    <?php 
        include('Nav.php');
    ?>
    <div class="row ">
        <div id="div-formlogin" class="col-sm-12 col-md-12 col-lg-6">
            <form action="" method = "POST">
                <h2>ALREADY A MEMBER</h2>
                <fieldset>
                    <div><input type="email" name = "Email" placeholder = "Email" value="<?php echo $Email ;?>" required></div>
                    <div><input type="password" name = "Fassword" placeholder = "password" value="<?php echo $_POST['Password'] ;?>" required></div>
                    <div> <input type="submit" name = "submit" value = "LOGIN" ></div>
                </fieldset>
            </form>    
        </div>
        <div id="div-formregister" class="col-sm-12 col-md-12 col-lg-6"> 
            <form action="" method = "POST">
                <h2> I don't have an account</h2>
                <fieldset>
                    <div><input type="text" name = "FirstName" placeholder = "First Name" value="<?php echo $FirstName ;?>" required></div>
                    <div><input type="text" name = "LastName" placeholder = "Last Name" value="<?php echo $LastName ;?>" required></div>
                    <div><input type="text" name = "Adress" placeholder = "Adress" value="<?php echo $Adress ;?>" required></div>
                    <div><input type="email" name = "Email" placeholder = "Email" value="<?php echo $Email ;?>" required></div>
                    <div><input type="password" name = "Password" placeholder = "Password" value="<?php echo $_POST['Password'] ;?>" required></div>
                    <div><input type="text" name = "PhonNumber" placeholder = "Phon Number" value="<?php echo $PhonNumber ;?>" required></div>
                    <div><input type="submit" name = "REGISTER" value = "REGISTER"></div>
                </fieldset>    
            </form>
        </div>
    </div>    
</body>
</html>