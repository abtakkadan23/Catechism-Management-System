<?php
include('config.php');
$id = $_GET['id']; // get id through query string
 
$del = mysqli_query($con,"UPDATE `adminregisterfaculty` SET `status`=0 WHERE facultyid=$id;"); // update query
$del1 = mysqli_query($con,"UPDATE `login_table` SET `status`=0 WHERE userid=$id;");
if($del and $del1)
{
    mysqli_close($con); // Close connection
    header("location:admindashboard.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>