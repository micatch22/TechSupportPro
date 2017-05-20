<?php
/****************************************************
 * Date: 4/28/2017                                  *
 * Authors: Chantal Dale & Michelle Pierce          *
 * Class: CIS 4100                                  *
 * Project 3                                        *
 ****************************************************/
require('../model/database.php');
require('../model/customer_db.php');
require('../model/product_db.php');
require('../model/registration_db.php');

session_start();

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else if (isset($_SESSION['customer'])) {    
    $action = 'display_register';
} else {
    $action = 'display_login';
}

switch ($action) {
    case 'display_login':
        include('customer_login.php');
        break;
    case 'display_register':
        if (!isset($_SESSION['customer'])) {
            $email = $_POST['email'];
            $customer = get_customer_by_email($email);
            $_SESSION['customer'] = $customer;
        }

        $customer = $_SESSION['customer'];
        $products = get_products();
        include('product_register.php');
        break;
    case 'register_product':
        $customer = $_SESSION['customer'];
        $product_code = $_POST['product_code'];

        add_registration($customer['customerID'], $product_code);
        $message = "Product ($product_code) was registered successfully.";

        include('product_register.php');
        break;
    case 'logout':
        unset($_SESSION['customer']);
        include('customer_login.php');
        break;
}
?>