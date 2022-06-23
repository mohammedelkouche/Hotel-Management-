<?php
    include 'Connection.php' ;
    error_reporting(0) ;
    session_start() ;
    // if (isset($_POST["LOGOUT"])) {
    //     session_destroy();
    // }
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
            $_SESSION['FirstName'] = $row['FirstName'] ;
            // echo " <script>alert('Woops! YOU ARE CONNECT NOW .')</script>" ;
            header("Location: Home.php") ;
        }else{
            echo " <script>alert('Woops! Email or Password is Wrong.')</script>"; 
        }
    }
    if (isset($_POST["LOGOUT"])){
        if(isset($_SESSION['id'])){
            unset($_SESSION['id']) ;
            // print_r($_SESSION['FirstName']);
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
                        <?php // if(isset($_SESSION['id'])){?>  
                            <!-- <form action="" method="POST">
                                <h2>ALREADY A MEMBER</h2>
                                <fieldset>
                                    <div><input type="email" name = "Email" placeholder = "Email"  ></div>
                                    <div><input type="password" name = "Password" placeholder = "password"  ></div>
                                    <div>
                                        <input type="submit" name = "LOGOUT" value = "LOGOUT" id="LOGOUT" > 
                                    </div>
                                </fieldset>
                            </form>  -->
                        <?php // ; }else{ ?>
                            <form id="myForm" action="" method="POST">
                                <h2>ALREADY A MEMBER</h2>
                                <fieldset>
                                    <div><input type="email" name = "Email" placeholder = "Email"  required></div>
                                    <div><input type="password" name = "Password" placeholder = "password"  required></div>
                                    <div>
                                        <input type="submit" name = "submit" value = "LOGIN" id="LOGIN" >
                                    </div>
                                </fieldset>
                            </form>  
                            <?php // ; } ?>
                    <!-- <a class="link" href="login.php" style="text-decoration:none">login</a> -->

                  
        </div>
        <div id="div-formregister" class="col-sm-12 col-md-12 col-lg-6"> 
            <form action="" method = "POST">
                <h2> I don't have an account</h2>
                <fieldset>
                    <div><input type="text" name = "FirstName" placeholder = "First Name"  required></div>
                    <div><input type="text" name = "LastName" placeholder = "Last Name"  required></div>
                    <div><input type="text" name = "Adress" placeholder = "Adress"  required></div>
                    <div><input type="email" name = "Email" placeholder = "Email"  required></div>
                    <div><input type="password" name = "Password" placeholder = "Password"   required></div>
                    <div><input type="text" name = "PhonNumber" placeholder = "Phon Number"  required></div>
                    <div><input type="submit" name = "REGISTER" value = "REGISTER"></div>
                </fieldset>    
            </form>
        </div>
    </div> 
    <script src="script.js"></script>   
</body>
</html>