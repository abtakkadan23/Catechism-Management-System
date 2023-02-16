<?php
include 'config.php';
use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;
  function send_password_mail($adminemail, $token)
  {
    require ("PHPMailer/PHPMailer.php");
    require ("PHPMailer/SMTP.php");
    require ("PHPMailer/Exception.php");
    $mail = new PHPMailer(true);
    try {
      //Server settings
      //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                   //Enable verbose debug output
      $mail->isSMTP();                                           //Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                      //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                  //Enable SMTP authentication
      $mail->Username   = 'catechismsystem@gmail.com';                //SMTP username
      $mail->Password   = 'wswyysdkiwjclidd';                    //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           //Enable implicit TLS encryption
      $mail->Port       = 465;                                   //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
  
      $mail->setFrom('catechismsystem@gmail.com', 'catechism');
      $mail->addAddress($adminemail);    
  
      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'Password Reset Link';
      $mail->Body    = "Your Password Reset Link
                        <a href='http://localhost/cathechism/recover.php?email=$adminemail&token=$token'>Click Here</a>";
      $mail->send();
      return true;
  } catch (Exception $e) {
      // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      return false;
  }
  }

if(isset($_POST['submit']))
{
    $adminemail=$_POST['adminemail'];
    $token=md5(rand());
    $check_email="SELECT useremail from login_table where useremail='$adminemail'";
    $check_email_run=mysqli_query($con, $check_email);
    if(mysqli_num_rows($check_email_run)>0)
    {
        $row=mysqli_fetch_assoc($check_email_run);
        $update_token="UPDATE login_table SET verify_token='$token' where useremail='$adminemail'";
        $update_token_run=mysqli_query($con,$update_token);
        if($update_token_run)
        {
            send_password_mail($adminemail, $token);
           
            echo "<script> alert('Link is sent to mail'); window.location.href='login.php';</script>";

        }
        else{
            echo "<script> alert('Wrong'); </script>";
        }
    }
    else{
        
        echo "<script> alert('No email found'); window.location.href='forgot.php';</script>";

        
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
                <br><br><br><br><br><br>
                <h2>
                    FORGOT PASSWORD...?
                </h2><br>
                <form action="#" method="post">
                    Enter your registered mail ID.
                    <input type="email" placeholder="Enter Email" id="adminemail" name="adminemail"><br>
                    <br>
                    <button type="submit" name="submit" id="submit" class="loginbutton">
                        Send mail
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