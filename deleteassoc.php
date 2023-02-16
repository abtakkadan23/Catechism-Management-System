<?php
include('config.php');
$id = $_GET['id']; // get id through query string
 
$del = mysqli_query($con,"delete from `assoclass` WHERE assoc_id=$id;"); // update query
if($del)
{
    mysqli_close($con); // Close connection
    echo "<script>alert('Class association deleted successfully...'); window.location.href='assignteacher.php';</script>";
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
    
}
?>