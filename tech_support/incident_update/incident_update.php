<?php include '../view/header.php'; 
/****************************************************
 * Date: 4/28/2017                                  *
 * Authors: Chantal Dale & Michelle Pierce          *
 * Class: CIS 4100                                  *
 * Project 3                                        *
 ****************************************************/
?>
<main>
    
    <h2>Update Incident</h2>
        <?php if (isset($message)) : ?>
            <p><?php echo $message; ?></p>
            <p><a href="">Select Another Incident</a></p>
        <?php else: 
            $ts = strtotime($incident['dateOpened']);
            $date_opened = date('n/j/Y', $ts);
        ?>

        <form action="" method="post" id="aligned">
                <label>Incident ID:</label>
                <span><?php echo $incident['incidentID']; ?></span>
                <br />

                <label>Product Code:</label>
                <span><?php echo $incident['productCode']; ?></span>
                <br />

                <label>Date Opened:</label>
                <span><?php echo $date_opened; ?></span>
                <br />

                <label>Date Closed:</label>
                <input type="text" name="date_closed" />
                <br />
                
                <label>Title:</label>
                <span><?php echo $incident['title']; ?></span>
                <br />

                <label>Description:</label>
                <textarea name="description" cols="40" rows="6"><?php echo $incident['description']; ?></textarea>
                <br />

                <input type="hidden" name="action" value="update_incident" />
                <input type="submit" value="Update Incident" />
        </form>
        <?php endif; ?>
        <p>You are logged in as <?php echo $_SESSION['technician']['email']; ?></p>
        <form action="" method="post">
            <input type="hidden" name="action" value="logout" />
            <input type="submit" value="Logout" />
        </form>
    </main>
<?php include '../view/footer.php'; ?>