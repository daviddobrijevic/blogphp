<?php 
include 'db/security.php';
include 'includes/header.php'; 
include 'includes/navbar.php'; 
?>


<div class="modal fade" id="deptModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Department</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="db/code_departments.php" method="POST" enctype="multipart/form-data">

        <div class="modal-body">

            <div class="form-group">
                <label>Dept Name</label>
                <input type="text" name="dept_name" class="form-control" placeholder="Enter Name" required>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea type="text" name="dept_description" class="form-control" placeholder="Enter Description" required></textarea>
            </div>
            <div class="form-group">
                <label>Image</label>
                <input type="file" name="dept_image" id="dept_image" class="form-control pt-1 pl-2" required>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="save_btn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>

<div class="container-fluid">

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"> Academics - Departments (Category)
        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#deptModal">
				Add 
		</button>
    </h6>
  </div><!--.card-header-->
  <div class="card-body">
    <?php 
    
        if(isset($_SESSION['success']) && $_SESSION['success'] != '') {
            echo '<h2 class="bg-primary text-white"> '.$_SESSION['success'].'</h2>';
            unset($_SESSION['success']);
        }

        if(isset($_SESSION['status']) && $_SESSION['status'] != '') {
            echo '<h2 class="bg-danger text-white"> '.$_SESSION['status'].'</h2>';
            unset($_SESSION['status']);
        }


    ?>

    <div class="table-responsive">
    <?php
        
        $query = "SELECT * FROM dept_category";
        $query_run = mysqli_query($connection, $query);

    ?>

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if(mysqli_num_rows($query_run) > 0) {

                while ($row = mysqli_fetch_assoc($query_run)) {

            ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <!-- <td><?php echo $row['image']; ?></td>  -->
                <td>
                	<?php echo '<img src="upload/departments/'.$row['image'].'" width="50px" height="50px" alt="Image">' ?>
                </td>
                <td> 
                    <form action="departments_edit.php" method="POST">
                        <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                    </form>
                </td>
                <td>
                    <form action="db/code_departments.php" method="POST">
                        <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                    </form>
                </td>
            </tr>
            <?php
                }
            } else {
                echo "No Record Found";
            }
            ?>
        </tbody>
      </table>

    </div><!--table-responsive-->
  </div><!--.card-body-->
</div><!--.card shadow-->

</div><!--.container-fluid-->


<?php 
include 'includes/scripts.php'; 
include 'includes/footer.php'; 
?>