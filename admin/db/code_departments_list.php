<?php 
include 'security.php';


if(isset($_POST['save_btn'])) {
	$dept_cate_id = $_POST['dept_cate_id'];
	$name = $_POST['name'];
	$description = $_POST['description'];
	$section = $_POST['section'];

	$query = "INSERT INTO dept_category_list (dept_cate_id, name, description, section) VALUES ('$dept_cate_id', '$name', '$description', '$section')";
	$query_run = mysqli_query($connection, $query);

	if($query_run) {
			
			$_SESSION['success'] = "Dept Category-List Added";
			header('location: ../departments_list.php');
	
	} else {
			
			$_SESSION['status'] = "Dept Category-List NOT Added";
			header('location: ../departments_list.php');
	}
}


if(isset($_POST['update_btn'])) {
	$id = $_POST['edit_id'];
	$dept_cate_id = $_POST['dept_cate_id'];
	$name = $_POST['edit_name'];
	$description = $_POST['edit_description'];
	$section = $_POST['edit_section'];

	$query = "UPDATE dept_category_list SET dept_cate_id='$dept_cate_id', name='$name', description='$description', section='$section' WHERE id='$id' ";
	$query_run = mysqli_query($connection, $query);

	if($query_run) {

		$_SESSION['success'] = "Dept Category-List is Updated";
		header('location: ../departments_list.php');

	} else {

		$_SESSION['status'] = "Dept Category-List is NOT Updated";
		header('location: ../departments_list.php');
	}

}

if(isset($_POST['delete_btn'])) {
	$id = $_POST['delete_id'];

	$query = "DELETE FROM dept_category_list WHERE id='$id' ";
	$query_run = mysqli_query($connection, $query);

	if($query_run) {

		$_SESSION['success'] = "Dept Category-List is Deleted";
		header('location: ../departments_list.php');

	} else {
		$_SESSION['status'] = "Dept Category-List is NOT Deleted";
		header('location: ../departments_list.php');
	}
}






?>