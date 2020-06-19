<?php 
include 'db/security.php';
include 'includes/header.php'; 
include 'includes/navbar.php'; 
?>


<div class="modal fade" id="deptListModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Department</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="db/code_departments_list.php" method="POST">
        <div class="modal-body">

        <?php 
            $department = "SELECT * FROM dept_category";
            $dept_run = mysqli_query($connection, $department);

            if(mysqli_num_rows($dept_run) > 0 ) { 
        ?>
                <div class="form-group">
                    <label>Dept List Name</label>
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
                <label>Dept List Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea type="text" name="description" class="form-control" placeholder="Enter Description" required></textarea>
            </div>
            <div class="form-group">
                <label>Section</label>
                <textarea type="text" name="section" class="form-control" placeholder="Enter Section" required></textarea>
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
    <h6 class="m-0 font-weight-bold text-primary"> Academics - Departments (Category-LIST)
        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#deptListModal">
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
        
        $query = "SELECT * FROM dept_category_list";
        $query_run = mysqli_query($connection, $query);

    ?>

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Dept-Cate-ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Section</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if(mysqli_num_rows($query_run) > 0) {

                while ($row = mysqli_fetch_assoc($query_run)) {

                    $dept_cate_id = $row['dept_cate_id'];
                    $dept_cate = "SELECT * FROM dept_category WHERE id='$dept_cate_id' ";
                    $dept_cate_run = mysqli_query($connection, $dept_cate);

            ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php foreach ($dept_cate_run as $dept_row) {
                                echo $dept_row['name']; 
                          } 
                    ?> 
                </td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['section']; ?></td>
                <td> 
                    <form action="departments_list_edit.php" method="POST">
                        <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                    </form>
                </td>
                <td>
                    <form action="db/code_departments_list.php" method="POST">
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