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
    $user_name = $row->user_name;
    $password = md5($row->password);
    $user_role = $row->user_role;
    $email = $row->email;

    $sql = "INSERT INTO users (username, password, email, user_role) 
        VALUES ('$user_name', '$password', '$email', '$user_role')";
    mysqli_query($conn, $sql);
    
  }
}

$stmt = $conn->prepare("SELECT * FROM users ");
$stmt->execute();
$all_users = $stmt->get_result();

?>