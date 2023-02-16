<?php
include 'config.php';

if(isset($_GET['email']) && isset($_GET['code']))
{
    $e=$_GET['email'];
    $c=$_GET['code'];
    $query="SELECT * from login_table where useremail='$e' AND code='$c'";
    $res=mysqli_query($con, $query);
    if($res)
    {
        if(mysqli_num_rows($res)==1)
        {
            $res_fetch=mysqli_fetch_assoc($res);
            if($res_fetch['verified']==0)
            {
                $update="UPDATE login_table SET verified='1' where useremail='$res_fetch[useremail]'";
                if(mysqli_query($con, $update))
                {
                    echo "<script> alert('Email verfication successful'); 
                    window.location.href='login.php';
                    </script>";
                }
            }
            else{
                echo "<script> alert('Email already registered'); 
              window.location.href='login.php';
            </script>";
            }
        }
    }
    else
    {
        echo "<script> alert('Cannot'); 
              window.location.href='login.php';
            </script>";

    }
}
?>