<?php
    include('session.php');
    include('config.php');

    if(isset($_POST['submit']))
    {
        $facpassword = $_POST['facpassword'];
        $facrepassword = $_POST['facrepassword'];
        $pass=md5($facpassword);
        $ma=$_SESSION['email'];
        $query1="update login_table set password = '$pass' where useremail = '$ma'";
        $result1 = mysqli_query($con, $query1);
        
        if ($result1 === TRUE)
        {
            header("location: facultydashboard.php");
        } 
        else 
        {
            echo "Error: " . $query1 . "<br>" . $con->error;
        }  
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="facsettings.css">
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
                    <a href="takeattendance.php">
                        <span class="icon icon-4"><i class="ri-calendar-2-line"></i></span>
                        <span class="sidebar--item">Attendance</span>
                    </a>
                </li>
            </ul>
            <ul class="sidebar--bottom-items">
                <li>
                    <a href="fac_changepass.php" id="active--link">
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
                <a href="#" style="margin-right: 20px;" id="active--link">
                    <i class="ri-line-chart-line"></i>
                    Change Password
                </a>
            </span>
            <!-- <span class="topbar--item">
                <a href="#">
                    <i class="ri-line-chart-line"></i>
                    
                </a>
            </span> -->
        </div>

        <div class="main--content">
        <div class="form">
                <h2 class="section--title">Reset your password</h2>
                <form class="form2" action="#" method="post" id="facregform">
                    
                    <table style="table-layout: fixed; width: 100%;">
                        <tr>

                            <td>
                                <p>Type New Password :</p>
                                <input class="from" type="text" placeholder="New password" id="facpassword" name="facpassword" ><br>
                                <span class="error_form" id="facname_error_message" style="color:red; font-size :13px; "></span>
                            </td>

                            <td>
                                <p>Retype New Password :</p>
                                <input type="text" placeholder="New password" id="facrepassword" name="facrepassword"><br>
                                <span class="error_form" id="facbname_error_message" style="color:red; font-size :13px; "></span>
                            </td>

                        </tr>
                    </table>
                    

                    <button type="submit" name="submit" id="submit" class="loginbutton">
                        Save Changes
                    </button>
                </form>
            </div>
        </div>
        
    </section>
    <script src="admin.js"></script>
</body>

</html>