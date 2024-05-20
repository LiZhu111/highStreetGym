<?php

include('connection.php');

$query = "SELECT * FROM trainers";

// Prepare and execute the query
$stmt = $conn->prepare($query);

$stmt->execute();
$all_trainers = $stmt->get_result();

?>