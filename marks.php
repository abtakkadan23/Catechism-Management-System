<?php
    include('session.php');
    include('config.php');

    if(isset($_POST['submit']))
    {
        $en = $_POST['ename'];
        $em = $_POST['emark'];
        // $query = "insert into catclass (class) values('$class')";
        $CC = mysqli_query($con, "select * from exams where e_name = '$en'");
        if($CC->num_rows>0)
        {
            echo "<script>alert('Exam already exist...'); window.location.href='marks.php';</script>";
        }
        else
        {
            $result = mysqli_query($con, "insert into exams (e_name, e_mark) values('$en', '$em')");
            echo "<script>alert('Exam created successfully...'); window.location.href='marks.php';</script>";
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
            function get_div(dvn)
            {
                // console.log(dvn);
                $.ajax(
                {
                    type: "POST",
                    url: "get_dvn.php",
                    data: 'divsn_id='+dvn,
                    success: function(data) 
                    {
                        $("#d").html(data);    
                    }
                });
            }

            $(document).ready(function() 
            {
                $('#data-form').submit(function(event) 
                {
                    event.preventDefault();
                    
                    var formData = $(this).serialize();
                    
                    $.ajax(
                    {
                        url: 'genatt.php',
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
                        <a href="attendview.php">
                            <span class="icon icon-4"><i class="ri-calendar-2-line"></i></span>
                            <span class="sidebar--item">Attendance</span>
                        </a>
                    </li>
                    <li>
                        <a href="marks.php" id="active--link">
                            <span class="icon icon-4"><i class="ri-numbers-fill"></i></span>
                            <span class="sidebar--item">Exams</span>
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
                    <a href="marks.php" style="margin-right: 20px;" id="active--link">
                        <i class="ri-line-chart-line"></i>
                        Schedule Exam
                    </a>
                </span>

                <span class="topbar--item">
                    <a href="adminvmarks.php" style="margin-right: 20px;">
                        <i class="ri-line-chart-line"></i>
                        View Marks
                    </a>
                </span>
                
                <!-- <span class="topbar--item">
                    <a href="facattendtake.php">
                        <i class="ri-line-chart-line"></i>
                        Take Faculties'
                    </a>
                </span>
                <span class="topbar--item">
                    <a href="facattendview.php" style="margin-right: 20px;">
                        <i class="ri-line-chart-line"></i>
                        View Faculties'
                    </a>
                </span> -->
            </div>
            <div class="main--content">
            <form action="" method="post">  
                    <div class="title">
                        <h2 class="section--title">Create a new exam</h2>
                    </div>
                    <div class="table-3">
                        <table>
                            <tr>
                                <td>
                                    Exam name : 
                                    <input type="text" id="ename" name="ename" required>
                                </td>
                                <td>
                                    Maximum marks : 
                                    <input type="number" id="emark" name="emark" min="10" max="100" required>
                                </td>
                                <td><input type="submit" value="CREATE" id="submit" name="submit" class="addbtn" style="height: 30px; width: 100%; font-weight: bold;"></td>
                            </tr>
                        </table>
                    </div>
                </form>
                <br><br>
                <div class="table-22">
                    <table>
                        <tr>
                            <td colspan = "3">
                                SCHEDULED EXAMS
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Exam
                            </th>
                            <th>
                                Maximum Marks
                            </th>
                            <th>
                                ACTION
                            </th>
                        </tr>
                            <?php
                                $query = "select * from exams order by e_name";
                                $re = mysqli_query($con, $query);
                                while($ro = $re->fetch_assoc())
                                {
                        ?>
                        <tr>
                            <td>
                                        <?php echo $ro['e_name']; ?>
                            </td>
                            <td>
                                        <?php echo $ro['e_mark']; ?>
                            </td>
                            <td style="width: 30%;">
                                <a href="removexam.php?id=<?php echo $ro['e_id'];?>">
                                    <button class="addbtn" style="height: 30px; width: 100%; font-weight: bold;">
                                        REMOVE EXAM
                                    </button>
                                </a>
                            </td>
                            <?php
                                }
                            ?>
                        </tr>
                    </table>
                </div>
            </div>      
        </section>
    </body>

</html>