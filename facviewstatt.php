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
    <link rel="stylesheet" href="studtakeatte.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <title>Dashboard</title>
    <script>

        $(document).ready(function() 
        {
            $('#data-form').submit(function(event) 
            {
                event.preventDefault();
            
                var formData = $(this).serialize();
            
                $.ajax(
                {
                    url: 'get_stattdate.php',
                    method: 'POST',
                    data: formData,
                    success: function(response) 
                    {
                        $('#data-container').html(response);
                    },
                    error: function(xhr, status, error) 
                    {
                        console.log(xhr.responseText);
                    }
                });
            });
        });

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
                <a href="takeattendance.php">
                    <i class="ri-line-chart-line"></i>
                    Take Attendance
                </a>
            </span>
            <span class="topbar--item">
                <a href="facviewstatt.php" style="margin-right: 20px;" id="active--link">
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
            <form action="" method="POST" id="data-form">  
                <div class="title">
                    <h2 class="section--title">Select a date and click view...</h2>
                </div>
                <div class="table-3">
                    <table>
                        <tr>
                            <th>
                                Select date
                            </th>
                        </tr>
                        <tr>
                            <td>
                                <!-- <input type="date" placeholder="Select date" id="atdate" name="atdate"><br> -->
                                <select type="text" name="d" id="d">
                                    <option value="">Select a date</option>
                                    <?php
                                        $q2 = mysqli_query($con, "SELECT DISTINCT s_atdate FROM tbl_studatt");

                                        if (mysqli_num_rows($q2) > 0) 
                                        {
                                                // output data of each row
                                            while($row = mysqli_fetch_assoc($q2)) 
                                            {
                                    ?>
                                            <option value="<?php echo $row['s_atdate'];?>"><?php echo $row['s_atdate'];?></option>;
                                    <?php
                                            }
                                        }
                                    ?>
                                </select>
                            </td>
                            <td style="border: none; ">
                                <input type="submit" value="View" id="submit" name="submit" class="addbtn" style="height: 30px; width: 100%;">
                            </td>
                        </tr>
                    </table>
                </div>
            </form><br>
            <div class="table-2x" id="data-container">
            </div>
        </div>
        </div> 
        
    </section>
    <script src="admin.js"></script>
</body>

</html>