<?php 
include 'security.php';



if(isset($_POST['save_btn'])) {
	$name = $_POST['faculty_name'];
	$designation = $_POST['faculty_designation'];
	$description = $_POST['faculty_description'];
	$images = $_FILES['faculty_image']['name'];



	// $validate_img_extension = $_FILES['faculty_image']['type']=='image/jpg' || 
	// 						  $_FILES['faculty_image']['type']=='image/png' || 
	// 						  $_FILES['faculty_image']['type']=='image/jpeg';

	$img_types = array('image/jpg', 'image/png', 'image/jpeg');
	$validate_img_extension = in_array($_FILES['faculty_image']['type'], $img_types);

	if($validate_img_extension) {

		if(file_exists('../upload/' . $_FILES['faculty_image']['name'])) {

			$store = $_FILES['faculty_image']['name'];

			$_SESSION['status'] = "Image already exists. '.$store.'";
			header('location: ../faculty.php');

		}   else {

				$query = "INSERT INTO faculty (name, designation, description, images) VALUES ('$name', '$designation', '$description', '$images')";
					$query_run = mysqli_query($connection, $query);

				if($query_run) {
						move_uploaded_file($_FILES['faculty_image']['tmp_name'], '../upload/'.$_FILES['faculty_image']['name']);
						$_SESSION['success'] = "Faculty Added";
						header('location: ../faculty.php');
				
				} else {
						
						$_SESSION['status'] = "Faculty Not Added";
						header('location: ../faculty.php');
				}
			} 

    } else {

    	$_SESSION['status'] = "Only JPG, PNG, JPEG images are allowed";
		header('location: ../faculty.php');
    }
}


if(isset($_POST['update_btn'])) {
	$id = $_POST['edit_id'];
	$name = $_POST['edit_name'];
	$designation = $_POST['edit_designation'];
	$description = $_POST['edit_description'];
	$images = $_FILES['faculty_image']['name'];


	// $validate_img_extension = $_FILES['faculty_image']['type']=='image/jpg' || 
	// 						  	 $_FILES['faculty_image']['type']=='image/png' || 
	// 						  	 $_FILES['faculty_image']['type']=='image/jpeg';


	$img_types = array('image/jpg', 'image/png', 'image/jpeg');
	$validate_img_extension = in_array($_FILES['faculty_image']['type'], $img_types);


	// if($validate_img_extension) {

		$fa_query = "SELECT * FROM faculty WHERE id='$id' ";
		$fa_query_run = mysqli_query($connection, $fa_query);
		foreach($fa_query_run as $fa_row) {

			if($images == NULL) {

				// Upload with existing image
				$image_data = $fa_row['images'];
			} else {

				// Upload with new image and delete the old image
				if($img_path = '../upload/'.$fa_row['images']) {
					unlink($img_path);
					$image_data = $images;
				}
			}
		}


		$query = "UPDATE faculty SET name='$name', designation='$designation', description='$description', images='$image_data' WHERE id='$id' ";
		$query_run = mysqli_query($connection, $query);

		if($query_run) {

			if($images == NULL) {

				// Upload with existing image
				$_SESSION['success'] = "Faculty Updated with existing image";
				header('location: ../faculty.php');

			} else {

				// Upload with new image and delete the old image
				move_uploaded_file($_FILES['faculty_image']['tmp_name'], '../upload/'.$_FILES['faculty_image']['name']);
				$_SESSION['success'] = "Faculty Updated with new image";
				header('location: ../faculty.php');
				
			}
			
		
		} else {
				
			$_SESSION['status'] = "Faculty Not Updated";
			header('location: ../faculty.php');
		}
		

	// } else {  

	// 	$_SESSION['status'] = "Only JPG, PNG, JPEG images are allowed";
	// 	header('location: ../faculty.php');
 //    }
}



if(isset($_POST['delete_btn'])) {
	$id = $_POST['delete_id'];

	$query = "DELETE FROM faculty WHERE id='$id' ";
	$query_run = mysqli_query($connection, $query);

	if($query_run) {

		$_SESSION['success'] = "Faculty Data is DELETED";
		header('location: ../faculty.php');

	} else {
		$_SESSION['status'] = "Faculty Data is NOT DELETED";
		header('location: ../faculty.php');
	}
}



if(isset($_POST['search_data'])) {

	$id = $_POST['id'];
	$visible = $_POST['visible'];

	$query = "UPDATE faculty SET visible='$visible' WHERE id='$id' ";
	$query_run = mysqli_query($connection, $query);
}



if(isset($_POST['delete_multiple_data_btn'])) {

	$id = '1';

	$query = "DELETE FROM faculty WHERE visible='$id' ";
	$query_run = mysqli_query($connection, $query);

	if($query_run) {

		$_SESSION['success'] = "Faculty Data is DELETED";
		header('location: ../faculty.php');

	} else {
		$_SESSION['status'] = "Faculty Data is NOT DELETED";
		header('location: ../faculty.php');
	}
}

?>