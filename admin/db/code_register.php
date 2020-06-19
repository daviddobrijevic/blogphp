<?php

include 'security.php';

include 'dbconfig.php';


if(isset($_POST['register_btn'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$cpassword = $_POST['confirmpassword'];
	$usertype = $_POST['usertype'];

	$email_query = "SELECT * FROM register WHERE email='$email' ";
	$email_query_run = mysqli_query($connection, $email_query);

	if(mysqli_num_rows($email_query_run) > 0) {

			$_SESSION['status'] = "Email Already Taken. Please Try Another one.";
			$_SESSION['status_code'] = "error";
			header('location: ../register.php');

	} else {

		if($password === $cpassword) {
			$query = "INSERT INTO register (username, email, password, usertype) VALUES ('$username', '$email', '$password', '$usertype')";
			$query_run = mysqli_query($connection, $query);

			if($query_run) {
				// echo "Saved!";
				$_SESSION['status'] = "Admin Profile Added";
				$_SESSION['status_code'] = "success";
				header('location: ../register.php');
			} else {
				// echo "Not Saved";
				$_SESSION['status'] = "Admin Profile Not Added";
				$_SESSION['status_code'] = "error";
				header('location: ../register.php');
			}
		} else {
			
			$_SESSION['status'] = "Password and Confirm Password Does Not Match";
			$_SESSION['status_code'] = "warning";
			header('location: ../register.php');
		}
	}
}




if(isset($_POST['edit_btn'])) {
	$id = $_POST['edit_id'];

	$query = "SELECT * FROM register WHERE id='$id' ";
	$query_run = mysqli_query($connection, $query);


}

if(isset($_POST['update_btn'])) {
	$id = $_POST['edit_id'];
	$username = $_POST['edit_username'];
	$email = $_POST['edit_email'];
	$password = $_POST['edit_password'];
	$updateusertype = $_POST['update_usertype'];

	$query = "UPDATE register SET username='$username', email='$email', password='$password', usertype='$updateusertype' WHERE id='$id' ";
	$query_run = mysqli_query($connection, $query);

	if($query_run) {

		$_SESSION['status'] = "Your Data is Updated";
		$_SESSION['status_code'] = "success";
		header('location: ../register.php');

	} else {

		$_SESSION['status'] = "Your Data is NOT Updated";
		$_SESSION['status_code'] = "error";
		header('location: ../register.php');
	}
}



if(isset($_POST['delete_btn'])) {
	$id = $_POST['delete_id'];

	$query = "DELETE FROM register WHERE id='$id' ";
	$query_run = mysqli_query($connection, $query);

	if($query_run) {

		$_SESSION['status'] = "Your Data is Deleted";
		$_SESSION['status_code'] = "success";
		header('location: ../register.php');

	} else {

		$_SESSION['status'] = "Your Data is NOT Deleted";
		$_SESSION['status_code'] = "error";
		header('location: ../register.php');
	}
}



if(isset($_POST['check_submit_btn'])) {
	$email = $_POST['email_id'];

	$email_query = "SELECT * FROM register WHERE email='$email' ";
	$email_query_run = mysqli_query($connection, $email_query);

	if(mysqli_num_rows($email_query_run) > 0) {

		echo "Email Already Exists. Please Try Another one.";
			
	} else {

		echo "It's Available";
	}
}



?>