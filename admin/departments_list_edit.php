<?php 
include 'db/security.php';
include 'includes/header.php'; 
include 'includes/navbar.php'; 
?>

<div class="container-fluid">

	<div class="card shadow mb-4">
		<div class="card-header py-3">
		    <h6 class="m-0 font-weight-bold text-primary">
		    	EDIT Department List
		    </h6>
		</div><!--.card-header-->
		<div class="card-body">

		<?php
		 
		if(isset($_POST['edit_btn'])) {
			$id = $_POST['edit_id'];

			$query = "SELECT * FROM dept_category_list WHERE id=$id ";
			$query_run = mysqli_query($connection, $query);
		
		
			foreach($query_run as $row_edit) {
		?>

		<form action="db/code_departments_list.php" method="POST">

			<input type="hidden" name="edit_id" value="<?php echo $row_edit['id']; ?>">

			<?php 
            $department = "SELECT * FROM dept_category";
            $dept_run = mysqli_query($connection, $department);

            if(mysqli_num_rows($dept_run) > 0 ) { 
        	?>
                <div class="form-group">
                    <label>Dept Cate ID/Name</label>
                    <select name="dept_cate_id" id="" class="form-control" required>
                        <option value="">Choose Your Department Category</option>
                            <?php 
                            foreach($dept_run as $row) { 
                            ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                            <?php 
                            }
                            ?>
                    </select>
                </div>
       		<?php 
	        } else {
	            echo "No Data Available";
	        }
        	?>
		  		<div class="form-group">
	                <label>Name</label>
	                <input type="text" name="edit_name" value="<?php echo $row_edit['name']; ?>" class="form-control" placeholder="Enter Name">
	            </div>
	            <div class="form-group">
	                <label>Description</label>
	                <input type="text" name="edit_description" value="<?php echo $row_edit['description']; ?>" class="form-control" placeholder="Enter Description">
	            </div>
	             <div class="form-group">
	                <label>Section</label>
	                <input type="text" name="edit_section" value="<?php echo $row_edit['section']; ?>" class="form-control" placeholder="Enter Section">
	            </div>

	            <a href="departments_list.php" class="btn btn-danger">CANCEL</a>
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