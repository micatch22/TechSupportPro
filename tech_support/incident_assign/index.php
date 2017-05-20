<?php
/****************************************************
 * Date: 4/28/2017                                  *
 * Authors: Chantal Dale & Michelle Pierce          *
 * Class: CIS 4100                                  *
 * Project 3                                        *
 ****************************************************/
require_once('../util/main.php');
require('../model/database.php');
require('../model/customer_db.php');
require('../model/technician_db.php');
require('../model/incident_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
    $action = 'display_incident_select';
    }
}
session_start();
switch ($action) {
    case 'display_incident_select':
        $incidents = get_incidents_unassigned();
        include('incident_select.php');
        break;
    case 'select_incident':
       
        $incident_id = $_POST['incident_id'];
        $_SESSION['incident_id'] = $incident_id;

        $technicians = get_technicians_with_count();
        include('technician_select.php');
        break;
    case 'select_technician':
       
        $technician_id = $_POST['technician_id'];
        $_SESSION['technician_id'] = $technician_id;

        $incident_id = $_SESSION['incident_id'];

        $technician = get_technician($technician_id);
        $incident = get_incident($incident_id);
        $customer = get_customer($incident['customerID']);
        include('incident_assign.php');
        break;
    case 'assign_incident':
        $count = assign_incident($_SESSION['incident_id'],
                                 $_SESSION['technician_id']);
        if ($count == 1) {
            $message = "This incident was assigned to a technician.";
        } else {
            $message = "An error occurred while attempting to update the database.";
        }
        include('incident_assign.php');
        break;
}
?>