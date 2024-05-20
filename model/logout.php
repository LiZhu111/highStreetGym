<?php
      session_start();
      $_SESSION['customer_logged_in'] = False;
      session_destroy();
      header("Location: ../index.php");
?>