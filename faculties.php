<?php include 'includes/header.php'; ?>

<?php include 'includes/navbar.php'; ?>


<div class="container py-5">

	<div class="row mt-3">
		<div class="col-md-12">
			<h1 class="text-center">Faculty Details</h1>
		</div>
	</div>

	<div class="row mt-4">

		<?php 

			include 'admin/db/dbconfig.php';

			$query = "SELECT * FROM faculty";
			$query_run = mysqli_query($connection, $query);
			$check_quality = mysqli_num_rows($query_run);

			if($check_quality) {

				while($row = mysqli_fetch_array($query_run)) {
					
				
						
		?>

		<div class="col-md-3">
			<div class="card">
				<img src="admin/upload/<?php echo $row['images']; ?>" class="card-img-top" 
				width="100px" height="220px" alt="Faculty Images">
				<div class="card-body">
					
					<h4 class="card-title"><?php echo $row['name']; ?></h4>
					<h3 class="card-title"><?php echo $row['designation']; ?></h3>
					<p class="card-text">
						<?php echo $row['description']; ?>
					</p>
				</div>
			</div>
		</div>
		<?php
				}

			} else {

				echo "No Faculty";

			}
						
		?>

	</div>
</div>


<?php include 'includes/footer.php'; ?>