<?php
/****************************************************
 * Date: 4/28/2017                                  *
 * Authors: Chantal Dale & Michelle Pierce          *
 * Class: CIS 4100                                  *
 * Project 3                                        *
 ****************************************************/
require('../model/database.php');
require('../model/database_oo.php');
require('../model/technician.php');
require('../model/technician_db_oo.php');

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'list_technicians';
}

switch ($action) {
    case 'list_technicians':
      
        $technicians = TechnicianDB::getTechnicians();

        include('technician_list.php');
        break;
    case 'delete_technician':
        $technician_id = $_POST['technician_id'];
        TechnicianDB::deleteTechnician($technician_id);
        header("Location: .");
        break;
    case 'show_add_form':
        include('technician_add.php');
        break;
    case 'add_technician':
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];

        if (empty($first_name) || empty($last_name) ||
            empty($email) || empty($phone) || empty($password)) {
                $error = "Invalid technician data. Check all fields and try again.";
                include('../errors/error.php');
        } else {
           
            $t = new Technician($first_name, $last_name, $email, $phone, $password);
            TechnicianDB::addTechnician($t);
            header("Location: .");
        }
        break;
}
?>