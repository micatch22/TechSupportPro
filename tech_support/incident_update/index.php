<?php
/****************************************************
 * Date: 4/28/2017                                  *
 * Authors: Chantal Dale & Michelle Pierce          *
 * Class: CIS 4100                                  *
 * Project 3                                        *
 ****************************************************/
require('../model/database.php');
require('../model/customer_db.php');
//require('../model/technician_db.php');
require('../model/incident_db.php');
// Start session management with a persistent cookie
$lifetime = 60 * 60 * 24 * 14;  // 2 weeks in seconds
session_set_cookie_params($lifetime, '/');
session_start();

if (empty($_SESSION['technician'])) {$_SESSION['techician'] = array();}

require_once('../model/technician_db.php');

// Get the action to perform
$action = filter_input(INPUT_POST, 'action');
if ($action === NULL){
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'display_login';
    }
}
switch ($action) {
    case 'display_login':
        include('technician_login.php');
        break;
    case 'display_incident_select':
        if (!isset($_SESSION['technician'])) {
            $email = filter_input(INPUT_POST, 'email');
            $technician = get_technician_by_email($email);
            $_SESSION['technician'] = $technician;
            $tech_id = $technician['techID'];
            $incidents = get_incidents_by_technician($tech_id);
            if (count($incidents) == 0) {
                $message = 'There are no open incidents for this technician.';
            }
        }
        else if (isset($_SESSION['technician'])) {
            $technician = $_SESSION['technician'];
            $tech_id = $_SESSION['techID'];
            if (count($incidents) == 0) {
                $message = 'There are no open incidents for this technician.';
            }
        }
        include('incident_select.php');
        break;
    case 'select_incident':
        $incident_id = filter_input(INPUT_POST,'incident_id');
        $_SESSION['incident_id'] = $incident_id;
        $incident = get_incident($incident_id);
        include('incident_update.php');
        break;
    case 'update_incident':
        $date_closed = $_SESSION['date_closed'];
        $description = $_SESSION['description'];

        $incident_id = $_SESSION['incident_id'];

        $ts = strtotime($date_closed);
        $date_closed = date('Y-m-d', $ts);

        $count = update_incident($incident_id, $date_closed, $description);
        if ($count == 1) {
            $message = "This incident was updated.";
        } else {
            $message = "An error occurred while attempting to update the database.";
        }
        include('incident_update.php');
        break;
    case 'logout':
        unset($_SESSION['technician']);
        include('technician_login.php');
        break;
}
?>