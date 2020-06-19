<!--Navbar-->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark primary-color">

  <!-- Navbar brand -->
  <a class="navbar-brand" href="index.php">MyCollege Website</a>

  <!-- Collapse button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Collapsible content -->
  <div class="collapse navbar-collapse" id="basicExampleNav">

    <!-- Links -->
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="aboutus.php">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="faculties.php">Faculties</a>
      </li>

      <!-- Dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">Academics</a>
        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">

          <?php
              include 'admin/db/dbconfig.php';

              $navbar = "SELECT * FROM dept_category";
              $navbar_run = mysqli_query($connection, $navbar);

              if(mysqli_num_rows($navbar_run) > 0 ) {

                while($nav_row = mysqli_fetch_array($navbar_run)) {

                    echo ' <a class="dropdown-item" href=academics.php?branches='.preg_replace('#[ -]+#', '-', trim($nav_row['name'])).'> 
                          '.$nav_row['name'].' 
                          </a> ';

                }

              } else {

                    echo "No Department Available";

              }

          ?>
         
         
        </div>
      </li>

    </ul>
    <!-- Links -->

  </div>
  <!-- Collapsible content -->

</nav>
<!--/.Navbar-->