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
    <link rel="stylesheet" href="addnewfacstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="validate.js"></script>
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
                        <span class="sidebar--item">Add Faculty</span>
                    </a>
                </li>
                <li>
                <li>
                    <a href="addnewstudent.php">
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
                <li>
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
                    <a href="#">
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
        <div class="main--content">
            <div class="facreg">
                <div class="form">
                    
                    <h2 class="section--title">Register Multiple Faculties</h2>
                    <form action="facultyimportbyadmin.php" method="post" enctype="multipart/form-data">
                        <p><b>Save your Excel sheet in .csv format</b></p>
                        <input type="file" placeholder="Upload the Excel file" id="excel_file" name="excel_file" accept=".csv"><br>
                        <button type="submit" name="submitmulti" id="submitmulti" class="loginbutton">
                            Import Details
                        </button> <br> <br>
                    </form>
                    
                    <center><p><b>OR</b></p></center>

                    <h2 class="section--title">Register a Single Faculty</h2>
                    <form action="facultyregbyadmin.php" method="post" id="facregform">

                        <p>Name :</p>
                        <input class="from" type="text" placeholder="Name of the Faculty" id="facname" name="facname" octavalidate="R" ><br>
                        <div class="error"></div>

                        <p>Baptism Name :</p>
                        <input type="text" placeholder="Baptism Name of the Faculty" id="facbname" name="facbname" octavalidate="R"><br>
                        <div class="error"></div>
                        
                        <p>Gender :</p>
                        <select type="text" name="gender" id="gender" name="gender" octavalidate="R">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                        
                        <p>House Name :</p>
                        <input type="text" placeholder="House name" id="fachname" name="fachname" octavalidate="R"><br>
                        <div class="error"></div>

                        <p>Contact Number :</p> 
                        <input type="text" placeholder="Contact Number" id="facmobno" name="facmobno" octavalidate="R"><br>
                        <div class="error"></div>
                        
                        <p>Email :</p>
                        <input type="email" placeholder=" Email" id="facemail" name="facemail" octavalidate="R"><br>
                        <div class="error"></div>

                        <p>Date of Birth :</p>
                        <input type="date" placeholder="Date of Birth" id="facdob" name="facdob" octavalidate="R"><br>
                        <div class="error"></div>

                        <p>Class :</p>
                        <select name="class" aria-placeholder="Class" id="class" octavalidate="R">
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
                        </select>

                        <p>Designation :</p>
                        <select name="desig" id="desig" octavalidate="R">
                            <option value="Faculty">Faculty</option>
                            <option value="Asst. Faculty">Asst. Faculty</option>
                        </select>

                        <p>Qualifiction :</p>
                        <input type="text" placeholder="Qualification" id="facqual" name="facqual" octavalidate="R"><br>
                        <div class="error"></div>

                        <p>Current Job :</p>
                        <input type="text" placeholder="Current Job" id="facjob" name="facjob" octavalidate="R"><br>
                        <div class="error"></div>

                        <p>Name of Father :</p>
                        <input type="text" placeholder="Father's Name" id="facfather" name="facfather" octavalidate="R"><br>
                        <div class="error"></div>

                        <p>Name of Mother :</p>
                        <input type="text" placeholder="Mother's Name" id="facmother" name="facmother" octavalidate="R"><br>
                        <div class="error"></div>

                        <!-- <p>Upload Photo :</p>
                        <input type="file" placeholder="Upload your photo" id="facpic" name="facpic" accept="" required><br>
                        <div class="error"></div> -->

                        <p>Enter a password :</p>
                        <input type="password" placeholder="Enter Password" id="facpassword" name="facpassword" octavalidate="R"><br>
                        <div class="error"></div>

                        <p>Enter the password again :</p>
                        <input type="password" placeholder="Re-enter Password" id="facrepassword" name="facrepassword" octavalidate="R"><br>
                        <div class="error"></div>

                        <button type="submit" name="submit" id="submit" class="loginbutton">
                            Register
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="admin.js"></script>
    <script>
        //create new instance of the function
        const myForm = new octaValidate('facregform');
        //listen for submit event
        document.getElementById('facregform').addEventListener('submit', function(e)
        {
            e.preventDefault();
            //invoke the method
            if(myForm.validate() === true)
            { 
            //validation successful, process form data here
            } else {
            //validation failed
            }
        })
    </script>
</body>

</html>