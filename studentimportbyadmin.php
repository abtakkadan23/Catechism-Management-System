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
            while(count($foo)>$count)
            {
                $stuname = $foo[$count][0];
                $stubname = $foo[$count][1];
                $stugender = $foo[$count][2];
                $stuhname = $foo[$count][3];
                $stumobno = $foo[$count][4];
                $stuemail = $foo[$count][5];
                $studob = $foo[$count][6];
                $stuclass = $foo[$count][7];
                $stufname = $foo[$count][8];
                $stumname = $foo[$count][9];
                $stupassword = $foo[$count][10];
                $sturepassword = $foo[$count][11];
                    
                $query1="insert into login_table (useremail, password, role) VALUES('$stuemail','$stupassword', 3)";
                $result2 = mysqli_query($con, $query1);

                $query3 = "select * from login_table where useremail = '$stuemail' and password = '$stupassword'";
                $result3 = $con->query($query3);
                $uid = $result3->fetch_assoc();
                $uid1 = $uid['userid'];

                $query="insert into adminregisterstudent (studentid, studentname, studentbname, studentgender, studenthname, studentmobile, studentdob, studentclass, studentfather, studentmother, role) values('$uid1', '$stuname', '$stubname', '$stugender', '$stuhname', '$stumobno', '$studob', '$stuclass', '$stufname', '$stumname', 3)";
                
                /*if ($con->query($query1) === TRUE and $con->query($query) === TRUE) */
                $result = mysqli_query($con, $query);
                
                if ($result2 === TRUE and $result === TRUE)
                {
                    echo "<script>  alert('Student added...'); window.location.href='addnewstudent.php'; </script>";
                    // header("location: addnewstudent.php");
                } 
                else 
                {
                    echo "Error: " . $query . "<br>" . $con->error;
                }

                $count++;
            }
        }
        header("location: addnewstudent.php");
    } 

    // echo "<script>window.location.href='addnewfaculty.php';</script>";
?>