<?php
      session_start();
      session_destroy();
      header("Location: ../view/profile.php");
?>