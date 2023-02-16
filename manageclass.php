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
                    <a href="manageclass.php" style="margin-right: 20px;" id="active--link">
                        <i class="ri-line-chart-line"></i>
                        <span class="topbar--items">Create Class</span> 
                    </a>
                </span>
                <span class="topbar--item">
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
            </div>
            <div class="main--content">
                <form action="createClass.php" method="post">  
                    <div class="title">
                        <h2 class="section--title">Add new class...</h2>
                    </div>
                    <div class="table-3">
                        <table>
                            <tr>
                                <td>
                                    Enter class : 
                                    <input type="text" id="cls" name="cls" required>
                                </td>
                                <td><input type="submit" value="Add" id="submit" name="submit" class="addbtn" style="height: 100%; width: 100%;"></td>
                            </tr>
                        </table>
                    </div>
                </form>
                <form action="createDiv.php" method="post">  
                    <div class="title">
                        <h2 class="section--title">Add new division...</h2>
                    </div>
                    <div class="table-3">
                        <table>
                            <tr>
                                <td>
                                    Enter division : 
                                    <input type="text" id="div" name="div" required>
                                </td>
                                <td><input type="submit" value="Add" id="submit" name="submit" class="addbtn" style="height: 100%; width: 100%;"></td>
                            </tr>
                        </table>
                    </div>
                </form>
                <form action="setclass.php" method="post">  
                    <div class="title">
                        <h2 class="section--title">Set a new class...</h2>
                    </div>
                    <div class="table-3">
                        <table>
                            <tr>
                                <th>
                                    Select a class
                                </th>
                                <th>
                                    Select a division
                                </th>
                            </tr>
                            <tr>
                                <td>
                                    <select type="text" name="c" id="c">
                                        <?php
                                            $q2 = "select * from catclass";
                                            $r2 = mysqli_query($con, $q2);

                                            if (mysqli_num_rows($r2) > 0) {
                                                // output data of each row
                                                while($row = mysqli_fetch_assoc($r2)) 
                                                {
                                                echo "<option>".$row["class"]."</option>";
                                                }
                                            }                                        
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <select type="text" name="d" id="d">
                                        <?php
                                            $q4 = "select * from tbl_div";
                                            $r4 = mysqli_query($con, $q4);

                                            if (mysqli_num_rows($r4) > 0)
                                            {
                                                // output data of each row
                                                while($row = mysqli_fetch_assoc($r4))
                                                {
                                                echo "<option>".$row["division"]."</option>";
                                                }
                                            }                                        
                                        ?>
                                    </select>
                                </td>
                                <td style="border: none; ">
                                    <input type="submit" value="Associate" id="submit" name="submit" class="addbtn" style="height: 30px; width: 100%;">
                                </td>
                            </tr>
                        </table>
                    </div>
                </form>
                <br><br>
                <div class="table-2">
                        <table>
                            <tr>
                                <th colspan="2">
                                    CLASSES
                                </th>
                            </tr>
                                <?php
                                    $query1 = "select * from catclass";
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
                    <div class="table-2">
                        <table>
                            <tr>
                                <th colspan="2">
                                    DIVISIONS
                                </th>
                            </tr>
                                <?php
                                    $query1 = "select * from tbl_div";
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
            
            
        </section>
        <script src="admin.js"></script>
    </body>

</html>