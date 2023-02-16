<?php
    include('session.php');
    include('config.php');

    if(isset($_POST['upload']))
    {
        //accessing images
        $image=$_FILES['product_image1']['name'];

        //accessing image tmp names
        $temp_image=$_FILES['product_image1']['tmp_name'];
        
        //checking empty condition
        if($image=='')
        {
            echo "<script>alert('Please fill all the fields.')</script>";
            exit();
        }
        else
        {
            move_uploaded_file($temp_image,"./profile_images/$image");
        }
        //insert query
        $update_image="INSERT INTO `adminregisterfaculty`(facultyimage) VALUES ('$image')";

        $result_query=mysqli_query($con,$update_image);
        if($result_query)
        {
            echo "<script>alert('Successfully inserted the products.')</script>";
        }
    }

?>