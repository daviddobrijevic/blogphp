<?php
session_start();

include 'dbconfig.php';

if($dbconfig) {
    // echo "Database Connected";
}

else {
  header('location: dbconfig.php');
}

if(!$_SESSION['username']) {
    header('location: login.php');
}

?>