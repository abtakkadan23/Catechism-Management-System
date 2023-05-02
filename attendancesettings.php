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
    <title>Administrator Dashboard</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
                    <a href="managefaculty.php">
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
                        <span class="icon icon-4"><i class="ri-numbers-fill"></i></i></span>
                        <span class="sidebar--item">Exams</span>
                    </a>
                </li>
            </ul>
            <ul class="sidebar--bottom-items">
                <li>
                    <a href="adminsettings.php" id="active--link">
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
                <a href="adminsettings.php">
                    <i class="ri-line-chart-line"></i>
                        Church Details
                </a>
            </span>
            <span class="topbar--item">
                <a href="attendancesettings.php" id="active--link">
                    <i class="ri-line-chart-line"></i>
                        Schedule Attendance
                </a>
            </span>
        </div>

        <div class="main--content">
            <form action="setattendance.php" method="POST" id="data-form">  
                <div class="title">
                    <h2 class="section--title">Click on SET button to set today as a working day...</h2>
                </div>
                <div class="table-3">
                    <table>
                        <tr>
                            <td>
                                <?php echo date("d/m/Y");?>
                            </td>
                            <td style="border: none; ">
                                <input type="submit" value="SET" id="submit" name="submit" class="addbtn" style="height: 30px; width: 100%; font-weight: bold;">
                            </td>
                        </tr>
                    </table>
                </div>
            </form>
        </div>
        
    </section>
    <script src="admin.js"></script>
</body>

</html>