<?php 
include 'config.php';
if(isset($_POST['submit'])){

  $email=mysqli_real_escape_string($con,$_POST['email']);
  $_SESSION["y"]=$email;

  $password=mysqli_real_escape_string($con,$_POST['password']);
  $_SESSION["z"]=$password;

  if (count($errors) == 0) {
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    $password = md5($password); //password matching
    $sel="SELECT * from tbllogin where email='".$email."' AND password='".$password."'";

    $res=$con->query($sel);

if($res->num_rows > 0)
{
    foreach($res as $data)
      {
        $email=$data['email'];
        $password=$data['password'];
        $type=$data['role'];
      }
      $_SESSION['type']="$type";
      

      if($_SESSION['type']=='customer')
      {
        $_SESSION['message']="Welcome";
        header("location:brand.html");
        exit(0);
      }
      elseif($_SESSION['type']=='seller')
      {
        $_SESSION['message']="Welcome Seller";
        header("#");
        exit(0);
      }
      elseif($_SESSION['type']=='admin')
      {
        $_SESSION['message']="Welcome";
        header("location:admindashboard.php");
        exit(0);
      }

}
else
                {
                  
                    $_SESSION['msg']="Access Denied - Invalid username or password. ";
                    echo "<p id='d'>" .$_SESSION['msg']."</p>" ;
                    exit();
                 }
            } 
          }
      }
        $con->close();
 
?>


<!DOCTYPE html>
<html>
    <head>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>Catechism Management System</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <style>
            .error_form
            {
                top: 12px;
                color: rgb(216, 15, 15);
                    font-size: 15px;
                font-weight:bold;
                font-family: Helvetica;
            }
        </style>
        <div class="main">

            <div class="icon">
                <img class="logo" src="Heading.png" alt="CATHECHISM" height="100px" width="560px"> <br><br>
            </div>
            
            <div class="navigation">
                <div class="menu">
                    <ul>
                        <li><a href="index.html">Home</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="form">
                <h2>
                    LOGIN HERE
                </h2>
                <form action="adminlogin.php" method="post">
                    <input type="email" placeholder="Enter Email" id="adminemail" name="adminemail"><br>
                    <input type="password" placeholder="Enter Password" id="adminpassword" name="adminpassword"><br>
                    <br>
                    <center>
                        <span class="error_form" id="captcha_message"></span>
                        <div class="g-recaptcha" data-sitekey="6LehFWskAAAAAOvqcRIdOnUvlcZomUSwTjVLGFnf"></div><br>
                        <a href="forgot.php">Forgot password</a>
                    </center>
                    <button type="submit" name="submit" id="submit" class="loginbutton">
                        Login
                    </button>
                    <!--<button class="loginbutton">
                        <a href="admindashboard.html">
                            Login
                        </a>
                    </button>-->
                    <p class="register"><br>
                        Only users authenticated by the system admin can log in. <br>
                        For any enquiry, contact Admin : 
                        <a href="catechismsystem@gmail.com">catechismsystem@gmail.com</a>
                    </p>
                </form>
            </div>
            
        </div>
        <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <script src="https://code.jquery.com/jquery-3.2.1.js"></script>

        <script type="text/javascript">
 
            $(document).on('click','#submit',function()
            {  
                $("#captcha_message").hide();
                var response = grecaptcha.getResponse();
                if(response.length == 0)
                {
                    $("#captcha_message").html("Please verify you are not a robot");
                    $("#captcha_message").show();
                    return false;
                }
                else
                {
                    $("#captcha_message").hide();
                    return true;
                }
            }
            );
        </script> 
    </body>
</html> 


<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>