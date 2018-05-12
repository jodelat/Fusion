<?php
$dsn = 'mysql:host=ou6zjjcqbi307lip.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=q5acn6f1lkzsccbu';
$username = 'root';
$password = 'program1';
$options = [];

try {
  $connection = new PDO($dsn, $username, $password, $options);
}catch(PDOException $e) {

}
?>
