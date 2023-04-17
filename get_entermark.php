<?php
    include('session.php');
    include('config.php');

    // $examname = $_POST['d'];
    // $_SESSION['exam']="$examname ";
    // if(isset($_POST['sub1'])){
    //     $stud_id=$_POST['student'];
    //     $mark=$_POST['mark'];
    //     $examname =$_SESSION['exam'];
    //     if($examname=='series1'){
    //     $sql="INSERT INTO `tbl_internal`( `stud_id`, `sub_id`, `series1`) 
    //     VALUES ('$stud_id','$subid','$mark')";
    //      $result = $conn->query($sql);
    //     }


    // }

    // Retrieve the selected options from the form data
    $examname = $_POST['e'];

    $mail = $_SESSION['email'];
    $sql = "SELECT * FROM `login_table` where useremail = '$mail'";
    $result = mysqli_query($con, $sql);
    $rows = $result->fetch_assoc();
    $id = $rows['userid'];
    $sqli = "select * from adminregisterfaculty where facultyid = '$id'";
    $rx = mysqli_query($con, $sqli);
    $rst = $rx->fetch_assoc();
    $fn = $rst['facultyid'];

    // Build the SQL query based on the selected options
    $sql = "SELECT * FROM adminregisterfaculty WHERE facultyid='$fn'";
    // Execute the SQL query
    $result = $con->query($sql);
    $r = $result->fetch_assoc();
    $cid = $r['facultyclass'];

    $sql2 = "SELECT * FROM adminregisterstudent WHERE studentclass='$cid'";
    $result2 = $con->query($sql2);
    $sql4 = "SELECT * FROM exams WHERE e_id='$examname'";
    $result4 = $con->query($sql4);
    $row4=$result4->fetch_assoc();

    // $sql3 = "SELECT * FROM tbl_student WHERE batch_id='$batchid'";
    // $result3 = $conn->query($sql3);
    // $row3=$result3->fetch_assoc();

    echo "<p id='exam' name='exam' value='" . $row4['e_id'] . "'><b>" . $row4['e_name'] . "</b></p>";
    echo "<form action='' method='POST'>";
    echo "<table>";
    echo "<tr><th>STUDENT ID</th><th>STUDENT NAME</th><th>MAXIMUM MARKS</th><th>SCORED MARKS</th></tr>";

    while($row2=mysqli_fetch_assoc($result2)) 
    {
        // Build the HTML table based on the query results
        // if ($result4->num_rows > 0) 
        echo "<tr>
                <td> 
                    <p id='student' name='student' value='". $row2['studentid'] ."'>"
                        . $row2['studentid'] .  
                    "</p>
                </td>
                <td>"
                    . $row2['studentname'] .  
                "</td>
                <td>"
                    . $row4['e_mark'] .  
                "</td>
                <td>
                    <input type='number' id='mark' name='mark' min='0' max='" . $row4['e_mark'] . "'>
                </td>
            </tr>";

    }
    // echo "<tr><td colspan='4'>Students</td></tr>";
    echo "</table>";
    echo "<button type='submit' name='sub1' style='margin-left:550px;'>Submit</button>";

    echo "</form>";
?>