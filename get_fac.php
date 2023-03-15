<?php
    include('session.php');
    include('config.php');

    if(!empty($_POST["fac_id"]))
    {
        $x=$_POST["fac_id"];
        $sql=mysqli_query($con,"select * from assoclass where facid='$x'");
        while($row=mysqli_fetch_assoc($sql))
        {
            $s=$row['div_id'];
            $sql1=mysqli_query($con, "select * from adminregisterfaculty where facultyid='$s'");
            $rows=mysqli_fetch_assoc($sql1);
?>       
            <option value="<?php echo $row['facultyid'];?>"> <?php echo $rows['facultyname'];?> </option>     
<?php    
        }
    }
?>