<?php

session_start();

include('../model/connection.php');

if(!isset($_SESSION['logged_in'])){
    header('location: admin-login.php');
    exit;
}
$stmt = $conn->prepare("SELECT * FROM customers ");
$stmt->execute();
$all_users = $stmt->get_result();

?>