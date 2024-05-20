<?php

session_start();

include('./model/connection.php');



$stmt = $conn->prepare("SELECT * FROM classes");
$stmt->execute();
$all_users = $stmt->get_result();
?>