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
                    <a href="managefaculty.php">
                        <span class="icon icon-2"><i class="ri-user-line"></i></span>
                        <span class="sidebar--item">Manage Members</span>
                    </a>
                </li>
                    <li>
                        <a href="manageclass.php" id="active--link">
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
                    <a href="manageclass.php" style="margin-right: 20px;">
                        <i class="ri-line-chart-line"></i>
                        <span class="topbar--items">Create Class</span> 
                    </a>
                </span>
                <span class="topbar--item">
                    <a href="classoptions.php" style="margin-right: 20px;" id="active--link">
                        <i class="ri-line-chart-line"></i>
                        <span class="topbar--items">Class Options</span> 
                    </a>
                </span>
                <span class="topbar--item" >
                    <a href="assignteacher.php">
                        <i class="ri-line-chart-line"></i>
                        Assign Teachers
                    </a>
                </span>
                <span class="topbar--item">
                    <a href="placestudents.php">
                        <i class="ri-line-chart-line"></i>
                        Place Students
                    </a>
                </span>
                <span class="topbar--item">
                    <a href="viewclass.php">
                        <i class="ri-line-chart-line"></i>
                        View Class
                    </a>
                </span>
            </div>
            <div class="main--content">
                <h2>Remove a class</h2><br>
                <div class="table-22"> 
                    <div>
                        <table>
                            <tr>
                                <th colspan="2">
                                    CLASSES
                                </th>
                            </tr>
                                <?php
                                    $query1 = "select * from catclass order by class";
                                    $res = mysqli_query($con, $query1);
                                    while($rows = $res->fetch_assoc())
                                    {
                                ?>
                            <tr>
                                    <td>
                                        <?php echo $rows['class']; ?>
                                    </td>
                                    <td style="width: 30%;"><a href="deleteclass.php?id=<?php echo $rows['classid'];?>"><button class="addbtn" style="height: 30px; width: 100%;">DELETE</button></a></td>
                                    <!-- <td style="width: 30%;">
                                        <input type="button" value="DELETE" name="del" id="del" class="addbtn" style="height: 30px; width: 100%;">
                                    </td> -->
                                <?php
                                    }
                                ?>
                            </tr>
                        </table>
                    </div>
                </div><br><br>
                <h2>Remove a division</h2><br>
                <div class="table-22">
                    <div>
                        <table>
                            <tr>
                                <th colspan="2">
                                    DIVISIONS
                                </th>
                            </tr>
                                <?php
                                    $query1 = "select * from tbl_div order by division";
                                    $res = mysqli_query($con, $query1);
                                    while($rws = $res->fetch_assoc())
                                    {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $rws['division']; ?>
                                    </td>
                                    <td style="width: 30%;"><a href="deletediv.php?id=<?php echo $rws['divid'];?>"><button class="addbtn" style="height: 30px; width: 100%;">DELETE</button></a></td>
                                    <!-- <td style="width: 30%;">
                                        <input type="button" value="DELETE" name="del" id="del" class="addbtn" style="height: 30px; width: 100%;">
                                    </td> -->
                                <?php
                                    }
                                ?>
                            </tr>
                        </table>
                    </div>
                </div>
                <br><br>
                <h2>Remove a batch</h2><br>
                <div class="table-22">
                    <div>
                        <table>
                            <tr>
                                <td colspan = "4">
                                    Available Classes
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    CLASS
                                </th>
                                <th>
                                    DIVISION
                                </th>
                                <th>
                                    ACTION
                                </th>
                            </tr>
                                <?php
                                    $query = "select * from assoclass";
                                    $re = mysqli_query($con, $query);
                                    while($ro = $re->fetch_assoc())
                                    {
                            ?>
                            <tr>
                                    <?php
                                        $i = $ro['class_id'];
                                        $query1 = "select * from catclass where classid = '$i'";
                                        $res = mysqli_query($con, $query1);
                                        while($rows = $res->fetch_assoc())
                                        {  
                                    ?>
                                <td>
                                            <?php echo $rows['class']; ?>
                                </td>

                                    <?php
                                        }
                                        $i = $ro['div_id'];
                                        $query1 = "select * from tbl_div where divid = '$i'";
                                        $res = mysqli_query($con, $query1);
                                        while($rows = $res->fetch_assoc())
                                        {
                                    ?>
                                <td>
                                            <?php echo $rows['division']; ?>
                                </td>

                                    <?php
                                        }
                                    ?>
                                <td style="width: 30%;"><a href="deleteassoc.php?id=<?php echo $ro['assoc_id'];?>"><button class="addbtn" style="height: 30px; width: 100%;">DELETE</button></a></td>
                                <?php
                                    }
                                ?>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <script src="admin.js"></script>
    </body>

</html>