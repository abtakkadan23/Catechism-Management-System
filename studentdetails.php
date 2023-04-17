<?php
    include('session.php');
    include('config.php');
?>
<html>
    <head>
        <title>Faculty Details</title>
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
        <!-- Bootstrap CSS -->
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
        <!-- Font Awesome CSS -->
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>
        <link rel="stylesheet" href="addnewstudstyle.css">
        <Style>
            body 
            {
                padding: 0;
                margin: 0;
                font-family: 'Lato', sans-serif;
                color: #000;
            }

            .student-profile .card 
            {
                border-radius: 10px;
            }

            .card-header-1
            {
                height: 346px;
            }

            .student-profile .card .profile_img 
            {
                width: 150px;
                height: 150px;
                object-fit: cover;
                margin: 10px auto;
                border: 10px solid #ccc;
                border-radius: 50%;
                padding-bottom: 10px;
            }

            .profileimage
            {
                width: 346px;
                height: 340px;
            }

            .student-profile .card h3 
            {
                font-size: 20px;
                font-weight: 700;
            }

            .student-profile .card p 
            {
                font-size: 16px;
                color: #000;
            }

            .student-profile .table th,
            .student-profile .table td 
            {
                font-size: 14px;
                padding: 5px 10px;
                color: #000;
            }
        </style>
    </head>

    <body>
        <?php
            $id = $_GET['id'];
            // $result = mysqli_query($con,"SELECT * from adminregisterstudent where id = '$id'");
            $sql="SELECT * FROM `adminregisterstudent` WHERE studentid = '$id'";
            $result = $con->query($sql);
            $rows = $result->fetch_assoc();  
            // $con->close();
        ?>

        <!-- Page Design -->

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
                        <a href="manageclass.php">
                            <span class="icon icon-6"><i class="ri-line-chart-line"></i></span>
                            <span class="sidebar--item">Manage Class</span>
                        </a>
                    </li>
                    <li>
                        <a href="attendview.php">
                            <span class="icon icon-4"><i class="ri-calendar-2-line"></i></span>
                            <span class="sidebar--item">Attendance</span>
                        </a>
                    </li>
                    <li>
                        <a href="marks.php">
                            <span class="icon icon-4"><i class="ri-numbers-fill"></i></span>
                            <span class="sidebar--item">Marks</span>
                        </a>
                    </li>
                </ul>
                <ul class="sidebar--bottom-items">
                    <li>
                        <a href="adminsettings.php">
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
                    <a href="fmangstu.php" style="margin-right: 20px;">
                        <i class="ri-arrow-left-circle-fill"></i>
                        BACK
                    </a>
                </span>
            </div>

            <div class="main--content">

                <div class="student-profile py-4">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card shadow-sm">
                                    <div class="card-header-1 bg-transparent text-center">
                                        <img class="profileimage" src="./profile_images/<?php echo $rows['studentimage'];?>" alt="student dp">
                                    </div>
                                    <div class="card-body">
                                        Name:<h3><?php echo $rows['studentname'];?></h3>
                                        <p class="mb-0"><strong class="pr-1">Student ID:</strong><?php echo $rows['studentid'];?></p>
                                        <p class="mb-0"><strong class="pr-1">Class:</strong><?php echo $rows['studentclass'];?></p>
                                        <!-- <p class="mb-0"><strong class="pr-1">Designation:</strong><?php echo $rows['studentdesig'];?></p> -->
                                    </div>
                                </div>
                            </div>
                        
                            <div class="col-lg-8">
                                <div class="card shadow-sm">
                                    <div class="card-header bg-transparent border-0">
                                        <h3 class="mb-0"><i class="far fa-clone pr-1"></i>General Information</h3>
                                    </div>
                                    <div class="card-body pt-0">
                                        <table class="table table-bordered">
                                        <tr>
                                            <th width="30%">Baptism Name</th>
                                            <td width="2%">:</td>
                                            <td><?php echo $rows['studentbname'];?></td>
                                        </tr>
                                        <tr>
                                            <th width="30%">Gender</th>
                                            <td width="2%">:</td>
                                            <td><?php echo $rows['studentgender'];?></td>
                                        </tr>
                                        <tr>
                                            <th width="30%">House Name</th>
                                            <td width="2%">:</td>
                                            <td><?php echo $rows['studenthname'];?></td>
                                        </tr>
                                        <tr>
                                            <th width="30%">Contact Number</th>
                                            <td width="2%">:</td>
                                            <td><?php echo $rows['studentmobile'];?></td>
                                        </tr>
                                        <tr>
                                            <th width="30%">Email ID</th>
                                            <td width="2%">:</td>
                                            <?php
                                                $stid=$rows['studentid'];
                                                $qy=mysqli_query($con,"SELECT * FROM login_table WHERE userid='$stid'");
                                                $rqy=mysqli_fetch_assoc($qy);
                                            ?>
                                            <td><?php echo $rqy['useremail'];?></td>
                                        </tr>
                                        <tr>
                                            <th width="30%">Date of Birth</th>
                                            <td width="2%">:</td>
                                            <td><?php echo $rows['studentdob'];?></td>
                                        </tr>
                                        </table>
                                    </div>
                                </div>
                                <div style="height: 26px"></div>
                                    <div class="card shadow-sm">
                                        <div class="card-header bg-transparent border-0">
                                            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Other Information</h3>
                                        </div>
                                        <div class="card-body pt-0">
                                            <table class="table table-bordered">
                                                    <th width="30%">Father's Name</th>
                                                    <td width="2%">:</td>
                                                    <td><?php echo $rows['studentfather'];?></td>
                                                </tr>
                                                <tr>
                                                    <th width="30%">Mother's Name</th>
                                                    <td width="2%">:</td>
                                                    <td><?php echo $rows['studentmother'];?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>