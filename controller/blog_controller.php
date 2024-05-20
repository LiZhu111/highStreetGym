<?php

session_start();

include('../model/connection.php');

$stmt = $conn->prepare("SELECT * FROM blogs");
$stmt->execute();
$all_blogs = $stmt->get_result();


?>