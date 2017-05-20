<?php include '../view/header.php'; 
/****************************************************
 * Date: 4/28/2017                                  *
 * Authors: Chantal Dale & Michelle Pierce          *
 * Class: CIS 4100                                  *
 * Project 3                                        *
 ****************************************************/
?>
<main>
    <h2>Assign Incident</h2>
        <?php if (isset($message)) : ?>
            <p><?php echo $message; ?></p>
            <p><a href="">Select Another Incident</a></p>
        <?php else: ?>

            <form action="" method="post">
                <label>Customer:</label>
                <span><?php echo $customer['firstName'] . ' ' . $customer['lastName']; ?></span>
                &nbsp;<br />

                <label>Product:</label>
                <span><?php echo $incident['productCode']; ?></span>
                &nbsp;<br />

                <label>Technician:</label>
                <span><?php echo $technician['firstName'] . ' ' . $technician['lastName']; ?></span>
                &nbsp;<br />

                <input type="hidden" name="action" value="assign_incident" />
                <input type="submit" value="Assign Incident" />
            </form>
        <?php endif; ?>

</main>
<?php include '../view/footer.php'; ?>