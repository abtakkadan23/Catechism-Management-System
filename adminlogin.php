<script type = "text/javascript" >  
    function preventBack() { window.history.forward(); }  
    setTimeout("preventBack()", 0);  
    window.onunload = function () { null };  
</script> 
<?php
    
    include('config.php');
    if(isset($_POST['submit']))
    {  
        $us=mysqli_real_escape_string($con, $_POST['adminemail']);
        $password=mysqli_real_escape_string($con, $_POST['adminpassword']);
        // $query="SELECT * FROM login_table WHERE useremail ='$us'and password='$password'";
        $query="select * from login_table where useremail='".$us."' AND password='".md5($password)."'";
        $res=mysqli_query($con,$query);
        
        if(mysqli_num_rows($res)>0)
        {
            $row = mysqli_fetch_array($res); 
            $_SESSION['authentication'] = true;
            $_SESSION['auth_user'] = [
                'user_id'=>$row['userid'],
                'email'=>$row['useremail'],
                'role'=>$row['role'],
            ];
            
                if($row['role'] == 1)
                {
                    session_start();
                    $_SESSION['email'] = $row['useremail'];
                    header("Location:admindashboard.php");
                    $_SESSION['message']="You are Logged In Successfully";
                }
                elseif($row['role'] == 2 and $row['status'] == 1)
                {
                    session_start();
                    $_SESSION['email'] = $row['useremail'];
                    header("Location:facultydashboard.php");
                    exit(0);
                }
                /*
                elseif($row['role'] == 3)
                {
                    header("Location:studentdashboard.php");
                    exit(0);
                }*/
                else
                {
                    echo "<script>  alert('Invalid user. Contact admin...'); window.location.href='login.php'; </script>";
                }
        }    
        /*      
        if($count == 1){  
            header("Location:admindashboard.php");
        }  
        else{  
            echo "<h1> Login failed. Invalid username or password.</h1>";  
        } 
        */
        else
        {
            $_SESSION['message']="Invalid Email or Password";
            echo '<script type="text/javascript"> alert("invalid user name or password!!")</script>';
            header("Location: login.php");
            exit(0);
        }

    }
?>

