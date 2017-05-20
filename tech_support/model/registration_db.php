
<?php
/****************************************************
 * Date: 4/28/2017                                  *
 * Authors: Chantal Dale & Michelle Pierce          *
 * Class: CIS 4100                                  *
 * Project 3                                        *
 ****************************************************/
function add_registration($customer_id, $product_code) {
    global $db;
    $date = date('Y-m-d');  
    $query = 'INSERT INTO registrations VALUES
              (:customer_id, :product_code, :date)';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':customer_id', $customer_id);
        $statement->bindValue(':product_code', $product_code);
        $statement->bindValue(':date', $date);
        $statement->execute();
        $statement->closeCursor();

        $id = $db->lastInsertId();
        return $id;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}
?>