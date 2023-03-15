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
    <script src="validate.js"></script>
    <title>Dashboard</title>
</head>

<?php
    if(isset($_POST['submit']))
    {
        $uid = $_GET['id'];
        $facname = $_POST['facname'];
        $facbname = $_POST['facbname'];
        $facgender = $_POST['gender'];
        $fachname = $_POST['fachname'];
        $facmobno = $_POST['facmobno'];
        $facemail = $_POST['facemail'];
        $facdob = $_POST['facdob'];
        $facdesig = $_POST['desig'];
        $facquali = $_POST['facqual'];
        $facjob = $_POST['facjob'];
        $facfname = $_POST['facfather'];
        $facmname = $_POST['facmother'];
        //accessing images
        $image=$_FILES['facpic']['name'];

        //accessing image tmp names
        $temp_image=$_FILES['facpic']['tmp_name'];

        // move_uploaded_file($temp_image,"./profile_images/$image");
        
        //checking empty condition
        if($facname=='' or $facbname == '' or $facgender == '' or $fachname == '' or $facmobno == '' or $facemail == '' or 
        $facdob == '' or $facdesig == '' or $facquali == '' or $facjob == '' or $facfname == '' or $facmname == '' or $image=='')
        {
            echo "<script>alert('Please fill all the fields.')</script>";
            exit();
        }
        else
        {
            move_uploaded_file($temp_image,"./profile_images/$image");
        }
        

        
        //$psword = md5($facpassword);password encryption to increase data security
        $query="update adminregisterfaculty set facultyname = '$facname', facultybname = '$facbname', facultygender = '$facgender', 
        facultyhname = '$fachname', facultymobile = '$facmobno', facultydob = '$facdob', 
        facultydesig = '$facdesig', facultyqualif = '$facquali', facultyjob = '$facjob', facultyfather = '$facfname', facultymother = '$facmname', 
        role = '2', facultyimage = '$image' where facultyid = '$uid'";
        $query1="update login_table set useremail = '$facemail', role = '2' where userid = '$uid'";
        /*if ($con->query($query1) === TRUE and $con->query($query) === TRUE)   */
        $result = mysqli_query($con, $query);
        $result2 = mysqli_query($con, $query1);
        if ($result === TRUE and $result2 === TRUE)
        {
            echo "<script>  alert('Faculty details edited successfully...'); window.location.href='managefaculty.php'; </script>";
        } 
        else
        {
            echo "Error: " . $query . "<br>" . $con->error;
        }
    }

