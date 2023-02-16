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
    <link rel="stylesheet" href="addnewstudstyle.css">
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
                    <a href="addnewfaculty.php" id="active--link">
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
                <a href="addnewfaculty.php" style="margin-right: 20px;">
                    <i class="ri-line-chart-line"></i>
                    Faculties
                </a>
            </span>
            <span class="topbar--item">
                <a href="addnewstudent.php" id="active--link">
                    <i class="ri-line-chart-line"></i>
                    Students
                </a>
            </span> 
        </div>
        <div class="main--content">
            <div class="form">

                <h2 class="section--title">Register Multiple Students</h2>
                <form action="studentimportbyadmin.php" method="post" enctype="multipart/form-data">
                    <table style="table-layout: fixed; width: 100%;">
                        <tr>
                            <td>
                                <p><b>Download the Excel sheet to fill in the details</b></p>
                                <a href="download.php?file=StudentDetails.xlsx">
                                    <div class="download">
                                        Download Excel file
                                    </div>
                                </a>
                            </td>
                            <td>
                                <p><b>Save your Excel sheet in .csv format before uploading</b></p>
                                <input type="file" placeholder="Upload the Excel file" id="excel_file" name="excel_file" accept=".csv" style="border: none;"><br>
                            </td>
                        </tr>
                    </table>    

                    <button type="submit" name="submitmulti" id="submitmulti" class="loginbutton">
                        Import Details
                    </button>
                    
                </form>
            </div> <br>
            <div class="form">
                <h2 class="section--title">Register a Single Student</h2>
                <form action="studentregbyadmin.php" method="post">
                    <table style="table-layout: fixed; width: 100%;">
                        <tr>
                            <td>
                                <p>Name :</p>
                                <input type="text" placeholder="Name of the Student" id="facname" name="facname" required><br>
                            </td>

                            <td>
                                <p>Baptism Name :</p>
                                <input type="text" placeholder="Baptism Name of the Student" id="facbname" name="facbname" required><br>
                                <div class="error"></div>                                    
                            </td>

                            <td>
                                <p>Gender :</p>
                                <select type="text" name="gender" id="gender" name="gender" required>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <p>House Name :</p>
                                <input type="text" placeholder="House name" id="fachname" name="fachname" required><br>
                            </td>

                            <td>
                                <p>Contact Number :</p>
                                <input type="text" placeholder="Mobile Number" id="facmobno" name="facmobno" required><br>
                            </td>

                            <td>
                                <p>Email :</p>
                                <input type="email" placeholder="Enter Email" id="facemail" name="facemail" required><br>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <p>Date of Birth :</p>
                                <input type="date" placeholder="Date of Birth" id="facdob" name="facdob" required><br>
                            </td>

                            <td>
                                <p>Class :</p>
                                <select type="text" name="class" id="class" octavalidate="R">
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
                                <!-- <select name="class" aria-placeholder="Class" id="class" required>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option> 
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option> 
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option> 
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option> 
                                </select> -->
                            </td>

                            <td>
                                <p>Name of Father :</p>
                                <input type="text" placeholder="Father's Name" id="facfather" name="facfather" required><br>
                                <div class="error"></div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <p>Name of Mother :</p>
                                <input type="text" placeholder="Mother's Name" id="facmother" name="facmother" required><br>
                                <div class="error"></div>
                            </td>

                            <td>
                                <p>Enter a Password :</p>
                                <input type="password" placeholder="Enter Password" id="facpassword" name="facpassword" required><br>
                            </td>

                            <td>
                                <p>Enter the Password again :</p>
                                <input type="password" placeholder="Re-enter Password" id="facrepassword" name="facrepassword" required><br>
                            </td>
                        </tr>
                    
                    </table>
                    <button type="submit" name="submit" id="submit" class="loginbutton">
                        Register
                    </button>
                </form>
            </div>
        </div>
    </section>
    <script src="admin.js"></script>
</body>

</html>