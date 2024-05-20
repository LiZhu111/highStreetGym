<?php

include('connection.php');

$query = "SELECT * FROM class_detail";

// Prepare and execute the query
$stmt = $conn->prepare($query);

$stmt->execute();
$all_trainers = $stmt->get_result();

?>