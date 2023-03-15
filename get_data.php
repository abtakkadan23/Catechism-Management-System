<?php
    include('session.php');
    include('config.php');

    // Retrieve the selected options from the form data
    $option1 = $_POST['c'];
    $option2 = $_POST['d'];

    // Build the SQL query based on the selected options
    $sql = "SELECT * FROM assoclass WHERE class_id='$option1' AND div_id='$option2'";
    // Execute the SQL query
    $result = $con->query($sql);
    $r = $result->fetch_assoc();
    $cid = $r['assoc_id'];
    $sql0 = "SELECT * FROM adminregisterfaculty WHERE facultyclass='$cid'";
    $result0 = $con->query($sql0);
    $frow = $result0->fetch_assoc();
    echo "<table>";
    echo "<tr><th>PHOTO</th><th>FACULTY ID</th><th>NAME</th><th>CONTACT INFO</th></tr>";
    echo "<tr><td><img class='avatar' style='height: 60px; width:60px;' src='./profile_images/" . $frow['facultyimage'] . "'alt='faculty dp'>" . "</td><td>" . $frow['facultyid'] . "</td><td>" . $frow['facultyname'] . "</td><td>" . $frow['facultymobile'] . "</td></tr>";
    echo "</table>";

    $sql1 = "SELECT * FROM adminregisterstudent WHERE studentclass='$cid'";
    $result1 = $con->query($sql1);

    // Build the HTML table based on the query results
    if ($result->num_rows > 0) 
    {
        
        // echo "<tr><td colspan='4'>Students</td></tr>";
        echo "<table>";
        echo "<tr><th>PHOTO</th><th>STUDENT ID</th><th>NAME</th><th>CONTACT INFO</th></tr>";

        while($row=$result1->fetch_assoc()) {
        echo "<tr><td><img class='avatar' style='height: 60px; width:60px;' src='./profile_images/" . $row['studentimage'] . "'alt='student dp'>" . "</td><td>" . $row['studentid'] . "</td><td>" . $row['studentname'] . "</td><td>" . $row['studentmobile'] . "</td></tr>";
        }
        echo "</table>";
    }
?>