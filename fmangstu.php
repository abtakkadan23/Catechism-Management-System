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
    <link rel="stylesheet" href="managefacultystyle.css">
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
                                $cc = $rst['facultyclass']; 
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
                    <a href="fmangstu.php" id="active--link">
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
            <div class="recent--patients">
                <div class="title">
                    <h2 class="section--title"> <b>Student Details</b> </h2>
                    <!--<button class="add"><i class="ri-add-line"></i>Add Student</button>-->
                </div>
                <!-- PHP CODE TO FETCH DATA FROM ROWS -->
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
                    $sql="SELECT * FROM `adminregisterstudent` WHERE studentclass='$cc'";
                    // $sql2="SELECT * FROM `login_table` WHERE status=1";         //monday
                    // $sql3="SELECT * FROM `login_table` WHERE status=0";
                    $result = $mysqli->query($sql);
                    // $result2 = $mysqli->query($sql2);id1=<?php echo $row['userid'];
                    // $result3 = $mysqli->query($sql3);
                    $mysqli->close();
                ?>
                <div class="table">
                    <table>
                        <thead>
                            <tr>
                                <th>IMAGE</th>     
                                <th>STUDENT ID</th>
                                <th>NAME</th>
                                <th>CLASS</th>
                                <th colspan="2">OPERATION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                // LOOP TILL END OF DATA
                                while($rows=$result->fetch_assoc())
                                {
                            ?>
                                    <tr>
                                        <!-- FETCHING DATA FROM EACH
                                        ROW OF EVERY COLUMN -->
                                        <td><img class="a" style="height: 60px; width:60px;" src="./profile_images/<?php echo $rows['studentimage'];?>" alt="student dp"></td>
                                        <td><?php echo $rows['studentid'];?></td>
                                        <td><?php echo $rows['studentname'];?></td>
                                        <td><?php echo $rows['studentclass'];?></td>
                                        <td><center><a href="facupdatestudent.php?id=<?php echo $rows['studentid'];?>"><button style="color: White; background-color:orange; width:80px; height:30px;"><i class="ri-edit-line"></i>Edit</button></a></center></td>
                                        <td><center><a href="facstudentdetails.php?id=<?php echo $rows['studentid'];?>"><button style="color: White; background-color:orange; width:120px; height:30px;"><i class="ri-edit-line"></i>View Profile</button></a></center></td>
                                    </tr>
                            <?php
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