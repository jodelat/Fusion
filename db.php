<?php
$dsn = 'mysql:host=localhost:3306;dbname=fusion';
$username = 'root';
$password = 'program1';
$options = [];

try {
  $connection = new PDO($dsn, $username, $password, $options);
}catch(PDOException $e) {

}
?>
