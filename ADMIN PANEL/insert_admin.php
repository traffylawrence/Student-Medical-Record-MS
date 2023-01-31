<?php
    include_once 'db_conn.php';
    $success  = "";
    if(isset($_POST['addAdmin']))
    {	 
        $unique_id  = $_POST['unique_id'];
        $email  = $_POST['email'];
        $password = $_POST['password'];
        $fname   = $_POST['fname'];
        $lname  = $_POST['lname'];
        $img  = $_POST['img'];
        $status  = $_POST['status'];
       
        
        $sql = "INSERT INTO admins (unique_id,email,password,fname,lname,img,status)
        VALUES ('$unique_id','$email','$password','$fname','$lname','$img','$status')";
        if (mysqli_query($conn, $sql))
        {
            $success    =   "New record created successfully !";
        }
        else
        {
        echo "Error: " . $sql . " " . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
?>