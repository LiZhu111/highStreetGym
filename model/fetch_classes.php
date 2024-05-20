<?php

include('connection.php');

$query = "SELECT * FROM classes";

// Prepare and execute the query
$stmt = $conn->prepare($query);

$stmt->execute();
$all_classes = $stmt->get_result();

?>