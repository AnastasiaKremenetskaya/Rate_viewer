<?
  require "config.php";

  if (isset($_GET['fdate'])) {
    try {
      $connection = new PDO($dsn, $username, $password, $options);
    
      $sql = "SELECT RateValue 
      FROM USDrates
      WHERE RateDate = '$fdate'";
$statement = $connection->prepare($sql);
$statement->execute();
$result = $statement->fetchAll();
} catch(PDOException $error) {
  echo 'invalid';
}
  }
?>