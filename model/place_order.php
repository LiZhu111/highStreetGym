<?php 

session_start();
include('connection.php');

if(isset($_POST['place_order'])){

    // get user info and store it in database
    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $postcode = $_POST['postcode'];
    $state = $_POST['state'];
    $order_date = date("Y-m-d H:i:s");

    $stmt_customer = $conn->prepare(
        "INSERT INTO customers (firstname, lastname, cust_phone, cust_email, cust_address, postcode, city, state)
         VALUES (?, ?, ?, ?, ?, ?, ?, ?);"
    );
    $stmt_customer->bind_param(
        'ssssssss', $first_name, $last_name, $phone, $email, $address, $postcode, $city, $state
    );
    $stmt_customer->execute();
    $customer_id = $stmt_customer->insert_id;

    $stmt = $conn->prepare(
        "INSERT INTO orders (order_date, customer_id)
        VALUES (?, ?);"
    );
    $stmt->bind_param('sd', $order_date, $customer_id);
    $stmt->execute();
    $order_number = $stmt->insert_id;

    // get products from cart
    foreach ($_SESSION['cart'] as $key => $value) {
        $product = $_SESSION['cart'][$key];
        $product_id = $product['product_id'];
        $product_name = $product['product_name'];
        $product_price = $product['price'];
        $product_quantity = $product['quantity'];

        // store each single item in order_items database
        $stmt_order_detail = $conn->prepare(
            "INSERT INTO order_details (product_id, quantity, price_sold, order_number)
             VALUES (?, ?, ?, ?);"
        );
        $stmt_order_detail->bind_param('iiii', $product_id, $product_quantity, $product_price, $order_number);
        $stmt_order_detail->execute();
    };

    // remove everything from cart
    unset($_SESSION['cart']);

    // inform user whether everything is fine or there is a problem
    header('location: ../payment.php?order_status=order placed successfully');
    

}

?>