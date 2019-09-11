<?
  require "config.php";

if(isset($_GET['fdate'])) {
  try {
    $connection = new PDO($dsn, $username, $password, $options);

    $RateDate = $_GET['fdate'];
    $RateValue = $_GET['fvalue'];
    
    // Insert data
    $sql_insert = "INSERT INTO USDrates (RateDate, RateValue) VALUES (?,?)";
     
    $statement = $connection->prepare($sql_insert);

    $statement->bindValue(1, $RateDate);
    $statement->bindValue(2, $RateValue);
    
    $statement->execute();
  } catch(PDOException $error) {
      echo $error->getMessage();
  }
  }
?>