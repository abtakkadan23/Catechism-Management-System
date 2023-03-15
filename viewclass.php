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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <script>
            function get_div(dvn)
            {
                // console.log(dvn);
                $.ajax({
                    type: "POST",
                    url: "get_dvn.php",
                    data: 'divsn_id='+dvn,
                    success: function(data) 
                    {
                        $("#d").html(data);    
                    }
                });
            }

            $(document).ready(function() {
            $('#data-form').submit(function(event) {
                event.preventDefault();
                
                var formData = $(this).serialize();
                
                $.ajax({
                url: 'get_data.php',
                method: 'POST',
                data: formData,
                success: function(response) {
                    $('#data-container').html(response);
                },
                error: function(xhr, status, error) {
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
                    <a href="classoptions.php" style="margin-right: 20px;">
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
                    <a href="viewclass.php" id="active--link">
                        <i class="ri-line-chart-line"></i>
                        View Class
                    </a>
                </span>
            </div>
            <div class="main--content">
                <form action="" method="POST" id="data-form" enctype="multipart/form-data">  
                    <div class="title">
                        <h2 class="section--title">Select a class and click view...</h2>
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
                                    <select type="text" name="c" id="c" onChange="get_div(this.value);">
                                        <option value="">Select a class</option>
                                        <?php
                                            $q2 = "select * from catclass order by class";
                                            $r2 = mysqli_query($con, $q2);

                                            if (mysqli_num_rows($r2) > 0) 
                                            {
                                                 // output data of each row
                                                while($row = mysqli_fetch_assoc($r2)) 
                                                {
                                        ?>
                                                <option value="<?php echo $row['classid'];?>"><?php echo $row['class'];?></option>;
                                        <?php
                                                }
                                            }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <select type="text" name="d" id="d">
                                        <option value="">
                                            Select Division
                                        </option>
                                    </select>
                                </td>
                                <td style="border: none; ">
                                    <input type="submit" value="View" id="submit" name="submit" class="addbtn" style="height: 30px; width: 100%;">
                                </td>
                            </tr>
                        </table>
                    </div>
                </form>
                <br><br>
                <div class="table-2x" id="data-container">
                </div>
            </div>
            <div></div>
        </section>
        <script src="admin.js"></script>
    </body>

</html>