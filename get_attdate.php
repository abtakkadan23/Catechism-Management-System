<?php
    include('session.php');
    include('config.php');

    // Retrieve the selected options from the form data
    $option = $_POST['d'];

    // Build the SQL query based on the selected options
    $sql = "SELECT * FROM tbl_attend WHERE at_date='$option'";
    // Execute the SQL query
    $result = $con->query($sql);
    $r = $result->fetch_assoc();
    $cid = $r['userid'];

    $sql0 = "SELECT * FROM adminregisterfaculty WHERE facultyid='$cid'";
    $result0 = $con->query($sql0);
    $row=$result0->fetch_assoc();
    $ssql = "SELECT userid, at_date, tbl_attend.status, adminregisterfaculty.facultyname FROM tbl_attend JOIN adminregisterfaculty ON tbl_attend.userid = adminregisterfaculty.facultyid AND at_date='$option'";
    $reslt = $con->query($ssql);
    // Build the HTML table based on the query results
    if ($result->num_rows > 0) 
    {
        
        // echo "<tr><td colspan='4'>Students</td></tr>";
        echo "<table>";
        echo "<tr><th>FACULTY ID</th><th>NAME</th><th>DATE</th><th>STATUS</th></tr>";

        while($rw=mysqli_fetch_assoc($reslt)) 
        {
            if($rw['status']==1)
            {
                $status = "Present";
                echo "<tr><td>" . $rw['userid'] . "</td><td>" . $rw['facultyname'] . "</td><td>" . $rw['at_date'] . "</td><td style='color: green;'><b>" . $status . "</b></td></tr>";
            }
            else
            {
                $status = "Absent";
                echo "<tr><td>" . $rw['userid'] . "</td><td>" . $rw['facultyname'] . "</td><td>" . $rw['at_date'] . "</td><td style='color: red;'><b>" . $status . "</b></td></tr>";
            }
        }
        echo "</table>";
    }
?>