<?php

//Open a connection via PDO

require "config.php";
try {
    $connection = new PDO("mysql:host=$host", $username, $password, $options);
    $sql = file_get_contents("data/init.sql");
    $connection->exec($sql);
    
    echo "Database and table USDrates created successfully.";
} catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}
?>