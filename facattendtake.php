<?php
    include('session.php');
    include('config.php');

    if(isset($_GET['type']) && $_GET['type']!='')
    {
        $type=($_GET['type']);
    
        if($type=='status')
        {
            $operation=($_GET['operation']);
            echo "<script> alert($operation);</script>";
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
            $sql2=mysqli_query($con, "UPDATE tbl_attend SET status = '$status' WHERE userid = '$id' AND at_date = curdate()");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="managefacultystyle.css">
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <script>
            // function get_div(dvn)
            // {
            //     // console.log(dvn);
            //     $.ajax({
            //         type: "POST",
            //         url: "get_dvn.php",
            //         data: 'divsn_id='+dvn,
            //         success: function(data) 
            //         {
            //             $("#d").html(data);    
            //         }
            //     });
            // }
            // function changestatus(sta)
            // {
            //     // console.log(sta);
            //     // alert(sta);
            //     var tdElement = document.getElementById('attlink');
            //     $.ajax({
            //         type: "POST",
            //         url: "changeteacheratt.php",
            //         data: 'fid='+sta,
            //         success: function(response) 
            //         {
            //             tdElement.innerHTML=response;
            //             // $("#attlink").html(response); 
            //         },
            //         error: function()
            //         {
            //             alert('failed to load');
            //         }
            //     });
            // }
        </script>
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
                        <a href="manageclass.php" >
                            <span class="icon icon-6"><i class="ri-line-chart-line"></i></span>
                            <span class="sidebar--item">Manage Class</span>
                        </a>
                    </li>
                    <li>
                        <a href="attendview.php" id="active--link">
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
                    <a href="attendview.php" >
                        <i class="ri-line-chart-line"></i>
                        View Students'
                    </a>
                </span>
                <span class="topbar--item">
                    <a href="facattendtake.php" style="margin-right: 20px;" id="active--link">
                        <i class="ri-line-chart-line"></i>
                        Take Faculties'
                    </a>
                </span>
                <span class="topbar--item">
                    <a href="facattendview.php" style="margin-right: 20px;">
                        <i class="ri-line-chart-line"></i>
                        View Faculties'
                    </a>
                </span>
            </div>
        <div class="main--content">
            <!-- <form action="chageteacheeatt.php" method="POST"> -->
                <div class="title">
                    <h2 class="section--title"><b>Faculties</b></h2>
                    <p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><?php echo date("d/m/Y"); ?>
                    <!-- <h3>Choose date</h3>
                    <input type="date" placeholder="Date of Birth" id="facdob" name="facdob"><br> -->
                </div>
                <div class="recent--patients" style="height: 500px;">
                    <div class="table">
                        <table>
                            <thead>
                                <tr>
                                    <th>FACULTY ID</th>
                                    <th>NAME</th>
                                    <th>STATUS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- PHP CODE TO FETCH DATA FROM ROWS -->
                                <?php
                                    // LOOP TILL END OF DATA
                                    $sql2="SELECT * FROM `adminregisterfaculty` where `status`=1 order by facultyname";
                                    $result2 = mysqli_query($con, $sql2);
                                    while($rows=$result2->fetch_assoc())
                                    {
                                        $uid = $rows['facultyid'];
                                        $sql5=mysqli_query($con, "SELECT * FROM `tbl_attend` WHERE `userid`='$uid' AND `at_date`=curdate()");
                                        if(mysqli_num_rows($sql5)!=0)
                                        {
                                    ?>
                                            <tr>
                                                <!-- FETCHING DATA FROM EACH
                                                ROW OF EVERY COLUMN -->
                                                <td>
                                                    <?php echo $rows['facultyid'];?>
                                                </td>

                                                <td>
                                                    <?php echo $rows['facultyname'];?>
                                                </td>

                                                <td id="attlink">
                                                    <?php
                                                        // echo "<script> alert($xxx);</script>";
                                                        $sql3=mysqli_query($con,"SELECT * FROM tbl_attend WHERE userid='$uid' AND at_date=curdate() AND status=1");
                                                        // $count = mysqli_num_rows($sql3);
                                                        if(mysqli_num_rows($sql3) != 0)
                                                        {
                                                    ?>      
                                                            <a href="?type=status&operation=deactive&id=<?php echo $rows['facultyid'];?>"><button style="color: White; background-color:green; width:80px; height:30px;">PRESENT</button></a>
                                                    <?php
                                                        } 
                                                        else
                                                        { 
                                                    ?>
                                                            <a href="?type=status&operation=active&id=<?php echo $rows['facultyid'];?>"><button style="color: White; background-color:red; width:80px; height:30px;">ABSENT</button></a>                                                    
                                                    <?php
                                                        }
                                                    ?>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                        else
                                        {
                                            $sql4=mysqli_query($con, "INSERT INTO tbl_attend (userid, status, at_date) values('$uid', 0, curdate())");
                                    ?>
                                            <tr>
                                                <!-- FETCHING DATA FROM EACH
                                                ROW OF EVERY COLUMN -->
                                                <td>
                                                    <?php echo $rows['facultyid'];?>
                                                </td>

                                                <td>
                                                    <?php echo $rows['facultyname'];?>
                                                </td>

                                                <td id="attlink">
                                                    <?php
                                                        // echo "<script> alert($xxx);</script>";
                                                        $sql3=mysqli_query($con,"SELECT * FROM tbl_attend WHERE userid='$uid' AND at_date=curdate() AND status=1");
                                                        // $count = mysqli_num_rows($sql3);
                                                        if(mysqli_num_rows($sql3) != 0)
                                                        {
                                                    ?>      
                                                            <a href="?type=status&operation=deactive&id=<?php echo $rows['facultyid'];?>"><button style="color: White; background-color:green; width:80px; height:30px;">PRESENT</button></a>
                                                    <?php
                                                        } 
                                                        else
                                                        { 
                                                    ?>
                                                            <a href="?type=status&operation=active&id=<?php echo $rows['facultyid'];?>"><button style="color: White; background-color:red; width:80px; height:30px;">ABSENT</button></a>                                                    
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
</body>

</html>