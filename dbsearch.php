<?
  require "config.php";

  if (isset($_GET['fdate'])) {
    try {
      $connection = new PDO($dsn, $username, $password, $options);
    
      $sql_insert = "SELECT RateValue FROM USDrates WHERE RateDate = :fdate";
      $statement = $connection->prepare($sql_insert);
      
      $statement->bindParam(':fdate', $RateDate);

      $statement->execute();
      $result = $statement->fetch();

      echo $result['RateValue'];

    } catch(PDOException $error) {
      echo 'invalid';
      }
    }
?>