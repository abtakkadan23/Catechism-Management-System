<?php
    include('session.php');
    include('config.php');

    if(isset($_GET['type']) && $_GET['type']!='')
    {
        $type=($_GET['type']);
    
        if($type=='status')
        {
            $operation=($_GET['operation']);
            // echo "<script> alert($operation);</script>";
            $id=($_GET['id']);
            // $d=date("Y/m/d");
            // echo "<script> alert($id);</script>";

            if($operation=='active')
            {
            $status='1';
            }
            else
            {
            $status='0';
            }
            // echo "<script> alert($status);</script>";
            $sql2=mysqli_query($con, "UPDATE tbl_studatt SET s_status = '$status' WHERE studid = '$id' AND s_atdate = curdate()");
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
                    <a href="takeattendance.php" id="active--link">
                        <span class="icon icon-4"><i class="ri-calendar-2-line"></i></span>
                        <span class="sidebar--item">Attendance</span>
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
                    <a href="takeattendance.php" id="active--link">
                        <i class="ri-line-chart-line"></i>
                        Take Attendance
                    </a>
                </span>
                <span class="topbar--item">
                    <a href="facviewstatt.php" style="margin-right: 20px;">
                        <i class="ri-line-chart-line"></i>
                        View Attendance
                    </a>
                </span>
                <!-- <span class="topbar--item">
                    <a href="facattendview.php" style="margin-right: 20px;">
                        <i class="ri-line-chart-line"></i>
                        View Faculties'
                    </a>
                </span> -->
            </div>
        
        <div class="main--content">
            <!-- <form action="chageteacheeatt.php" method="POST"> -->
                <div class="title">
                    <h2 class="section--title"><b>Students</b></h2>
                    <p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><?php echo date("d/m/Y"); ?>
                    <!-- <h3>Choose date</h3>
                    <input type="date" placeholder="Date of Birth" id="facdob" name="facdob"><br> -->
                </div>
                <div class="recent--patients" style="height: 500px;">
                    <div class="table">
                        <table>
                            <thead>
                                <tr>
                                    <th>STUDENT ID</th>
                                    <th>NAME</th>
                                    <th>STATUS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- PHP CODE TO FETCH DATA FROM ROWS -->
                                <?php
                                    // LOOP TILL END OF DATA
                                    $stdclass = $rst['facultyclass'];
                                    $sql2="SELECT * FROM `adminregisterstudent` where `status`=1 and `studentclass`='$stdclass' order by `studentname`";
                                    $result2 = mysqli_query($con, $sql2);
                                    while($rows=$result2->fetch_assoc())
                                    {
                                        $uid = $rows['studentid'];
                                        $class = $rows['studentclass'];
                                        $sql5=mysqli_query($con, "SELECT * FROM `tbl_studatt` WHERE `studid`='$uid' AND `s_atdate`=curdate()");
                                        if(mysqli_num_rows($sql5)!=0)
                                        {
                                    ?>
                                            <tr>
                                                <!-- FETCHING DATA FROM EACH
                                                ROW OF EVERY COLUMN -->
                                                <td>
                                                    <?php echo $rows['studentid'];?>
                                                </td>

                                                <td>
                                                    <?php echo $rows['studentname'];?>
                                                </td>

                                                <td id="attlink">
                                                    <?php
                                                        // echo "<script> alert($xxx);</script>";
                                                        $sql3=mysqli_query($con,"SELECT * FROM tbl_studatt WHERE studid='$uid' AND s_atdate=curdate() AND s_status=1");
                                                        // $count = mysqli_num_rows($sql3);
                                                        if(mysqli_num_rows($sql3) != 0)
                                                        {
                                                    ?>      
                                                            <a href="?type=status&operation=deactive&id=<?php echo $rows['studentid'];?>"><button style="color: White; background-color:green; width:80px; height:30px;">PRESENT</button></a>
                                                    <?php
                                                        } 
                                                        else
                                                        { 
                                                    ?>
                                                            <a href="?type=status&operation=active&id=<?php echo $rows['studentid'];?>"><button style="color: White; background-color:red; width:80px; height:30px;">ABSENT</button></a>                                                    
                                                    <?php
                                                        }
                                                    ?>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                        else
                                        {
                                            $sql4=mysqli_query($con, "INSERT INTO tbl_studatt (studid, s_status, s_atdate, class) values('$uid', 0, curdate(), $class)");
                                    ?>
                                            <tr>
                                                <!-- FETCHING DATA FROM EACH
                                                ROW OF EVERY COLUMN -->
                                                <td>
                                                    <?php echo $rows['studentid'];?>
                                                </td>

                                                <td>
                                                    <?php echo $rows['studentname'];?>
                                                </td>

                                                <td id="attlink">
                                                    <?php
                                                        // echo "<script> alert($xxx);</script>";
                                                        $sql3=mysqli_query($con,"SELECT * FROM tbl_studatt WHERE studid='$uid' AND s_atdate=curdate() AND s_status=1");
                                                        // $count = mysqli_num_rows($sql3);
                                                        if(mysqli_num_rows($sql3) != 0)
                                                        {
                                                    ?>      
                                                            <a href="?type=status&operation=deactive&id=<?php echo $rows['studentid'];?>"><button style="color: White; background-color:green; width:80px; height:30px;">PRESENT</button></a>
                                                    <?php
                                                        } 
                                                        else
                                                        { 
                                                    ?>
                                                            <a href="?type=status&operation=active&id=<?php echo $rows['studentid'];?>"><button style="color: White; background-color:red; width:80px; height:30px;">ABSENT</button></a>                                                    
                                                    <?php
                                                        }
                                                    ?>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                ?>
                            </tbody>  
                        </table>
                    </div>
                    <button type="submit" name="submit" id="submit" class="savebutton">
                        <h3>FINAL SAVE</h3>
                    </button>
                </div>
            <!-- </form> -->
        </div>
        
    </section>
    <script src="admin.js"></script>
</body>

</html>