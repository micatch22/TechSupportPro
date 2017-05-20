<?php
/****************************************************
 * Date: 4/28/2017                                  *
 * Authors: Chantal Dale & Michelle Pierce          *
 * Class: CIS 4100                                  *
 * Project 3                                        *
 ****************************************************/
require('../model/database.php');
require('../model/product_db.php');

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'list_products';
}

switch ($action) {
    case 'list_products':
        $products = get_products();

        include('product_list.php');
        break;
    case 'delete_product':
        $product_code = $_POST['product_code'];
        delete_product($product_code);
        header("Location: .");
        break;
    case 'show_add_form':
        include('product_add.php');
        break;
    case 'add_product':
        $code = $_POST['code'];
        $name = $_POST['name'];
        $version = $_POST['version'];
        $release_date = $_POST['release_date'];

        $ts = strtotime($release_date);
        $release_date_db = date('Y-m-d', $ts);  

        if (empty($code) || empty($name) || empty($version) || empty($release_date_db)) {
            $error = "Invalid product data. Check all fields and try again.";
            include('../errors/error.php');
        } else {
            add_product($code, $name, $version, $release_date_db);
            header("Location: .");
        }
        break;
}
?>