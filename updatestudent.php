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
        $faclass = $_POST['class'];
        $facfname = $_POST['facfather'];
        $facmname = $_POST['facmother'];
        //accessing images
        $image=$_FILES['facpic']['name'];

        //accessing image tmp names
        $temp_image=$_FILES['facpic']['tmp_name'];

        // move_uploaded_file($temp_image,"./profile_images/$image");
        
        //checking empty condition
        if($facname=='' or $facbname == '' or $facgender == '' or $fachname == '' or $facmobno == '' or $facemail == '' or 
        $facdob == '' or $facfname == '' or $facmname == '' or $image=='')
        {
            echo "<script>alert('Please fill all the fields.')</script>";
            exit();
        }
        else
        {
            move_uploaded_file($temp_image,"./profile_images/$image");
        }

        
        $query="update adminregisterstudent set studentname = '$facname', studentbname = '$facbname', studentgender = '$facgender', 
        studenthname = '$fachname', studentmobile = '$facmobno', studentdob = '$facdob', studentclass = '$faclass', 
        studentfather = '$facfname', studentmother = '$facmname', role = '3', studentimage='$image' where studentid = '$uid'";
        $query1="update login_table set useremail = '$facemail', role = '3' where userid = '$uid'";
        /*if ($con->query($query1) === TRUE and $con->query($query) === TRUE)   */
        $result = mysqli_query($con, $query);
        $result2 = mysqli_query($con, $query1);
        if ($result === TRUE and $result2 === TRUE)
        {
            echo "<script>  alert('Student details edited successfully...'); window.location.href='managestudents.php'; </script>";
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

        <div class="main--content">
            <div class="recent--patients">            
                <div class="facreg">
                    <div class="form">
                        <h2 class="section--title">Update Details</h2>
                        <form action="#" method="post" id="facregform" enctype="multipart/form-data">

                            <?php
                                $id = $_GET['id'];
                                // $result = mysqli_query($con,"SELECT * from adminregisterfaculty where id = '$id'");
                                $sql="SELECT * FROM `adminregisterstudent` WHERE studentid = '$id'";
                                $result = $con->query($sql);
                                $rows = $result->fetch_assoc();  
                            ?>

                            <table style="table-layout: fixed; width: 100%;">
                                <tr>
                                    <td>
                                        <p>Name :</p>
                                        <input class="from" type="text" value="<?php echo $rows['studentname'];?>" id="facname" name="facname" octavalidate="R" ><br>
                                        <div class="error"></div>
                                    </td>
                                    <td>
                                        <p>Baptism Name :</p>
                                        <input type="text" value="<?php echo $rows['studentbname'];?>" id="facbname" name="facbname" octavalidate="R"><br>
                                        <div class="error"></div>
                                    </td>
                                    <td>
                                        <p>Gender :</p>
                                        <?php
                                            $option = $rows['studentgender'];
                                        ?>
                                        <select type="text" name="gender" id="gender" name="gender" selected="<?php echo $rows['studentgender'];?>" octavalidate="R">
                                            <option value="Male" <?php if($option=="Male") echo 'selected="selected"'; ?>>Male</option>
                                            <option value="Female" <?php if($option=="Female") echo 'selected="selected"'; ?>>Female</option>
                                            <option value="Other" <?php if($option=="Other") echo 'selected="selected"'; ?>>Other</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <p>House Name :</p>
                                        <input type="text" value="<?php echo $rows['studenthname'];?>" id="fachname" name="fachname" octavalidate="R"><br>
                                        <div class="error"></div>
                                    </td>
                                    <td>
                                        <p>Contact Number :</p> 
                                        <input type="text" value="<?php echo $rows['studentmobile'];?>" id="facmobno" name="facmobno" octavalidate="R"><br>
                                        <div class="error"></div>
                                    </td>
                                    <td>
                                        <?php
                                            $lid = $rows['studentid'];
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
                                        <input type="date" value="<?php echo $rows['studentdob'];?>" id="facdob" name="facdob" octavalidate="R"><br>
                                        <div class="error"></div>
                                    </td>
                                    <td>
                                        <p>Class :</p>
                                        <?php
                                            $option = $rows['studentclass'];
                                        ?>
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
                                    </td>
                                    <td>
                                        <p>Name of Father :</p>
                                        <input type="text" value="<?php echo $rows['studentfather'];?>" id="facfather" name="facfather" octavalidate="R"><br>
                                        <div class="error"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Name of Mother :</p>
                                        <input type="text" value="<?php echo $rows['studentmother'];?>" id="facmother" name="facmother" octavalidate="R"><br>
                                        <div class="error"></div>
                                    </td>
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