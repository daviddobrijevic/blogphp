<?php

include 'security.php';
include 'dbconfig.php';

if(isset($_POST['save_btn'])) {
	$title = $_POST['title'];
	$subtitle = $_POST['subtitle'];
	$description = $_POST['description'];
	$links = $_POST['links'];

	$query = "INSERT INTO aboutus (title, subtitle, description, links) VALUES ('$title', '$subtitle', '$description', '$links')";
	$query_run = mysqli_query($connection, $query);

	if($query_run) {
			
			$_SESSION['success'] = "About Us Added";
			header('location: ../aboutus.php');
	
	} else {
			
			$_SESSION['status'] = "About Us NOT Added";
			header('location: ../aboutus.php');
	}
}

if(isset($_POST['update_btn'])) {
	$id = $_POST['edit_id'];
	$title = $_POST['edit_title'];
	$subtitle = $_POST['edit_subtitle'];
	$description = $_POST['edit_description'];
	$links = $_POST['edit_links'];

	$query = "UPDATE aboutus SET title='$title', subtitle='$subtitle', description='$description', links='$links' WHERE id='$id' ";
	$query_run = mysqli_query($connection, $query);

	if($query_run) {

		$_SESSION['success'] = "Your Data is Updated";
		header('location: ../aboutus.php');

	} else {

		$_SESSION['status'] = "Your Data is NOT Updated";
		header('location: ../aboutus.php');
	}

}

if(isset($_POST['delete_btn'])) {
	$id = $_POST['delete_id'];

	$query = "DELETE FROM aboutus WHERE id='$id' ";
	$query_run = mysqli_query($connection, $query);

	if($query_run) {

		$_SESSION['success'] = "Your Data is Deleted";
		header('location: ../aboutus.php');

	} else {
		$_SESSION['status'] = "Your Data is NOT Deleted";
		header('location: ../aboutus.php');
	}
}

?>