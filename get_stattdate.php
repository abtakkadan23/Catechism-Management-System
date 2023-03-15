<?php
    include('session.php');
    include('config.php');

    // Retrieve the selected options from the form data
    $option = $_POST['d'];
    // echo "<script> alert($option);</script>";

    // Build the SQL query based on the selected options
    $sql = "SELECT * FROM tbl_studatt WHERE s_atdate='$option'";
    // Execute the SQL query
    $result = $con->query($sql);
    $r = $result->fetch_assoc();
    $cid = $r['studid'];

    $sql0 = "SELECT * FROM adminregisterstudent WHERE studentid='$cid'";
    $result0 = $con->query($sql0);
    $row=$result0->fetch_assoc();
    $ssql = "SELECT studid, s_atdate, s_status, adminregisterstudent.studentname FROM tbl_studatt JOIN adminregisterstudent ON tbl_studatt.studid = adminregisterstudent.studentid AND s_atdate='$option'";
    $reslt = $con->query($ssql);
    // Build the HTML table based on the query results
    if ($result->num_rows > 0) 
    {
        
        // echo "<tr><td colspan='4'>Students</td></tr>";
        echo "<table>";
        echo "<tr><th>STUDENT ID</th><th>NAME</th><th>DATE</th><th>STATUS</th></tr>";

        while($rw=mysqli_fetch_assoc($reslt)) 
        {
            if($rw['s_status']==1)
            {
                $status = "Present";
                echo "<tr><td>" . $rw['studid'] . "</td><td>" . $rw['studentname'] . "</td><td>" . $rw['s_atdate'] . "</td><td style='color: green;'><b>" . $status . "</b></td></tr>";
            }
            else
            {
                $status = "Absent";
                echo "<tr><td>" . $rw['studid'] . "</td><td>" . $rw['studentname'] . "</td><td>" . $rw['s_atdate'] . "</td><td style='color: red;'><b>" . $status . "</b></td></tr>";
            }
        }
        echo "</table>";
    }
?>