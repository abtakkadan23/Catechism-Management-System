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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="./validate.js"></script>
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
                <a href="addnewfaculty.php" style="margin-right: 20px;" id="active--link">
                    <i class="ri-line-chart-line"></i>
                    Faculties
                </a>
            </span>
            <span class="topbar--item">
                <a href="addnewstudent.php">
                    <i class="ri-line-chart-line"></i>
                    Students
                </a>
            </span>
        </div>
        <div class="main--content">
            <div class="form">

                <h2 class="section--title">Register Multiple Faculties</h2>
                <form action="facultyimportbyadmin.php" method="post" enctype="multipart/form-data">
                    <table style="table-layout: fixed; width: 100%;">
                        <tr>
                            <td>
                                <p><b>Download the Excel sheet to fill in the details</b></p>
                                <a href="download.php?file=Faculty.xlsx">
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
                <h2 class="section--title">Register a Single Faculty</h2>
                <form class="form2" action="facultyregbyadmin.php" method="post" id="facregform">
                    
                    <table style="table-layout: fixed; width: 100%;">
                        <tr>
                            <td>
                                <p>Name :</p>
                                <input class="from" type="text" placeholder="Name of the Faculty" id="facname" name="facname" ><br>
                                <span class="error_form" id="facname_error_message" style="color:red; font-size :13px; "></span>
                            </td>

                            <td>
                                <p>Baptism Name :</p>
                                <input type="text" placeholder="Baptism Name of the Faculty" id="facbname" name="facbname"><br>
                                <span class="error_form" id="facbname_error_message" style="color:red; font-size :13px; "></span>
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
                                <input type="text" placeholder="House name" id="fachname" name="fachname"><br>
                                <span class="error_form" id="fachname_error_message" style="color:red; font-size :13px; "></span>
                            </td>

                            <td>
                                <p>Contact Number :</p> 
                                <input type="text" placeholder="Contact Number" id="facmobno" name="facmobno"><br>
                                <span class="error_form" id="facmobno_error_message" style="color:red; font-size :13px; "></span>
                            </td>

                            <td>
                                <p>Email :</p>
                                <input type="email" placeholder=" Email" id="facemail" name="facemail"><br>
                                <span class="error_form" id="facemail_error_message" style="color:red; font-size :13px; "></span>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <p>Date of Birth :</p>
                                <input type="date" placeholder="Date of Birth" id="facdob" name="facdob"><br>
                                <span class="error_form" id="facdob_error_message" style="color:red; font-size :13px; "></span>
                            </td>

                            

                            <td>
                                <p>Designation :</p>
                                <select name="desig" id="desig" required>
                                    <option value="Faculty">Faculty</option>
                                    <option value="Asst. Faculty">Asst. Faculty</option>
                                </select>
                            </td>

                            <td>
                                <p>Qualifiction :</p>
                                <input type="text" placeholder="Qualification" id="facqual" name="facqual"><br>
                                <span class="error_form" id="facqual_error_message" style="color:red; font-size :13px; "></span>
                            </td>
                        </tr>
                        <tr>                       
                            
                            <td>
                                <p>Current Job :</p>
                                <input type="text" placeholder="Current Job" id="facjob" name="facjob"><br>
                                <span class="error_form" id="facjob_error_message" style="color:red; font-size :13px; "></span>
                            </td>

                            <td>
                                <p>Name of Father :</p>
                                <input type="text" placeholder="Father's Name" id="facfather" name="facfather"><br>
                                <span class="error_form" id="facfather_error_message" style="color:red; font-size :13px; "></span>
                            </td>
                        
                            <td>
                                <p>Name of Mother :</p>
                                <input type="text" placeholder="Mother's Name" id="facmother" name="facmother"><br>
                                <span class="error_form" id="facmother_error_message" style="color:red; font-size :13px; "></span>
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
</body>
<script>
    $(function () {
        $("#facname_error_message").hide();
        $("#facbname_error_message").hide();
        $("#fachname_error_message").hide();
        $("#facmobno_error_message").hide();
        $("#facemail_error_message").hide();
        $("#facdob_error_message").hide();
        $("#facqual_error_message").hide();
        $("#facjob_error_message").hide();
        $("#facfather_error_message").hide();
        $("#facmother_error_message").hide();

    var error_facname = false;
    var error_facbname = false;
    var error_fachname = false;
    var error_facmobno = false;
    var error_facemail = false;
    var error_facdob = false;
    var error_facqual = false;
    var error_facjob = false;
    var error_facfather = false;
    var error_facmother = false;

    $("#facname").keyup(function () {
        check_name();
    });

    $("#facqual").keyup(function () {
        check_qual();
    });

    $("#fachname").keyup(function () {
        check_hname();
    });

    $("#facbname").keyup(function () {
        check_bname();
    });

    $("#facmobno").keyup(function () {
        check_phone();
    });

    $("#facemail").keyup(function () {
        check_email();
    });

    $("#facjob").keyup(function () {
        check_job();
    });

    $("#facfather").keyup(function () {
        check_fname();
    });

    $("#facmother").keyup(function () {
        check_mname();
    });

        function check_name() {
            var pattern = /^[a-zA-Z-\/] ?([a-zA-Z-\/]|[a-zA-Z-\/] )*[a-zA-Z-\/]$/; 
            var pname = $("#facname").val();
            if (pattern.test(pname) && pname !== "") {
                $("#facname_error_message").hide();
                $("#facname").css("border", "2px solid #34F458");
            } else if (pname == "") {
                $("#facname_error_message").html("This column cannot be blank");
                $("#facname_error_message").show();
                $("#facname").css("border", "2px solid #F90A0A");
                error_facname  = true;
            } else {
                $("#facname_error_message").html("It should contain only charachters and length must be between 3 and  25 characters");
                $("#facname_error_message").show();
                $("#facname").css("border", "2px solid #F90A0A");
                error_facname = true;
            }
        }

        function check_bname() {
            var pattern = /^[a-zA-Z-\/] ?([a-zA-Z-\/]|[a-zA-Z-\/] )*[a-zA-Z-\/]$/; 
            var pname = $("#facbname").val();
            if (pattern.test(pname) && pname !== "") {
                $("#facbname_error_message").hide();
                $("#facbname").css("border", "2px solid #34F458");
            } else if (pname == "") {
                $("#facbname_error_message").html("This column cannot be blank");
                $("#facbname_error_message").show();
                $("#facbname").css("border", "2px solid #F90A0A");
                error_facbname = true;
            } else {
                $("#facbname_error_message").html("It should contain only charachters and length must be between 3 and  25 characters");
                $("#facbname_error_message").show();
                $("#facbname").css("border", "2px solid #F90A0A");
                error_facbname = true;
            }
        }

        function check_hname() {
            var pattern = /^[a-zA-Z-\/] ?([a-zA-Z-\/]|[a-zA-Z-\/] )*[a-zA-Z-\/]$/; 
            var pname = $("#fachname").val();
            if (pattern.test(pname) && pname !== "") {
                $("#fachname_error_message").hide();
                $("#fachname").css("border", "2px solid #34F458");
            } else if (pname == "") {
                $("#fachname_error_message").html("This column cannot be blank");
                $("#fachname_error_message").show();
                $("#fachname").css("border", "2px solid #F90A0A");
                error_fachname = true;
            } else {
                $("#fachname_error_message").html("It should contain only charachters and length must be between 3 and  25 characters");
                $("#fachname_error_message").show();
                $("#fachname").css("border", "2px solid #F90A0A");
                error_fachname = true;
            }
        }
        
        function check_phone() {
            var phone = $("#facmobno").val();
            var pattern = /^[6,7,8,9][0-9]{0,9}$/;
            if (phone.length == 10 && pattern.test(phone)) {
                $("#facmobno_error_message").hide();
                $("#facmobno").css("border-bottom", "2px solid #34F458");
            } else if (phone == "") {
                $("#facmobno_error_message").html("Phone number cannot be blank");
                $("#facmobno_error_message").show();
                $("facmobno").css("border-bottom", "2px solid #F90A0A");
                error_facmobno = true;
            } else {
                $("#facmobno_error_message").html("Enter valid phone number");
                $("#facmobno_error_message").show();
                $("facmobno").css("border-bottom", "2px solid #F90A0A");
                error_facmobno = true;
            }
        }

        function check_email() 
        {
            var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            var email = $("#facemail").val();
            if (pattern.test(email) && email !== "") {
                $("#facemail_error_message").hide();
                $("facemail").css("border-bottom", "2px solid #34F458");
            } else {
                $("#facemail_error_message").html("Email should be in proper format and cannot be blank");
                $("#facemail_error_message").show();
                $("#facemail").css("border-bottom", "2px solid #F90A0A");
                error_email = true;
            }
        }

        function check_job() {
            var pattern = /^[a-zA-Z0-9-\/] ?([a-zA-Z0-9-\/]|[a-zA-Z0-9-\/] )*[a-zA-Z0-9-\/]$/; 
            var pname = $("#facjob").val();
            if (pattern.test(pname) && pname !== "") {
                $("#facjob_error_message").hide();
                $("#facjob").css("border", "2px solid #34F458");
            } else if (pname == "") {
                $("#facjob_error_message").html("This column cannot be blank");
                $("#facjob_error_message").show();
                $("#facjob").css("border", "2px solid #F90A0A");
                error_facjob = true;
            } else {
                $("#facjob_error_message").html("It should contain only charachters and length must be between 3 and  25 characters");
                $("#facjob_error_message").show();
                $("#facjob").css("border", "2px solid #F90A0A");
                error_facjob = true;
            }
        }

        function check_qual() {
            var pattern = /^[a-zA-Z0-9-\/] ?([a-zA-Z0-9-\/]|[a-zA-Z0-9-\/] )*[a-zA-Z0-9-\/]$/; 
            var pname = $("#facqual").val();
            if (pattern.test(pname) && pname !== "") {
                $("#facqual_error_message").hide();
                $("#facqual").css("border", "2px solid #34F458");
            } else if (pname == "") {
                $("#facqual_error_message").html("This column cannot be blank");
                $("#facqual_error_message").show();
                $("#facqual").css("border", "2px solid #F90A0A");
                error_facqual = true;
            } else {
                $("#facqual_error_message").html("It should contain only charachters and length must be between 3 and  25 characters");
                $("#facqual_error_message").show();
                $("#facqual").css("border", "2px solid #F90A0A");
                error_facqual = true;
            }
        }

        function check_fname() {
            var pattern = /^[a-zA-Z-\/] ?([a-zA-Z-\/]|[a-zA-Z-\/] )*[a-zA-Z-\/]$/; 
            var pname = $("#facfather").val();
            if (pattern.test(pname) && pname !== "") {
                $("#facfather_error_message").hide();
                $("#facfather").css("border", "2px solid #34F458");
            } else if (pname == "") {
                $("#facfather_error_message").html("This column cannot be blank");
                $("#facfather_error_message").show();
                $("#facfather").css("border", "2px solid #F90A0A");
                error_facfather = true;
            } else {
                $("#facfather_error_message").html("It should contain only charachters and length must be between 3 and  25 characters");
                $("#facfather_error_message").show();
                $("#facfather").css("border", "2px solid #F90A0A");
                error_facfather = true;
            }
        }

        function check_mname() {
            var pattern = /^[a-zA-Z-\/] ?([a-zA-Z-\/]|[a-zA-Z-\/] )*[a-zA-Z-\/]$/; 
            var pname = $("#facmother").val();
            if (pattern.test(pname) && pname !== "") {
                $("#facmother_error_message").hide();
                $("#facmother").css("border", "2px solid #34F458");
            } else if (pname == "") {
                $("#facmother_error_message").html("This column cannot be blank");
                $("#facmother_error_message").show();
                $("#facmother").css("border", "2px solid #F90A0A");
                error_facmother = true;
            } else {
                $("#facmother_error_message").html("It should contain only charachters and length must be between 3 and  25 characters");
                $("#facmother_error_message").show();
                $("#facmother").css("border", "2px solid #F90A0A");
                error_facmother = true;
            }
        }


    $("#facregform").submit(function () 
    {
        error_facname  = false;
        error_facbname = false;
        error_fachname = false;
        error_facjob = false;
        error_facfather = false;
        error_facmother = false;
        error_facemail = false;
        error_facmobno = false;
        error_facqual = false;
 
        check_name();
        check_bname();
        check_hname();
        check_job();
        check_mname();
        check_fname();
        check_email();
        check_phone();
        check_qual();

        if (error_facqual === false && error_facemail === false && error_facmobno ===false && error_facname  === false && error_facbname === false && error_fachname === false && error_facjob === false && error_facfather === false && error_facmother === false) 
        {
            return true;
        } 
        else 
        {
            alert("Please fill the form Correctly");
            return false;
        }
        });
    });

            </script>
    <script>
</script>

</html>