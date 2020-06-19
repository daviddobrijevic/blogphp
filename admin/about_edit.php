<?php 
include 'db/security.php';
include 'includes/header.php'; 
include 'includes/navbar.php'; 
?>



<div class="container-fluid">

	<div class="card shadow mb-4">
		<div class="card-header py-3">
		    <h6 class="m-0 font-weight-bold text-primary">
		    	EDIT About
		    </h6>
		</div><!--.card-header-->
		<div class="card-body">

		<?php
		 
		if(isset($_POST['edit_btn'])) {
			$id = $_POST['edit_id'];

			$query = "SELECT * FROM aboutus WHERE id=$id ";
			$query_run = mysqli_query($connection, $query);
		
		
			foreach($query_run as $row) {
		?>

			<form action="db/code_aboutus.php" method="POST">
			<input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
		  		<div class="form-group">
	                <label> Title </label>
	                <input type="text" name="edit_title" value="<?php echo $row['title']; ?>" class="form-control" placeholder="Enter Title">
	            </div>
	            <div class="form-group">
	                <label>Sub-Title</label>
	                <input type="text" name="edit_subtitle" value="<?php echo $row['subtitle']; ?>" class="form-control" placeholder="Enter Sub Title">
	            </div>
	            <div class="form-group">
	                <label>Description</label>
	                <input type="text" name="edit_description" value="<?php echo $row['description']; ?>" class="form-control" placeholder="Enter Description">
	            </div>
	            <div class="form-group">
	                <label>Links</label>
	                <input type="text" name="edit_links" value="<?php echo $row['links']; ?>" class="form-control" placeholder="Enter Links">
	            </div>

	            <a href="aboutus.php" class="btn btn-danger">CANCEL</a>
	            <button class="btn btn-primary" name="update_btn">Update</button>
	        </form>

        <?php 
    		} 
    	}
    	?>
        

  		</div><!--.card-body-->
	</div><!--.card shadow-->

</div><!--.container-fluid-->	




<?php 
include 'includes/scripts.php'; 
include 'includes/footer.php';
?>