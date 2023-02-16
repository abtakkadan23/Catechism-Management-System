<?php
    include('config.php');
    if(isset($_GET['type']) && $_GET['type']!=''){
    $type=($_GET['type']);

    if($type=='status'){
        $operation=($_GET['operation']);
        $id=($_GET['id']);

        if($operation=='active'){
        $status='1';
        }
        else{
        $status='0';
        }
        $update_status="UPDATE adminregisterfaculty set status='$status'where facultyid='$id'";
        $del1 = mysqli_query($con,"UPDATE login_table SET status='$status' WHERE userid='$id';");
        mysqli_query($con,$update_status);
        header("location:admindashboard.php"); // redirects to all records page
        exit;
    }
    }
?>