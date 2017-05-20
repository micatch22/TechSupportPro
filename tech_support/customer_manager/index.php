<?php
/**************************************************
 * Date: 4/28/17                                  *
 * Authors: Chantal Dale & Michelle Pierce        *
 * Class: CIS 4100                                *
 * Project: 20-1                                  *
 **************************************************/
require_once('../model/database.php');
require_once('../model/customer_db.php');
require_once('../model/country_db.php');
require_once('../model/fields.php');
require_once('../model/validate.php');

$validate = new Validate();
$fields = $validate->getFields();
$fields->addField('first_name');
$fields->addField('last_name');
$fields->addField('address');
$fields->addField('city');
$fields->addField('state');
$fields->addField('postal_code');
$fields->addField('phone');
$fields->addField('email');
$fields->addField('password');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'show_search_form';
    }
} 
// Manage Customers Handler
switch ($action) {
    case 'show_search_form':
        include('customer_search.php'); //Display customer search page
        break;    
    case 'search_customers':
        $last_name = filter_input(INPUT_POST, 'last_name');
        $customers = get_customers_by_last_name($last_name);
        include('search_results.php');
        break;
    case 'display_customer':
        $customer_id = filter_input(INPUT_POST, 'customer_id');
        echo var_dump($customer_id);
        $customer = get_customer($customer_id);
        $customer_id = $customer['customerID'];
        $first_name = $customer['firstName'];
        $last_name = $customer['lastName'];
        $address = $customer['address'];
        $city = $customer['city'];
        $state = $customer['state'];
        $postal_code = $customer['postalCode'];
        $country_code = $customer['countryCode'];
        $phone = $customer['phone'];
        $email = $customer['email'];
        $password = $customer['password'];

        $countries = get_countries();

        $action = 'update_customer';
        $button_text = 'Update Customer';

        include('customer_display.php');
        break;
    case 'display_add':
        $password = '';         
        $country_code = 'US';  
        $countries = get_countries();
        $action = 'add_customer';
        $button_text = 'Add Customer';
        include('customer_display.php');
        break;
    case 'add_customer':
        $first_name = trim(filter_input(INPUT_POST, 'first_name'));
        $last_name = trim(filter_input(INPUT_POST, 'last_name'));
        $address = trim(filter_input(INPUT_POST, 'address'));
        $city = trim(filter_input(INPUT_POST, 'city'));
        $state = trim(filter_input(INPUT_POST, 'state'));
        $postal_code = trim(filter_input(INPUT_POST, 'postal_code'));
        $country_code = trim(filter_input(INPUT_POST, 'country_code'));
        $phone = trim(filter_input(INPUT_POST, 'phone'));
        $email = trim(filter_input(INPUT_POST, 'email'));
        $password = trim(filter_input(INPUT_POST, 'password'));

        $validate->text('first_name', $first_name, true, 1, 50);
        $validate->text('last_name', $last_name, true, 1, 50);
        $validate->text('address', $address, true, 1, 50);
        $validate->text('city', $city, true, 1, 50);
        $validate->text('state', $state, true, 1, 50);
        $validate->text('postal_code', $postal_code, true, 1, 20);
        $validate->phone('phone', $phone, true, 1, 20);
        $validate->email('email', $email, true, 1, 50);
        $validate->password('password', $password, true, 6, 20);

        if ($fields->hasErrors()) {
            $countries = get_countries();
            $action = 'add_customer';
            $button_text = 'Add Customer';
            include('customer_display.php');
        } else {
            add_customer($first_name, $last_name,
                    $address, $city, $state, $postal_code, $country_code,
                    $phone, $email, $password);
            $customerName = $first_name . " " . $last_name . " ";
            $addUpdated = "added.";
            include('confirm_customer_update.php');
        }       
        break;
    case 'update_customer':
        $customer_id = trim(filter_input(INPUT_POST, 'customer_id'));
        $first_name = trim(filter_input(INPUT_POST, 'first_name'));
        $last_name = trim(filter_input(INPUT_POST, 'last_name'));
        $address = trim(filter_input(INPUT_POST, 'address'));
        $city = trim(filter_input(INPUT_POST, 'city'));
        $state = trim(filter_input(INPUT_POST, 'state'));
        $postal_code = trim(filter_input(INPUT_POST, 'postal_code'));
        $country_code = trim(filter_input(INPUT_POST, 'country_code'));
        $phone = trim(filter_input(INPUT_POST, 'phone'));
        $email = trim(filter_input(INPUT_POST, 'email'));
        $password = trim(filter_input(INPUT_POST, 'password'));
    
        //Validate firstName, lastName, address, city, and state:
        // required and between 1 and 50 characters
        $validate->text('first_name', $first_name, true, 1, 50);
        $validate->text('last_name', $last_name, true, 1, 50);
        $validate->text('address', $address, true, 1, 50);
        $validate->text('city', $city, true, 1, 50);
        $validate->text('state', $state, true, 1, 50);
        
        // Validate postalCode: required and between 1 and 20 characters
        $validate->text('postal_code', $postal_code, true, 1, 20);
        $validate->phone('phone', $phone, true);
        $validate->email('email', $email, true);
        $validate->password('password', $password, true, 1, 20);

        if ($fields->hasErrors()) {
            $action = 'update_customer';
            $button_text = 'Update Customer';
            $countries = get_countries();
            include('customer_display.php');
        } else {
            update_customer($customer_id, $first_name, $last_name,
                    $address, $city, $state, $postal_code, $country_code,
                    $phone, $email, $password);
            $customerName = $first_name . " " . $last_name . " ";
            $addUpdated = "updated.";
            include('confirm_customer_update.php');
        }
        break;
}
?>