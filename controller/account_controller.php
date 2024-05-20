<?php 
   session_start();

   include('../model/connection.php');
   if(!isset($_SESSION['customer_logged_in'])){
    header('location: login.php');
    exit;
   }
   
  $id = $_SESSION['customer_id'];
  $query = mysqli_query($conn,"SELECT*FROM customers WHERE customer_id=$id");
  while($result = mysqli_fetch_assoc($query)){
    $res_Uname = $result['customer_name'];
    $res_Email = $result['customer_email'];
    $res_id = $result['customer_id'];
  }

  $stmt = $conn->prepare(
    "SELECT * FROM classbookings 
     JOIN class_detail ON classbookings.classdetail_id = class_detail.classdetail_id 
     WHERE classbookings.customer_id=?"
  );
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $booked_class = $stmt->get_result();
 ?>