<?php
/****************************************************
 * Date: 4/28/2017                                  *
 * Authors: Chantal Dale & Michelle Pierce          *
 * Class: CIS 4100                                  *
 * Project 3                                        *
 ****************************************************/
$dsn = 'mysql:host=localhost;dbname=tech_support';
$username = 'ts_user';
$password = 'pa55word';
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

try {
    $db = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include 'errors/database_error.php';
    exit;
}

function display_db_error($error_message) {
    global $app_path;
    include 'errors/db_error_connect.php';
    exit;
}

?>