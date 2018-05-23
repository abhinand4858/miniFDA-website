<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

if(isset($_POST['btn-signup'])) {
  $email = $_POST['email'];
  $pass = $_POST['password'];
  $pass2 = $_POST['password2'];
  if($pass != $pass2) {
    $msg = "Login Failed! Passwords don't match!";
    $_SESSION['error'] = $msg;

    header("Location: error.php");
  } 
  try {

      $mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");

      $bulk = new MongoDB\Driver\BulkWrite;
    
      $doc = ['_id' => new MongoDB\BSON\ObjectID, 'email' => $email, 'pass' => $pass];
      $bulk->insert($doc);

      $mng->executeBulkWrite('openFDA.researcher', $bulk);
      
  } catch (MongoDB\Driver\Exception\Exception $e) {

      $filename = basename(__FILE__);
      
      echo "The $filename script has experienced an error.\n"; 
      echo "It failed with the following exception:\n";
      
      echo "Exception:", $e->getMessage(), "\n";
      echo "In file:", $e->getFile(), "\n";
      echo "On line:", $e->getLine(), "\n";       
  }
  header("Location: index.php");
  
}
//echo "Connected successfully";
?>


<!DOCTYPE HTML>
<html>
<body><p>hello</p></body>
</html>