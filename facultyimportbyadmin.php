<?php
    include('config.php');
    use SimpleExcel\SimpleExcel;

    if(isset($_POST['submitmulti']))
    {
        if(move_uploaded_file($_FILES['excel_file']['tmp_name'], $_FILES['excel_file']['name']))
        {
            require_once('SimpleExcel/SimpleExcel.php');                // load the main class file (if you're not using autoloader)

            $excel = new SimpleExcel('csv');                            // instantiate new object (will automatically construct the parser & writer type as XML)

            $excel->parser->loadFile($_FILES['excel_file']['name']);    // load an XML file from server to be parsed

            $foo = $excel->parser->getField();                          // get complete array of the table
            // $bar = $excel->parser->getRow(3);                        // get specific array from the specified row (3rd row)
            // $baz = $excel->parser->getColumn(4);                     // get specific array from the specified column (4th row)
            // $qux = $excel->parser->getCell(2,1);                     // get specific data from the specified cell (2nd row in 1st column)

            // echo '<pre>';
            // print_r($foo);                                           // echo the array
            // echo '</pre>';

            $count = 1;
            while($count < (count($foo)))
            {
                $facname = $foo[$count][0];
                $facbname = $foo[$count][1];
                $facgender = $foo[$count][2];
                $fachname = $foo[$count][3];
                $facmobno = $foo[$count][4];
                $facemail = $foo[$count][5];
                $facdob = $foo[$count][6];
                $faclass = $foo[$count][7];
                $facdesig = $foo[$count][8];
                $facquali = $foo[$count][9];
                $facjob = $foo[$count][10];
                $facfname = $foo[$count][11];
                $facmname = $foo[$count][12];
                $facpassword = $foo[$count][13];
                $facrepassword = $foo[$count][14];
                
                $query1="insert into login_table (useremail, password, role) VALUES('$facemail','$facpassword', 2)";
                $result2 = mysqli_query($con, $query1);

                $query3 = "select * from login_table where useremail = '$facemail' and password = '$facpassword'";
                $result3 = $con->query($query3);
                $uid = $result3->fetch_assoc();
                $uid1 = $uid['userid'];

                $query="insert into adminregisterfaculty (facultyid, facultyname, facultybname, facultygender, facultyhname, 
                facultymobile, facultydob, facultyclass, facultydesig, facultyqualif, facultyjob, facultyfather, 
                facultymother, role) values('$uid1', '$facname', '$facbname', '$facgender', '$fachname', '$facmobno', 
                '$facdob', '$faclass', '$facdesig', '$facquali', '$facjob', '$facfname', '$facmname', 2)";
                
                /*if ($con->query($query1) === TRUE and $con->query($query) === TRUE) */
                $result = mysqli_query($con, $query);
                
                if ($result2 === TRUE and $result === TRUE)
                {
                    echo "<script>  alert('Faculty added...'); window.location.href='addnewfaculty.php'; </script>";
                    // header("location: addnewfaculty.php")window.location.href='addnewfaculty.php';;
                } 
                else 
                {
                    echo "Error: " . $query . "<br>" . $con->error;
                }

                $count++;
            }
        }
        ?>
            <script>
                alert("Data imported successfully");
            </script>
        <?php
        header("location: addnewfaculty.php");
    } 

    // echo "<script>window.location.href='addnewfaculty.php';</script>";
?>