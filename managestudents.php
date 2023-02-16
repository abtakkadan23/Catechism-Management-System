<?php
    include('session.php');
    include('config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="managefacultystyle.css">
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
                        <span>Admin</span>
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
                    <a href="admindashboard.php">
                        <span class="icon icon-1"><i class="ri-admin-line"></i></span>
                        <span class="sidebar--item"> Admin Dashboard</span>
                    </a>
                </li>
                
                <li>
                    <a href="addnewfaculty.php">
                        <span class="icon icon-5"><i class="ri-user-add-line"></i></span>
                        <span class="sidebar--item">Registration</span>
                    </a>
                </li>
                <li>
                    <a href="managefaculty.php" id="active--link">
                        <span class="icon icon-2"><i class="ri-user-line"></i></span>
                        <span class="sidebar--item">Manage Members</span>
                    </a>
                </li>
                <li>
                    <a href="manageclass.php ">
                        <span class="icon icon-6"><i class="ri-line-chart-line"></i></span>
                        <span class="sidebar--item">Manage Class</span>
                    </a>
                </li>
                <li>
                    <a href="attendance.php">
                        <span class="icon icon-4"><i class="ri-calendar-2-line"></i></span>
                        <span class="sidebar--item">Attendance</span>
                    </a>
                </li>
            </ul>
            <ul class="sidebar--bottom-items">
                <li>
                    <a href="#">
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
                <a href="managefaculty.php" style="margin-right: 20px;">
                    <i class="ri-line-chart-line"></i>
                    Faculties
                </a>
            </span>
            <span class="topbar--item">
                <a href="managestudents.php" id="active--link">
                    <i class="ri-line-chart-line"></i>
                    Students
                </a>
            </span>
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
                    $sql="SELECT * FROM `adminregisterstudent` WHERE status=1";
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
                                        <td><center><a href="updatestudent.php?id=<?php echo $rows['studentid'];?>"><button style="color: White; background-color:orange; width:80px; height:30px;"><i class="ri-edit-line"></i>Edit</button></a></center></td>
                                        <td><center><a href="studentdetails.php?id=<?php echo $rows['studentid'];?>"><button style="color: White; background-color:orange; width:120px; height:30px;"><i class="ri-edit-line"></i>View Profile</button></a></center></td>
                                    </tr>
                            <?php
                                }
                            ?>
                        </tbody>  
                    </table>
                </div>
            </div>
        </div>
        <!--<div class="recent--patients">
            <div class="title">
                <h2 class="section--title">Students</h2>
                <button class="add"><i class="ri-add-line"></i></button>
            </div>
            <div class="table">
                <table>
                    <thead>
                        <tr>
                            <th>userame</th>
                            <th>Email</th>
                            <th>Mobile no</th>
                            <th>manage</th>
                        <th>Status</th>
                            <th>Settings</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>-->
    </section>
    <script src="admin.js"></script>
</body>

</html>