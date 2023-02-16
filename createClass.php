<?php
    include('session.php');
    include('config.php');
    if(isset($_POST['submit']))
    {
        $class = $_POST['cls']; 
        // $query = "insert into catclass (class) values('$class')";
        $CC = mysqli_query($con, "select * from catclass where class = '$class' ");
        if($CC->num_rows>0)
        {
            echo "<script>alert('Class already exist...'); window.location.href='manageclass.php';</script>";
        }
        else
        {
            $result = mysqli_query($con, "insert into catclass (class) values('$class')");
            echo "<script>alert('Class added successfully...'); window.location.href='manageclass.php';</script>";
        }
    }

?>