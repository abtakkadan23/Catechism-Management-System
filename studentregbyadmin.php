<?php
    include('config.php');

    if(isset($_POST['submit']))
    {
        $stuname = $_POST['facname'];
        $stubname = $_POST['facbname'];
        $stugender = $_POST['gender'];
        $stuhname = $_POST['fachname'];
        $stumobno = $_POST['facmobno'];
        $stuemail = $_POST['facemail'];
        $studob = $_POST['facdob'];
        $stuclass = $_POST['class'];
        $stufname = $_POST['facfather'];
        $stumname = $_POST['facmother'];
        $stupassword = $_POST['facpassword'];
        $sturepassword = $_POST['facrepassword'];


        if ($stupassword == $sturepassword)
        {
            //$psword = md5($stupassword);password encryption to increase data security
            $query1="insert into login_table (useremail, password, role) VALUES('$stuemail','$stupassword', 3)";
            $result2 = mysqli_query($con, $query1);

            $query3 = "select * from login_table where useremail = '$stuemail' and password = '$stupassword'";
            $result3 = $con->query($query3);
            $uid = $result3->fetch_assoc();
            $uid1 = $uid['userid'];

            $query="insert into adminregisterstudent (studentid, studentname, studentbname, studentgender, studenthname, studentmobile, studentdob, studentclass, studentfather, studentmother, role) values('$uid1', '$stuname', '$stubname', '$stugender', '$stuhname', '$stumobno', '$studob', '$stuclass', '$stufname', '$stumname', 3)";
            
            /*if ($con->query($query1) === TRUE and $con->query($query) === TRUE) */
            $result = mysqli_query($con, $query);
            
            if ($result2 === TRUE and $result === TRUE)
            {
                echo "<script>  alert('Student added...'); window.location.href='addnewstudent.php'; </script>";
                // header("location: addnewstudent.php");
            } 
            else 
            {
                echo "Error: " . $query . "<br>" . $con->error;
            }  
        }
    }

?>