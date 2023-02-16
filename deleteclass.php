<?php
include('config.php');
$id = $_GET['id']; // get id through query string
 
$del = mysqli_query($con,"delete from `catclass` WHERE classid=$id;"); // update query
if($del and $del)
{
    mysqli_close($con); // Close connection
    echo "<script>alert('Class deleted successfully...'); window.location.href='manageclass.php';</script>";
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
    
}
?>