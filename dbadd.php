<?
  include('database.php');

if(isset($_GET['fdate'])) {
  $rate_date = $_GET['fdate'];
  $rate_value = $_GET['fvalue'];
  $query = "INSERT into rates(date, value) VALUES ('$rate_date', '$rate_value')";
  $result = mysqli_query($connection, $query);
  if (!$result) {
    die('Query Failed.');
  }
  echo "Rate Added";  
}
?>