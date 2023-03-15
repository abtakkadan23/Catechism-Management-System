<?php
    include('session.php');
    include('config.php');

    if(isset($_POST['type']) && $_POST['type']!=''){
    $type=($_POST['type']);

    if($type=='status')
    {
        $operation=($_POST['operation']);
        // echo $operation;
        $id=($_POST['id']);
        $d=date("Y/m/d");

        if($operation=='active')
        {
        $status='1';
        }
        else
        {
        $status='0';
        }
        $sql2=mysqli_query($con,"insert into tbl_attend (userid,status,at_date) values('$id', $status, $d)");
        echo "<script>window.location.href='facattendtake.php';</script>";
    }
    }
?>