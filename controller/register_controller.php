<?php
include('../model/connection.php');
if(isset($_POST['register'])){
  $customer_name = $_POST['customer_name'];
  $customer_password = md5($_POST['customer_password']);
  $customer_email = $_POST['customer_email'];
  //verifying the unique email

  $verify_query = mysqli_query($conn,"SELECT customer_email FROM customers WHERE customer_email='$customer_email'");
  if(mysqli_num_rows($verify_query) !=0){
    echo "<div class = 'message'>
          <p>This email is used, Try another One Please!</p>
        </div> <br>";
    echo "<a href='javascript:self.history.back()'><button>Go Back</button>";
  }
  else{
    mysqli_query($conn,"INSERT INTO customers(customer_name,customer_email,customer_password) VALUES('$customer_name','$customer_email','$customer_password')") or die("Erroe Occured");

    echo "<div class = 'message'>
    <p>Registration successful!</p>
    </div> <br>";
    echo "<a href='login.php'><button>Login Now</button>";

  }
}
?>