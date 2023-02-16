<?php
  include 'config.php';
  if(isset($_POST['submit']))
  {
    $email=$_GET['email'];
    $npass=md5($_POST['adminpassword']);
    $cnewpass=md5($_POST['adminpassword1']);
    $token=$_GET['token'];
    if(!empty($token))
    {
        if(!empty($token) && !empty($npass) && !empty($cnewpass))
        {
            $check_token="SELECT verify_token from login_table where verify_token='$token'";
            $check_token_run=mysqli_query($con, $check_token);
            if(mysqli_num_rows($check_token_run)>0)
            {
                if($npass=$cnewpass)
                {
                    $updatepassword="UPDATE login_table SET password='$npass' where verify_token='$token'";
                    $updatepassword_run=mysqli_query($con, $updatepassword);
                    if($updatepassword_run)
                    {
                        echo "<script> alert('Password Updated'); window.location.href='login.php';</script>";
                        
                    }
                }
                else{
                    
                    echo "<script> alert('Password not match'); window.location.href='recover.php';</script>";
                    
                }
            }
        }
        else
        {
            echo "<script> alert('invalid'); </script>";
            
        }
    }
    else
    {
        echo "<script> alert('No token'); </script>";
        
    }
    }
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
                        <li><a href="login.php">Back</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="form">
                <h2>
                    RESET PASSWORD...?
                </h2>
                <form action="#" method="post">
                    <!-- <input type="email" placeholder="Enter registered email ID" id="adminemail" name="adminemail"><br> -->
                    <input type="password" placeholder="Enter new password" id="adminpassword" name="adminpassword"><br>
                    <input type="password" placeholder="Re-enter the above password" id="adminpassword1" name="adminpassword1"><br>
                    <br>
                    <button type="submit" name="submit" id="submit" class="loginbutton">
                        Recover
                    </button>
                    <!--<button class="loginbutton">
                        <a href="admindashboard.html">
                            Login
                        </a>
                    </button>-->
                </form>
            </div>
            
        </div>
    </body>
</html> 


<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>