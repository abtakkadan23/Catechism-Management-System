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
    <link rel="stylesheet" href="adminstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <title>Dashboard</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("button").click(function(){
                $("#recent--patients").load("load-comments.php")
            })
        })
    </script>
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
                            Admin
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
                    <a href="#" id="active--link">
                        <span class="icon icon-1"><i class="ri-admin-line"></i></span>
                        <span class="sidebar--item"> Admin Dashboard</span>
                    </a>
                </li>
                
                <li>
                    <a href="addnewfaculty.php">
                        <span class="icon icon-5"><i class="ri-user-add-line"></i></span>
                        <span class="sidebar--item">Add Faculty</span>
                    </a>
                </li>
                <li>
                <li>
                    <a href="addnewstudent.php">
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
                <li>
                    <a href="#">
                        <span class="icon icon-3"><i class="ri-user-line"></i></span>
                        <span class="sidebar--item" style="white-space: nowrap;">Manage Students</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon icon-6"><i class="ri-line-chart-line"></i></span>
                        <span class="sidebar--item">Manage Class</span>
                    </a>
                </li>
                <li>
                    <a href="#">
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
        
        <div class="main--content">
            <div class="overview">
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
                                <h5 class="card--title">Total Stuents</h5>
                                <h1>
                                <?php 
                                        $result = mysqli_query($con,"SELECT * from adminregisterstudent");
                                        echo mysqli_num_rows($result);
                                    ?>
                                </h1>
                            </div>
                            <i class="ri-user-line card--icon--lg"></i>
                        </div>
                        <!--
                        <div class="card--stats">
                            <span><i class="ri-bar-chart-fill card--icon stat--icon"></i>65%</span>
                            <span><i class="ri-arrow-up-s-fill card--icon up--arrow"></i>10</span>
                            <span><i class="ri-arrow-down-s-fill card--icon down--arrow"></i>2</span>
                        </div>
                        -->
                    </div>
                    <div class="card card-2">
                        <div class="card--data">
                            <div class="card--content">
                                <h5 class="card--title">Total Faculties</h5>
                                <h1>
                                    <?php 
                                        $result = mysqli_query($con,"SELECT * from adminregisterfaculty");
                                        echo mysqli_num_rows($result);
                                    ?>
                                </h1>
                            </div>
                            <i class="ri-user-line card--icon--lg"></i>
                        </div>
                        <!--
                        <div class="card--stats">
                            <span><i class="ri-bar-chart-fill card--icon stat--icon"></i>82%</span>
                            <span><i class="ri-arrow-up-s-fill card--icon up--arrow"></i>230</span>
                            <span><i class="ri-arrow-down-s-fill card--icon down--arrow"></i>45</span>
                        </div>
                        -->
                    </div>
                    <div class="card card-3">
                        <div class="card--data">
                            <div class="card--content">
                                <h5 class="card--title">Other Staffs</h5>
                                <h1>
                                    <?php 
                                        // $result = mysqli_query($con,"SELECT * from #");
                                        // echo mysqli_num_rows($result);
                                    ?>
                                </h1>
                            </div>
                            <i class="ri-user-line card--icon--lg"></i>
                        </div>
                        <!--
                        <div class="card--stats">
                            <span><i class="ri-bar-chart-fill card--icon stat--icon"></i>27%</span>
                            <span><i class="ri-arrow-up-s-fill card--icon up--arrow"></i>31</span>
                            <span><i class="ri-arrow-down-s-fill card--icon down--arrow"></i>23</span>
                        </div>
                        -->
                    </div>
                    <!--
                    <div class="card card-4">
                        <div class="card--data">
                            <div class="card--content">
                                <h5 class="card--title">Beds Available</h5>
                                <h1>15</h1>
                            </div>
                            <i class="ri-hotel-bed-line card--icon--lg"></i>
                        </div>
                        <div class="card--stats">
                            <span><i class="ri-bar-chart-fill card--icon stat--icon"></i>8%</span>
                            <span><i class="ri-arrow-up-s-fill card--icon up--arrow"></i>11</span>
                            <span><i class="ri-arrow-down-s-fill card--icon down--arrow"></i>2</span>
                        </div>
                    </div>
                    -->
                </div>
            </div>
            <!--
            <div class="doctors">
                <div class="title">
                    <h2 class="section--title">Faculties</h2>
                    <div class="doctors--right--btns">
                            <!--
                            <select name="date" id="date" class="dropdown doctor--filter">
                            $_COOKIE<option >Filter</option>
                            <option value="free">Free</option>
                            <option value="scheduled">Scheduled</option>
                            </select>
                        <button class="add"><i class="ri-add-line"></i>Add Faculty</button>
                    </div>
                </div>
                <div class="doctors--cards">
                    <a href="#" class="doctor--card">
                        <div class="img--box--cover">
                            <div class="img--box">
                                <img src="assets/images/doctor1.jpg" alt="">
                            </div>
                        </div>
                        <p class="free">Free</p>
                    </a>
                    <a href="#" class="doctor--card">
                        <div class="img--box--cover">
                            <div class="img--box">
                                <img src="assets/images/doctor2.jpg" alt="">
                            </div>
                        </div>
                        <p class="scheduled">Scheduled</p>
                    </a>
                    <a href="#" class="doctor--card">
                        <div class="img--box--cover">
                            <div class="img--box">
                                <img src="assets/images/doctor3.jpg" alt="">
                            </div>
                        </div>
                        <p class="scheduled">Scheduleds</p>
                    </a>
                    <a href="#" class="doctor--card">
                        <div class="img--box--cover">
                            <div class="img--box">
                                <img src="assets/images/doctor4.jpg" alt="">
                            </div>
                        </div>
                        <p class="free">Free</p>
                    </a>
                    <a href="#" class="doctor--card">
                        <div class="img--box--cover">
                            <div class="img--box">
                                <img src="assets/images/doctor5.jpg" alt="">
                            </div>
                        </div>
                        <p class="scheduled">Scheduled</p>
                    </a>
                    <a href="#" class="doctor--card">
                        <div class="img--box--cover">
                            <div class="img--box">
                                <img src="assets/images/doctor6.jpg" alt="">
                            </div>
                        </div>
                        <p class="free">Free</p>
                    </a>
                    <a href="#" class="doctor--card">
                        <div class="img--box--cover">
                            <div class="img--box">
                                <img src="assets/images/doctor7.jpg" alt="">
                            </div>
                        </div>
                        <p class="scheduled">Scheduled</p>
                    </a>
                </div>
            </div> -->
            <div class="recent--patients">
                <div class="title">
                    <h2 class="section--title"><b>Active Faculties</b></h2>
                    <a href="managefaculty.php"><button class="add"> <i class="ri-edit-line"></i> Edit Details</button></a>
                </div>
                <div class="table">
                    <table>
                        <thead>
                            <tr>
                                <th>NAME</th>
                                <th>DESIGNATION</th>
                                <th>CLASS</th>
                                <th>CONTACT NUMBER</th>
                                <th>EMAIL</th>
                                <th>CHANGE STATUS</th>
                            </tr>
                        </thead>
                        <tbody> 
                            <!--<tr>
                                <td>Cameron Williamson</td>
                                <td>30/07/2022</td>
                                <td>Male</td>
                                <td>8</td>
                                <td class="pending">pending</td>
                                <td><span><i class="ri-edit-line edit"></i><i class="ri-delete-bin-line delete"></i></span></td>
                            
                                Username is root
                            -->
                            
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
                                $sql="SELECT * FROM `adminregisterfaculty` WHERE status=1";
                                $sql1="SELECT * FROM `adminregisterfaculty` WHERE status=0";
                                $sql2="SELECT * FROM `adminregisterstudent` WHERE status=1";
                                $sql3="SELECT * FROM `adminregisterstudent` WHERE status=0";
                                // $sql2="SELECT * FROM `login_table` WHERE status=1";         //monday
                                // $sql3="SELECT * FROM `login_table` WHERE status=0";
                                $result = $mysqli->query($sql);
                                $result1 = $mysqli->query($sql1);
                                $result2 = $mysqli->query($sql2);
                                $result3 = $mysqli->query($sql3);
                                // $result2 = $mysqli->query($sql2);id1=<?php echo $row['userid'];
                                // $result3 = $mysqli->query($sql3);
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
                                        <td><?php echo $rows['facultyname'];?></td>
                                        <td><?php echo $rows['facultydesig'];?></td>
                                        <td><?php echo $rows['facultyclass'];?></td>
                                        <td><?php echo $rows['facultymobile'];?></td>
                                        <td><?php echo $rows['facultyemail'];?></td>
                                        <td><a href="delete.php?id=<?php echo $rows['facultyid'];?>"><button style="color: White; background-color:red; width:80px; height:30px; ">Deactivate</button></a></tb>
                                    </tr>
                                    <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="recent--patients">
                <div class="title">
                    <h2 class="section--title"> <b>Inactive Faculties</b> </h2>
                    <!--<button class="add"><i class="ri-add-line"></i>Add Student</button>-->
                </div>
                <div class="table">
                    <table>
                        <thead>
                            <tr>
                            <th>NAME</th>
                                <th>DESIGNATION</th>
                                <th>CLASS</th>
                                <th>CONTACT NUMBER</th>
                                <th>EMAIL</th>
                                <th>CHANGE STATUS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
                            <?php
                                // LOOP TILL END OF DATA
                                while($rows=$result1->fetch_assoc())
                                {
                            ?>
                                    <tr>
                                        <!-- FETCHING DATA FROM EACH
                                        ROW OF EVERY COLUMN -->
                                        <td><?php echo $rows['facultyname'];?></td>
                                        <td><?php echo $rows['facultydesig'];?></td>
                                        <td><?php echo $rows['facultyclass'];?></td>
                                        <td><?php echo $rows['facultymobile'];?></td>
                                        <td><?php echo $rows['facultyemail'];?></td>
                                        <td><a href="add.php?id=<?php echo $rows['facultyid'];?>"><button style="color: White; background-color:green; width:80px; height:30px;">Activate</button></a></tb>
                                    </tr>
                                    <?php
                                }
                            ?>
                        </tbody>  
                    </table>
                </div>
            </div>
            <div class="recent--patients">
                <div class="title">
                    <h2 class="section--title"> <b>Active Students</b> </h2>
                    <a href="managestudent.php"><button class="add"> <i class="ri-edit-line"></i> Edit Details</button></a>
                    <!--<button class="add"><i class="ri-add-line"></i>Add Student</button>-->
                </div>
                <div class="table">
                    <table>
                        <thead>
                            <tr>
                                <th>NAME</th>
                                <th>CLASS</th>
                                <th>CONTACT NUMBER</th>
                                <th>EMAIL</th>
                                <th>GENDER</th>
                                <th>CHANGE STATUS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
                            <?php
                                // LOOP TILL END OF DATA
                                while($rows=$result2->fetch_assoc())
                                {
                            ?>
                                    <tr>
                                        <!-- FETCHING DATA FROM EACH
                                        ROW OF EVERY COLUMN -->
                                        <td><?php echo $rows['studentname'];?></td>
                                        <td><?php echo $rows['studentclass'];?></td>
                                        <td><?php echo $rows['studentmobile'];?></td>
                                        <td><?php echo $rows['studentemail'];?></td>
                                        <td><?php echo $rows['studentgender'];?></td>
                                        <td><a href="deletes.php?id=<?php echo $rows['studentid'];?>"><button style="color: White; background-color:red; width:80px; height:30px;">Deactivate</button></a></tb>
                                    </tr>
                                    <?php
                                }
                            ?>
                        </tbody>  
                    </table>
                </div>
            </div>
            <div class="recent--patients">
                <div class="title">
                    <h2 class="section--title"> <b>Inactive Students</b> </h2>
                    <!--<button class="add"><i class="ri-add-line"></i>Add Student</button>-->
                </div>
                <div class="table">
                    <table>
                        <thead>
                            <tr>
                            <th>NAME</th>
                                <th>CLASS</th>
                                <th>CONTACT NUMBER</th>
                                <th>EMAIL</th>
                                <th>GENDER</th>
                                <th>CHANGE STATUS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
                            <?php
                                // LOOP TILL END OF DATA
                                while($rows=$result3->fetch_assoc())
                                {
                            ?>
                                    <tr>
                                        <!-- FETCHING DATA FROM EACH
                                        ROW OF EVERY COLUMN -->
                                        <td><?php echo $rows['studentname'];?></td>
                                        <td><?php echo $rows['studentclass'];?></td>
                                        <td><?php echo $rows['studentmobile'];?></td>
                                        <td><?php echo $rows['studentemail'];?></td>
                                        <td><?php echo $rows['studentgender'];?></td>
                                        <td><a href="adds.php?id=<?php echo $rows['studentid'];?>"><button style="color: White; background-color:green; width:80px; height:30px;">Activate</button></a></tb>
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