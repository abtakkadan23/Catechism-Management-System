<?php
    include('session.php');
    include('config.php');

    $q="select * from parish_info";
    $r=mysqli_query($con, $q);
    $parish = mysqli_fetch_assoc($r);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="facstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <title>Faculty Dashboard</title>
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
                                // echo $_SESSION['email'];
                                $mail = $_SESSION['email'];
                                $sql = "SELECT * FROM `login_table` where useremail = '$mail'";
                                $result = mysqli_query($con, $sql);
                                $rows = $result->fetch_assoc();
                                $id = $rows['userid'];
                                $sqli = "select * from adminregisterfaculty where facultyid = '$id'";
                                $rx = mysqli_query($con, $sqli);
                                $rst = $rx->fetch_assoc();
                                echo $rst['facultyname'];
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
                    <a href="facultydashboard.php" id="active--link">
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
                    <a href="takeattendance.php">
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
        
        <div class="main--content">
            <div class="overview">
                <center>
                    <h2><?php echo $parish['p_name'];?> Sunday School</h2>
                    <h3><?php echo $parish['p_place'];?></h3>
                </center>
                <div class="title">
                    <h2 class="section--title"> <b>Overview </b></h2>
                    <!--
                    <select name="date" id="date" class="dropdown">
                        <option value="today">Today</option>
                        <option value="lastweek">Last Week</option>
                        <option value="lastmonth">Last Month</option>
                        <option value="lastyear">Last Year</option>
                        <option value="alltime">All Time</option>
                    </select>
                    -->
                </div>
                <div class="cards">
                    <div class="card card-1">
                        <div class="card--data">
                            <div class="card--content">
                                <h5 class="card--title">Class</h5>
                                <h1>
                                <?php 
                                    $e = $_SESSION['email'];
                                    $query5 = "select * from login_table where useremail = '$e'";
                                    $result5 = $con->query($query5);
                                    $fg = $result5->fetch_assoc();
                                    $fid = $fg['userid'];
                                    $result = "select * from assoclass where facid = '$fid'";
                                    $res = $con->query($result);
                                    $xx = $res->fetch_assoc();
                                    $c = $xx['class_id'];
                                    $d = $xx['div_id'];
                                    $asid = $xx['assoc_id'];
                                    $c1 = "select * from catclass where classid = '$c'";
                                    $re = $con->query($c1);
                                    $fg = $re->fetch_assoc();
                                    $class = $fg['class'];
                                    echo $class;
                                    $d1 = "select * from tbl_div where divid = '$d'";
                                    $ree = $con->query($d1);
                                    $fx = $ree->fetch_assoc();
                                    $division = $fx['division'];
                                    echo $division;
                                    // echo $d1['division'];
                                ?>
                                </h1>
                            </div>
                            <i class="ri-user-line card--icon--lg"></i>
                        </div>
                    </div>
                    <div class="card card-2">
                        <div class="card--data">
                            <div class="card--content">
                                <h5 class="card--title">Class Strength</h5>
                                <h1>
                                    <?php 
                                        $cal1="SELECT COUNT(studentid) FROM adminregisterstudent WHERE studentclass='$asid' AND status=1";
                                        $cal2 = $con->query($cal1);
                                        $pcount = $cal2->fetch_row()[0];
                                        echo $pcount;
                                    ?>
                                </h1>
                            </div>
                            <i class="ri-user-line card--icon--lg"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="recent--patients">
                <div class="title">
                    <h2 class="section--title"><b>Students</b></h2>
                    <a href="managefaculty.php"><button class="add"> <i class="ri-edit-line"></i> Edit Details</button></a>
                </div>
                <div class="table">
                    <table>
                        <thead>
                            <tr>
                                <th>NAME</th>
                                <th>CONTACT NUMBER</th>
                                <th>STUDENT ID</th>
                            </tr>
                        </thead>
                        <tbody> 
                            <?php
                                $user = 'root';
                                $password = '';
                                
                                // Database name is registration

                                $database = 'catechism';
                                $servername='localhost';
                                $mysqli = new mysqli($servername, $user, $password, $database);
                                
                                // Checking for connections

                                if ($mysqli->connect_error) 
                                {
                                    die('Connect Error (' .$mysqli->connect_errno . ') '.$mysqli->connect_error);
                                }
                                
                                // SQL query to select data from database

                                $sql1="SELECT * FROM `adminregisterstudent` where studentclass = '$asid' and status = 1 order by studentname";
                                $res=mysqli_query($con,$sql);
                                $count=mysqli_num_rows($res);
                                if($count>0)
                                {
                                $result = $mysqli->query($sql1);
                                $mysqli->close();                                
                            ?>
                            
                            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
                            <?php
                                // LOOP TILL END OF DATA
                                while($rows=$result->fetch_assoc())
                                {
                            ?>
                                    <tr>
                                        <!-- FETCHING DATA FROM EACH
                                            ROW OF EVERY COLUMN -->
                                        <td><?php echo $rows['studentname'];?></td>
                                        <td><?php echo $rows['studentmobile'];?></td>
                                        <td><?php echo $rows['studentid'];?></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?> 
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        
    </section>
    <script src="admin.js"></script>
</body>

</html>