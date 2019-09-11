<?
  require "config.php";

if(isset($_GET['fdate'])) {
  try {
    $connection = new PDO($dsn, $username, $password, $options);
    $new_rate = array(
      "firstname" => $_GET['fdate'],
      "lastname"  => $_GET['fvalue']
    );
    $sql = sprintf(
      "INSERT INTO %s (%s) values (%s)",
      "USDrates",
      implode(", ", array_keys($new_rate)),
      ":" . implode(", :", array_keys($new_rate))
    );
    
    $statement = $connection->prepare($sql);
    $statement->execute($new_user);
  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }
  }
?>