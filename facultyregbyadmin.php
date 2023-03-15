<?php
    include('config.php');


    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    function sendMail($facemail, $password)
    {
      require ("PHPMailer/PHPMailer.php");
      require ("PHPMailer/SMTP.php");
      require ("PHPMailer/Exception.php");
      $mail = new PHPMailer(true);
      try {
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'catechismsystem@gmail.com';                     //SMTP username
        $mail->Password   = 'wswyysdkiwjclidd';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        $mail->setFrom('catechismsystem@gmail.com', 'catechism');
        $mail->addAddress($facemail);    
     //Content
     $mail->isHTML(true);                                  //Set email format to HTML
     $mail->Subject = 'Email Verification From Catechism Management System';
     $mail->Body    = "Welcome to be a part of Catechism Management System.We look forward to ypur services.<br> 
     You can login to the portal using Email=$facemail Password=$password";
    $mail->send();
     return true;
    } catch (Exception $e) {
     // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
     return false;
    }
    }
    


    if(isset($_POST['submit']))
    {
        $facname = $_POST['facname'];
        $facbname = $_POST['facbname'];
        $facgender = $_POST['gender'];
        $fachname = $_POST['fachname'];
        $facmobno = $_POST['facmobno'];
        $facemail = $_POST['facemail'];
        $facdob = $_POST['facdob'];
        // $faclass = $_POST['class'];
        $facdesig = $_POST['desig'];
        $facquali = $_POST['facqual'];
        $facjob = $_POST['facjob'];
        $facfname = $_POST['facfather'];
        $facmname = $_POST['facmother'];
        // $facpassword = $_POST['facpassword'];
        // $facrepassword = $_POST['facrepassword'];

        $password=rand();

        $pass=md5($password);

        $duplicate=mysqli_query($con, "SELECT * from login_table WHERE useremail='$facemail'");
        if(mysqli_num_rows($duplicate)>0)
        {
            echo "<script>  alert('Already Registered'); window.location.href='addnewfaculty.php'; </script>";

        }
        else
        {
            $code=bin2hex(random_bytes(16));
            //$psword = md5($facpassword);password encryption to increase data security
            $query1="insert into login_table (useremail, password, role) VALUES('$facemail','$pass', 2)";
            $result2 = mysqli_query($con, $query1);

            $query3 = "select * from login_table where useremail = '$facemail' and password = '$pass'";
            $result3 = $con->query($query3);
            $uid = $result3->fetch_assoc();
            $uid1 = $uid['userid'];

            $query="insert into adminregisterfaculty (facultyid, facultyname, facultybname, facultygender, facultyhname, 
            facultymobile, facultydob, facultyclass, facultydesig, facultyqualif, facultyjob, facultyfather, 
            facultymother, role) values('$uid1', '$facname', '$facbname', '$facgender', '$fachname', '$facmobno', 
            '$facdob', 0, '$facdesig', '$facquali', '$facjob', '$facfname', '$facmname', 2)";
            
            /*if ($con->query($query1) === TRUE and $con->query($query) === TRUE) */
            $result = mysqli_query($con, $query);
            
            if ($result2 === TRUE and $result === TRUE  && sendMail($facemail, $password))
            {
                echo "<script>  alert('Faculty added.. verification link sended to registered mail.'); window.location.href='addnewfaculty.php'; </script>";
                // header("location: addnewfaculty.php");
            } 
            else 
            {
                echo "Error: " . $query . "<br>" . $con->error;
            }
        } 
    }
        
           
?>