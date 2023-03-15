<?php
    include('session.php');
    include('config.php');

    if(!empty($_POST["divsn_id"]))
    {
        $x=$_POST["divsn_id"];
        $sql=mysqli_query($con,"select * from assoclass where class_id='$x'");
        while($row=mysqli_fetch_assoc($sql))
        {
            $s=$row['div_id'];
            $sql1=mysqli_query($con, "select * from tbl_div where divid='$s'");
            $rows=mysqli_fetch_assoc($sql1);
?>       
            <option value="<?php echo $row['div_id'];?>"> <?php echo $rows['division'];?> </option>     
<?php    
        }
    }
?>