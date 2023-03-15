<?php
include('config.php');
$id = $_GET['id']; // get id through query string

// echo $id;
$del = mysqli_query($con,"update assoclass set facid = 0 where assoc_id=$id;"); // update query
$del1 = mysqli_query($con,"update adminregisterfaculty set facultyclass = 0 where facultyclass=$id;");
if($del)
{
    mysqli_close($con); // Close connection
    echo "<script>alert('Class Teacher removed successfully...'); window.location.href='assignteacher.php';</script>";
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
    
}
?>