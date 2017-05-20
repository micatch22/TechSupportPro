<?php
/****************************************************
 * Date: 4/28/2017                                  *
 * Authors: Chantal Dale & Michelle Pierce          *
 * Class: CIS 4100                                  *
 * Project 3                                        *
 ****************************************************/
class TechnicianDB {

    public static function getTechnicians() {
        $db = Database::getDB();
        $query = 'SELECT * FROM technicians
                  ORDER BY lastName';

        try {
            $statement = $db->prepare($query);
            $statement->execute();
            $rows = $statement->fetchAll();
            $statement->closeCursor();
        } catch (PDOException $e) {
            display_db_error($e->getMessage());
        }

        $technicians = array();
        foreach($rows as $row) {
            $t = new Technician(
                    $row['firstName'], $row['lastName'],
                    $row['email'], $row['phone'], $row['password']);
            $t->setID($row['techID']);
            $technicians[] = $t;
        }
        return $technicians;
    }

    public static function deleteTechnician($technician_id) {
        $db = Database::getDB();
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

    public static function addTechnician($t) {
        $db = Database::getDB();

        $first_name = $t->getFirstName();
        $last_name = $t->getLastName();
        $email = $t->getEmail();
        $phone = $t->getPhone();
        $password = $t->getPassword();

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
}
?>