<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_POST['btn-login'])) {
  $email = $_POST['email'];
  $pass = $_POST['password'];
  try {

      $manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

      $filter = ['email' => $email, 'pass' => $pass]; 
      $query = new MongoDB\Driver\Query($filter);

      $cursor = $manager->executeQuery('openFDA.researcher', $query);

      $row = $cursor->toArray();

  } catch (MongoDB\Driver\Exception\Exception $e) {

      $filename = basename(__FILE__);
      
      echo "The $filename script has experienced an error.\n"; 
      echo "It failed with the following exception:\n";
      
      echo "Exception:", $e->getMessage(), "\n";
      echo "In file:", $e->getFile(), "\n";
      echo "On line:", $e->getLine(), "\n";       
  }
  session_start(); 
  if (count($row) > 0) {
    $_SESSION['user'] = substr($email, 0, -10);
    header("Location: index.php");
    //print_r(substr($email, 0, -10));
  } else {
    $msg = "Login Failed!";
    $_SESSION['error'] = $msg;
    header("Location: error.php");
  }
}
//echo "Connected successfully";
?>


<!DOCTYPE HTML>
<html>
<body><p>hello</p></body>
</html>