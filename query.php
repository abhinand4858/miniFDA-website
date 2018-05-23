<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if(isset($_POST['btn-search1'])) {
      $arg = $_POST['query1'];
  try {


      $manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

      $filter = ['patient.drug.medicinalproduct' => $arg];

      $options = ["projection" => ["patient.reaction.reactionmeddrapt" => 1]];

      $query = new MongoDB\Driver\Query($filter, $options);

      $cursor = $manager->executeQuery('openFDA.drugs', $query);

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
      $ret = array();
      $patient = $row[0]->patient->reaction;
      for ($n = 0; $n < count($patient); $n++) {
          $ret[] = $patient[$n]->reactionmeddrapt;
      }
      $_SESSION['result'] = $ret;
      
      header("Location: search.php");
    //print_r(substr($email, 0, -10));
  } else {
      $_SESSION['error'] = "Not Found. Enter a valid keyword.";
      header("Location: error.php");
  }
}

if(isset($_POST['btn-search2'])) {
    $arg = $_POST['query2'];
    try {


        $manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

        $filter = ['patient.drug.medicinalproduct' => $arg];

        $options = ["projection" => ["patient.drug.activesubstance" => 1]];

        $query = new MongoDB\Driver\Query($filter, $options);

        $cursor = $manager->executeQuery('openFDA.drugs', $query);

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
        $patient = $row[0]->patient->drug;
        $ret = ($patient[0]->activesubstance->activesubstancename);
        $_SESSION['result'] = $ret;
      
        header("Location: search2.php");

        // for ($n = 0; $n < count($patient); $n++) {
        //     $ret[] = $patient->activesubstance->activesubstancename;
        // }
        // $_SESSION['result'] = $ret;
        // print_r($ret);
      //header("Location: search.php");
      //print_r(substr($email, 0, -10));
    } else {
        $_SESSION['error'] = "Not Found. Enter a valid keyword.";
        header("Location: error.php");
    }
}

if(isset($_POST['btn-search3'])) {
    $arg = $_POST['query3'];
    try {


        $manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

        $filter = ['patient.drug.medicinalproduct' => $arg];

        $options = ["projection" => ["patient.drug.drugindication" => 1]];

        $query = new MongoDB\Driver\Query($filter, $options);

        $cursor = $manager->executeQuery('openFDA.drugs', $query);

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
        $patient = $row[0]->patient->drug;
        $ret = ($patient[0]->drugindication);
        //  print_r($ret);
        $_SESSION['result'] = $ret;
      
        header("Location: search3.php");
        // for ($n = 0; $n < count($patient); $n++) {
        //     $ret[] = $patient->activesubstance->activesubstancename;
        // }
        // $_SESSION['result'] = $ret;
        // print_r($ret);
      //header("Location: search.php");
      //print_r(substr($email, 0, -10));
    } else {
        $_SESSION['error'] = "Not Found. Enter a valid keyword.";
        header("Location: error.php");
    }
}
//echo "Connected successfully";
?>


<!DOCTYPE HTML>
<html>
<body><p>hello</p></body>
</html>
