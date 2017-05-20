<?php include '../view/header.php'; 
/****************************************************
 * Date: 4/28/2017                                  *
 * Authors: Chantal Dale & Michelle Pierce          *
 * Class: CIS 4100                                  *
 * Project: 20-1                                    *
 ****************************************************/
?>
<main>
    <h2>Success!</h2>
    <p><?php echo $customerName;?> was successfully <?php echo $addUpdated;?></p>
    
    
    <h2>Add a new customer</h2>
        <form action="index.php" method="post">
            <input type="hidden" name="action" value="display_add" />
            <input type="submit" value="Add Customer" />
        </form>
    <p><a href="?action=show_search_form">Search Customers</a></p>
</main>
<?php include '../view/footer.php'; ?>