?>

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
                    <a href="managefaculty.php" id="active--link">
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
                <a href="managefaculty.php" style="margin-right: 20px;">
                    <i class="ri-arrow-left-circle-fill"></i>
                    BACK
                </a>
            </span>
        </div>

        <div class="main--content">
            <div class="recent--patients">    
                
                <!-- <div class="facreg">
                    <div class="form">
                        <h2 class="section--title">Update Profile Picture</h2>
                        <form action="facimgup.php" method="post" id="facregform">

                            <p>Upload Photo :</p>
                            <input type="file" placeholder="Upload your photo" id="facpic" name="facpic" accept="" required><br>
                            <div class="error"></div>

                            <button type="submit" name="upload" id="upload" class="loginbutton">
                                Upload
                            </button>
                        </form>
                    </div>
                </div> -->

                <div class="facreg">
                    <div class="form">
                        <h2 class="section--title">Update Details</h2>
                        <form action="#" method="post" id="facregform" enctype="multipart/form-data">

                            <?php
                                $id = $_GET['id'];
                                // $result = mysqli_query($con,"SELECT * from adminregisterfaculty where id = '$id'");
                                $sql="SELECT * FROM `adminregisterfaculty` WHERE facultyid = '$id'";
                                $result = $con->query($sql);
                                $rows = $result->fetch_assoc();  
                            ?>
                            <table style="table-layout: fixed; width: 100%;">
                                <tr>
                                    <td>
                                        <p>Name :</p>
                                        <input class="from" type="text" value="<?php echo $rows['facultyname'];?>" id="facname" name="facname" octavalidate="R" ><br>
                                        <div class="error"></div>
                                    </td>
                                    <td>
                                        <p>Baptism Name :</p>
                                        <input type="text" value="<?php echo $rows['facultybname'];?>" id="facbname" name="facbname" octavalidate="R"><br>
                                        <div class="error"></div>
                                    </td>
                                    <td>
                                        <p>Gender :</p>
                                        <?php
                                            $option = $rows['facultygender'];
                                        ?>
                                        <select type="text" name="gender" id="gender" name="gender" selected="<?php echo $rows['facultygender'];?>" octavalidate="R">
                                            <option value="Male" <?php if($option=="Male") echo 'selected="selected"'; ?>>Male</option>
                                            <option value="Female" <?php if($option=="Female") echo 'selected="selected"'; ?>>Female</option>
                                            <option value="Other" <?php if($option=="Other") echo 'selected="selected"'; ?>>Other</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>House Name :</p>
                                        <input type="text" value="<?php echo $rows['facultyhname'];?>" id="fachname" name="fachname" octavalidate="R"><br>
                                        <div class="error"></div>
                                    </td>
                                    <td>
                                        <p>Contact Number :</p> 
                                        <input type="text" value="<?php echo $rows['facultymobile'];?>" id="facmobno" name="facmobno" octavalidate="R"><br>
                                        <div class="error"></div>
                                    </td>
                                    <td>
                                        <?php
                                            $lid = $rows['facultyid'];
                                            $emailval='';
                                            $query1="SELECT * FROM login_table where userid = '$lid' ";
                                            $data1 = mysqli_query($con,$query1);
                                            while($res1=mysqli_fetch_assoc($data1))
                                            {
                                                    $emailval = $res1['useremail'];
                                            }
                                        ?>
                                        <p>Email :</p>
                                        <input type="email" value="<?php echo $emailval;?>" id="facemail" name="facemail" octavalidate="R"><br>
                                        <div class="error"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Date of Birth :</p>
                                        <input type="date" value="<?php echo $rows['facultydob'];?>" id="facdob" name="facdob" octavalidate="R"><br>
                                        <div class="error"></div>
                                    </td>
                                    <td>
                                        <p>Designation :</p>
                                        <?php
                                            $option = $rows['facultydesig'];
                                        ?>
                                        <select name="desig" id="desig" octavalidate="R">
                                            <option value="Faculty" <?php if($option=="Faculty") echo 'selected="selected"'; ?>>Faculty</option>
                                            <option value="Asst. Faculty" <?php if($option=="Asst. Faculty") echo 'selected="selected"'; ?>>Asst. Faculty</option>
                                        </select>
                                    </td>
                                    <td>
                                        <p>Qualifiction :</p>
                                        <input type="text" value="<?php echo $rows['facultyqualif'];?>" id="facqual" name="facqual" octavalidate="R"><br>
                                        <div class="error"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Current Job :</p>
                                        <input type="text" value="<?php echo $rows['facultyjob'];?>" id="facjob" name="facjob" octavalidate="R"><br>
                                        <div class="error"></div>   
                                    </td>
                                    <td>
                                        <p>Name of Father :</p>
                                        <input type="text" value="<?php echo $rows['facultyfather'];?>" id="facfather" name="facfather" octavalidate="R"><br>
                                        <div class="error"></div>
                                    </td>
                                    <td>
                                        <p>Name of Mother :</p>
                                        <input type="text" value="<?php echo $rows['facultymother'];?>" id="facmother" name="facmother" octavalidate="R"><br>
                                        <div class="error"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Upload Profile Photo :</p>
                                        <input type="file" placeholder="Upload your photo" id="facpic" name="facpic" accept="image/*" required><br>
                                        <div class="error"></div>
                                    </td>
                                </tr>
                            </table>
                            <button type="submit" name="submit" id="submit" class="loginbutton">
                                Update
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    
    </section>
    <!-- <script>
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
            } 
            else 
            {
            //validation failed
            }
        })
    </script> -->
</body>

</html>