<?
include('database.php');

$search = $_GET['fdate'];

if(!empty($fdate)) {
  
  $sql = "SELECT val FROM rates WHERE fdate='$fdate'";
  $result = mysqli_query($connection,$sql);
  
  if(mysqli_num_rows($result) == 1) {
    echo $sql;
  }
  else {
    echo 'invalid';
  }
}
?>