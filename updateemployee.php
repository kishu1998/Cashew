<?php

    session_start();
    include('db.php');

    

        $query="update employee_details set fname='$_POST[fname]',lname='$_POST[lname]',address='$_POST[address]',hier='$_POST[hier]',mob='$_POST[mob]' where emp_id='$_SESSION[emp_id]'";

        echo "$query";

            if(mysqli_query($con,$query))
            {
                $message = "employee details has been updated...!";
                echo "<script>alert('$message');</script>";
                header('Refresh:0;url=viewemployee.php');
            }

        mysqli_close($con);
?>