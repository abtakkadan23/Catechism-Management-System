<?php
    include('session.php');
    include('config.php');
    if(isset($_POST['submit']))
    {
        $div = $_POST['div'];
        // $query2 = "insert into tbl_div (division) value('$div')";
        $CC = mysqli_query($con, "select * from tbl_div where division = '$div' ");
        if($CC->num_rows>0)
        {
            echo "<script>alert('Division already exist...'); window.location.href='manageclass.php';</script>";
        } 
        else 
        {
            $result1 = mysqli_query($con, "insert into tbl_div (division) value('$div')");
            echo "<script>alert('Division added successfully...'); window.location.href='manageclass.php';</script>";
        }   
    }
?>