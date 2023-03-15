<?php
    include('config.php');

    if(isset($_POST['submit']))
    {
        $facname = $_POST['facname'];
        $facbname = $_POST['facbname'];
        $facgender = $_POST['gender'];
        $fachname = $_POST['fachname'];
        $facmobno = $_POST['facmobno'];
        $facemail = $_POST['facemail'];
        $facdob = $_POST['facdob'];
        $faclass = $_POST['class'];
        $facdesig = $_POST['desig'];
        $facquali = $_POST['facqual'];
        $facjob = $_POST['facjob'];
        $facfname = $_POST['facfather'];
        $facmname = $_POST['facmother'];
                
        //$psword = md5($facpassword);password encryption to increase data security
        $query="update adminregisterfaculty set facultyname = '$facname', facultybname = '$facbname', facultygender = '$facgender', facultyhname = '$fachname', facultymobile = '$facmobno', facultyemail = '$facemail', facultydob = '$facdob', facultyclass = '$faclass', facultydesig = '$facdesig', facultyqualif = '$facquali', facultyjob = '$facjob', facultyfather = '$facfname', facultymother = '$facmname', role = '2' where id = '$id'";
        $query1="update login_table set useremail = '$facemail', role = '2' where id = '$id'";
        /*if ($con->query($query1) === TRUE and $con->query($query) === TRUE) */
        $result = mysqli_query($con, $query);
        $result2 = mysqli_query($con, $query1);
        if ($result === TRUE and $result2 === TRUE)
        {
            header("location: managefaculty.php");
        } 
        else 
        {
            echo "Error: " . $query . "<br>" . $con->error;
        }   
    }

?>