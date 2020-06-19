<?php 
include 'security.php';



if(isset($_POST['save_btn'])) {
	$name = $_POST['dept_name'];
	$description = $_POST['dept_description'];
	$image = $_FILES['dept_image']['name'];



	$validate_img_extension = $_FILES['dept_image']['type']=='image/jpg' || 
							  $_FILES['dept_image']['type']=='image/png' || 
							  $_FILES['dept_image']['type']=='image/jpeg';


	if($validate_img_extension) {

		if(file_exists('../upload/departments/' . $_FILES['dept_image']['name'])) {

			$store = $_FILES['dept_image']['name'];

			$_SESSION['status'] = "Image already exists. '.$store.'";
			header('location: ../departments.php');

		}   else {

				$query = "INSERT INTO dept_category (name, description, image) VALUES ('$name', '$description', '$image')";
					$query_run = mysqli_query($connection, $query);

				if($query_run) {
						move_uploaded_file($_FILES['dept_image']['tmp_name'], '../upload/departments/'.$_FILES['dept_image']['name']);
						$_SESSION['success'] = "Depratment Category Added";
						header('location: ../departments.php');
				
				} else {
						
						$_SESSION['status'] = "Department Category Not Added";
						header('location: ../departments.php');
				}
			} 

    } else {

    	$_SESSION['status'] = "Only JPG, PNG, JPEG images are allowed";
		header('location: ../departments.php');
    }
}



if(isset($_POST['update_btn'])) {
	$id = $_POST['edit_id'];
	$name = $_POST['edit_name'];
	$description = $_POST['edit_description'];
	$image = $_FILES['dept_image']['name'];


	// $validate_img_extension = $_FILES['dept_image']['type']=='image/jpg' || 
	// 						  	 $_FILES['dept_image']['type']=='image/png' || 
	// 						  	 $_FILES['dept_image']['type']=='image/jpeg';


	$img_types = array('image/jpg', 'image/png', 'image/jpeg');
	$validate_img_extension = in_array($_FILES['dept_image']['type'], $img_types);


	// if($validate_img_extension) {

		$fa_query = "SELECT * FROM dept_category WHERE id='$id' ";
		$fa_query_run = mysqli_query($connection, $fa_query);
		foreach($fa_query_run as $fa_row) {

			if($image == NULL) {

				// Upload with existing image
				$image_data = $fa_row['image'];
			} else {

				// Upload with new image and delete the old image
				if($img_path = '../upload/departments/'.$fa_row['image']) {
					unlink($img_path);
					$image_data = $image;
				}
			}
		}


		$query = "UPDATE dept_category SET name='$name', description='$description', image='$image_data' WHERE id='$id' ";
		$query_run = mysqli_query($connection, $query);

		if($query_run) {

			if($image == NULL) {

				// Upload with existing image
				$_SESSION['success'] = "Department Category Updated with existing image";
				header('location: ../departments.php');

			} else {

				// Upload with new image and delete the old image
				move_uploaded_file($_FILES['dept_image']['tmp_name'], '../upload/departments/'.$_FILES['dept_image']['name']);
				$_SESSION['success'] = "Department Category Updated with new image";
				header('location: ../departments.php');
				
			}
			
		
		} else {
				
			$_SESSION['status'] = "Department Category Not Updated";
			header('location: ../departments.php');
		}
		

	// } else {  

	// 	$_SESSION['status'] = "Only JPG, PNG, JPEG images are allowed";
	// 	header('location: ../departments.php');
 //    }
}




if(isset($_POST['delete_btn'])) {
	$id = $_POST['delete_id'];

	$query = "DELETE FROM dept_category WHERE id='$id' ";
	$query_run = mysqli_query($connection, $query);

	if($query_run) {

		$_SESSION['success'] = "Department Category is DELETED";
		header('location: ../departments.php');

	} else {
		$_SESSION['status'] = "Department Category is NOT DELETED";
		header('location: ../departments.php');
	}
}




?>