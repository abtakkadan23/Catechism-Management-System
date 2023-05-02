<?php
    include('session.php');
    include('config.php');

    if(isset($_POST['submit']))
    {
        $id=$_POST['id'];
        $dt=$_POST['dt'];
        $approve='1';
        // echo "<script> alert($status);</script>";
        $sql2=mysqli_query($con, "UPDATE tbl_studatt SET approve = '$approve' WHERE studid = '$id' AND s_atdate='$dt'");

        if($sql2 === TRUE)
        {
            echo "<script>alert('Leave approved...'); window.location.href='facapprove.php';</script>";
        }
        
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="studtakeatte.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <title>Dashboard</title>
</head>

<body>
    <section class="header">
        <div class="logo">
            <img src="Heading.png" alt="CATHECHISM" height="10px" width="60px">
        </div>
        <div class="search--notification--profile">
            <div class="notification--profile">
                <div class="picon bell">
                    <i class="ri-notification-2-line"></i>
                </div>
                <a href="#">
                    <div class="picon chat">
                        <span>
                            <?php
                                $mail = $_SESSION['email'];
                                $sql = "SELECT * FROM `login_table` where useremail = '$mail'";
                                $result = mysqli_query($con, $sql);
                                $rows = $result->fetch_assoc();
                                $id = $rows['userid'];
                                $sqli = "select * from adminregisterfaculty where facultyid = '$id'";
                                $rx = mysqli_query($con, $sqli);
                                $rst = $rx->fetch_assoc();
                                echo $rst['facultyname'];
                                $class = $rst['facultyclass'];
                            ?>
                        </span>
                        <span><img class="picon profile" src="profile.jpg" alt="PIC"></span>
                    </div>
                </a>
            </div>
        </div>
    </section>
    <section class="main">
        <div class="sidebar">
            <ul class="sidebar--items">
                <li>
                    <a href="facultydashboard.php">
                        <span class="icon icon-1"><i class="ri-admin-line"></i></span>
                        <span class="sidebar--item"> Faculty Dashboard</span>
                    </a>
                </li>
                
                <!-- <li>
                    <a href="addnewfaculty.php">
                        <span class="icon icon-5"><i class="ri-user-add-line"></i></span>
                        <span class="sidebar--item">Add Faculty</span>
                    </a>
                </li>
                <li>
                <li>
                    <a href="#">
                        <span class="icon icon-5"><i class="ri-user-add-line"></i></span>
                        <span class="sidebar--item">Add Student</span>
                    </a>
                </li>
                <li>
                    <a href="managefaculty.php">
                        <span class="icon icon-2"><i class="ri-user-line"></i></span>
                        <span class="sidebar--item">Manage Faculties</span>
                    </a>
                </li>
                <li> -->
                    <a href="fmangstu.php">
                        <span class="icon icon-3"><i class="ri-user-line"></i></span>
                        <span class="sidebar--item" style="white-space: nowrap;">Manage Students</span>
                    </a>
                </li>
                <!-- <li>
                    <a href="#">
                        <span class="icon icon-6"><i class="ri-line-chart-line"></i></span>
                        <span class="sidebar--item">Manage Class</span>
                    </a>
                </li> -->
                <li>
                    <a href="takeattendance.php" id="active--link">
                        <span class="icon icon-4"><i class="ri-calendar-2-line"></i></span>
                        <span class="sidebar--item">Attendance</span>
                    </a>
                </li>
                <li>
                    <a href="facmarks.php">
                        <span class="icon icon-4"><i class="ri-calendar-2-line"></i></span>
                        <span class="sidebar--item">Marks</span>
                    </a>
                </li>
            </ul>
            <ul class="sidebar--bottom-items">
                <li>
                    <a href="fac_changepass.php">
                        <span class="icon icon-7"><i class="ri-settings-3-line"></i></span>
                        <span class="sidebar--item">Settings</span>
                    </a>
                </li>
                <li>
                    <a href="logout.php ">
                        <span class="icon icon-8"><i class="ri-logout-box-r-line"></i></span>
                        <span class="sidebar--item">Logout</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="topbar" style="display:block;">
                <span class="topbar--item">
                    <a href="takeattendance.php">
                        <i class="ri-line-chart-line"></i>
                        Take Attendance
                    </a>
                </span>
                <span class="topbar--item">
                    <a href="studentattstatusbyfac.php" style="margin-right: 20px;">
                        <i class="ri-line-chart-line"></i>
                        Overview
                    </a>
                </span>
                <span class="topbar--item">
                    <a href="facsatrept.php" style="margin-right: 20px;">
                        <i class="ri-line-chart-line"></i>
                        Report
                    </a>
                </span>
                <span class="topbar--item">
                    <a href="facapprove.php" style="margin-right: 20px;" id="active--link">
                        <i class="ri-line-chart-line"></i>
                        Approve
                    </a>
                </span>
                <span class="topbar--item">
                    <a href="facultysattendance.php" style="margin-right: 20px;">
                        <i class="ri-line-chart-line"></i>
                        Your Attendance
                    </a>
                </span>
            </div>
        
        <div class="main--content">
            <div class="recent--patients" style="overflow-y: scroll;">
                <form action="" method="POST">
                    <table>
                        <tr>
                            <th>
                                STUDENT ID
                            </th>
                            <th>
                                NAME
                            </th>    
                            <th>
                                LEAVE DATE
                            </th>    
                            <th>
                                REASON
                            </th>
                            <th>
                                STATUS
                            </th>
                        </tr>
                    <?php
                        $cal5="SELECT * FROM tbl_studatt JOIN adminregisterstudent ON tbl_studatt.class=adminregisterstudent.studentclass AND tbl_studatt.studid=adminregisterstudent.studentid AND approve= 0 AND reason != ''";
                        $cal6 = $con->query($cal5);
                        // $s = mysqli_fetch_assoc($cal6);
                        // $stud = $s['studid'];
                        // $cal7="SELECT * FROM adminregisterstudent WHERE studentid='$stud'";
                        // $cal8 = $con->query($cal7);
                        // $ss = mysqli_fetch_assoc($cal8);
                        // $s = mysqli_num_rows($cal6);
                        if(mysqli_num_rows($cal6) > 0)
                        {
                            while($fet = mysqli_fetch_assoc($cal6))
                            {
                                // echo $s;
                                $approve = $fet['approve'];
                                $date = $fet['s_atdate'];?>
                                <tr> 
                                    <td> 
                                        <input type="hidden" value="<?php echo $fet['studid'];?>" id="id" name="id">
                                        <input type="hidden" value="<?php echo $fet['s_atdate'];?>" id="dt" name="dt">

                                        <?php echo $fet['studid'];?>
                                    </td>
                                    <td> 
                                        <?php echo $fet['studentname'];?>
                                    </td>
                                    <td> 
                                        <?php echo $date;?>
                                    </td>
                                    <td> 
                                        <?php echo $fet['reason'];?>
                                    </td>
                                    <td> 
                                        <input type="submit" value="APPROVE" id="submit" name="submit" style="color: White; background-color:red; width:80px; height:30px;">
                                    </td>
                                </tr> <?php                            
                            }
                        }
                        else
                        { ?>
                            <tr>
                                <td style="border: none;">
                                    No pending approvals
                                </td>
                            </tr><?php
                        }                            
                    ?>
                    </table>
                </form><br><br>
            </div>
        </div>
        
    </section>
</body>

</html>