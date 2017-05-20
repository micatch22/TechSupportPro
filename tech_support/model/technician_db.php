<?php
/****************************************************
 * Date: 4/28/2017                                  *
 * Authors: Chantal Dale & Michelle Pierce          *
 * Class: CIS 4100                                  *
 * Project 3                                        *
 ****************************************************/
function get_technicians() {
    global $db;
    $query = 'SELECT * FROM technicians
              ORDER BY lastName';
    try {
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}

function get_technicians_with_count() {
    global $db;
    $query = 'SELECT *,
                (SELECT COUNT(*) FROM incidents
                 WHERE incidents.techID = technicians.techID) AS openIncidentCount
              FROM technicians
              ORDER BY openIncidentCount';
    try {
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}

function get_technician($id) {
    global $db;
    $query = 'SELECT * FROM technicians
              WHERE techID = :id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}

function get_technician_by_email($email) {
    global $db;
    $query = 'SELECT * FROM technicians
              WHERE email = :email';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}

function delete_technician($technician_id) {
    global $db;
    $query = 'DELETE FROM technicians
              WHERE techID = :technician_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':technician_id', $technician_id);
        $row_count = $statement->execute();
        $statement->closeCursor();
        return $row_count;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}

function add_technician($first_name, $last_name, $email, $phone, $password) {
    global $db;
    $query = 'INSERT INTO technicians
                 (firstName, lastName, email, phone, password)
              VALUES
                 (:first_name, :last_name, :email, :phone, :password)';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':first_name', $first_name);
        $statement->bindValue(':last_name', $last_name);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':phone', $phone);
        $statement->bindValue(':password', $password);
        $statement->execute();
        $statement->closeCursor();

        $id = $db->lastInsertId();
        return $id;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function update_technician($id, $first_name, $last_name, $email, $phone, $password) {
    global $db;
    $query = 'UPDATE technicians
              SET firstName = :first_name,
                  lastName = :last_name,
                  email = :email,
                  phone = :phone,
                  password = :password
              WHERE technicianID = :id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->bindValue(':first_name', $first_name);
        $statement->bindValue(':last_name', $last_name);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':phone', $phone);
        $statement->bindValue(':password', $password);
        $row_count = $statement->execute();
        $statement->closeCursor();
        return $row_count;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

?>