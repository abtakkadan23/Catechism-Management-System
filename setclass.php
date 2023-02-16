<?php
    include('session.php');
    include('config.php');
    if(isset($_POST['submit']))
    {
        $cls = $_POST['c'];
        $div = $_POST['d']; 
        $query3 = "select * from catclass where class='$cls'";
        $query4 = "select * from tbl_div where division='$div'";
        $result3 = $con->query($query3);
        $result4 = $con->query($query4);
        $cg = $result3->fetch_assoc();
        $cid = $cg['classid'];
        $dg = $result4->fetch_assoc();
        $did = $dg['divid'];
        $CC = "select * from assoclass where div_id = '$did' and class_id = '$cid' ";
        $result = mysqli_query($con, $CC);
        if($result->num_rows>0)
        {
            echo "<script>alert('Class already exist...'); window.location.href='manageclass.php';</script>";
        }
        else
        {
            $query2 = "insert into assoclass (class_id, div_id) value('$cid', '$did')";
            $result1 = mysqli_query($con, $query2);
            echo "<script>alert('Class association successful...'); window.location.href='manageclass.php';</script>";
        }
        
    }
?>