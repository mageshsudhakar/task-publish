<?php  
require("vendor/autoload.php");
$client = new MongoDB\Client('mongodb://localhost:27017');

// select a database (will be created automatically if it not exists)
$db = $client->profile;
// select a collection (will be created automatically if it not exists)
$coll = $db->selectCollection("Person_Details");
// insert a datatow in the collection
$coll->insertOne([
    'Name' => $_POST['name'],
    'Phone' => $_POST['phone'],
    'email' => $_POST['email'],
    'College' => $_POST['college'],
    'Course' => $_POST['course'],
    'Year of passing' => $_POST['yop'],
    'Area of Intrest' => $_POST['areaOfIntrest']
]);
$response['success'] = true;
echo json_encode($response);
// search for the datarow
// var_dump($coll->find());

?>
