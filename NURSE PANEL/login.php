<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: indexNurse.php?error=Username is required!");
	    exit();
	}else if(empty($pass)){
        header("Location: indexNurse.php?error=Password is required!");
	    exit();
	}else{
		$sql = "SELECT * FROM nurses WHERE username='$uname' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['username'] === $uname && $row['password'] === $pass) {
            	$_SESSION['username'] = $row['username'];
            	$_SESSION['firstname'] = $row['firstname'];
				$_SESSION['lastname'] = $row['lastname'];
            	$_SESSION['emp_id'] = $row['emp_id'];
            	header("Location: nurseDashboard.php");
		        exit();
            }else{
				header("Location: indexNurse.php?error=Incorect username or password!");
		        exit();
			}
		}else{
			header("Location: indexNurse.php?error=Incorect username or password!");
	        exit();
		}
	}
	
}else{
	header("Location: indexNurse.php");
	exit();
}
