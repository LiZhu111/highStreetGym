<?php

session_start();

include('../model/connection.php');

if(!isset($_SESSION['logged_in'])){
    header('location: admin-login.php');
    exit;
}

if(isset($_FILES['xmlfile']) && ($_FILES['xmlfile']['error'] == UPLOAD_ERR_OK)){
  $xml = simplexml_load_file($_FILES['xmlfile']['tmp_name']);
  foreach ($xml->children() as $row){
    $trainername = $row->trainername;
    $image_url = $row->image_url;

    $sql = "INSERT INTO trainers (trainername, image_url) 
        VALUES ('$trainername', '$image_url')";
    mysqli_query($conn, $sql);
    
  }
}

$stmt = $conn->prepare("SELECT * FROM trainers ");
$stmt->execute();
$all_users = $stmt->get_result();

?>