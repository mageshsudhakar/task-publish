<?php
require 'function.php';
require("vendor/autoload.php");
if(isset($_SESSION["id"])){
  $id = $_SESSION["id"];
  $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $id"));
}
else{
  header("Location: login.php");
}
$client = new MongoDB\Client('mongodb://localhost:27017');
// select a database (will be created automatically if it not exists)
$db = $client->profile;
// select a collection (will be created automatically if it not exists)
$coll = $db->selectCollection("Person_Details");
$ans= $coll->find(['email'=>$user['username']]);
$record = json_decode(json_encode($ans->toArray(),true), true);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
        Name: <?php $record['Name']?> <br>
        Phone: <?php $record['Phone']?> <br>
        Email: <?php $record['email']?> <br>
        College: <?php $record['College']?> <br>
        Course: <?php $record['Course']?> <br>
        Year Of Passing: <?php $record['Year of passing']?> <br>
        Area of Intrest: <?php $record['Area of Intrest']?> <br>
  </body>
</html>