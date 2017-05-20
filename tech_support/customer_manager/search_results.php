<?php include '../view/header.php' 
/****************************************************
 * Date: 4/28/2017                                  *
 * Authors: Chantal Dale & Michelle Pierce          *
 * Class: CIS 4100                                  *
 * Project: 20-1                                    *
 ****************************************************/
?>
<main>
<h2>Customer Search</h2>  
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="search_customers" />
        <label>Last Name:</label>
        <input type="text" name="last_name" value="<?php if (isset($last_name))
                  { echo $last_name; } ?>"/>
        <input type="submit" value="Search" />
    </form>
<!-- display a table of customers -->
<h2>Results</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Email Address</th>
            <th>City</th>
            <th>ID</th>
        </tr>
        <?php foreach ($customers as $customer): ?>
        <tr>
            <td><?php echo $customer['firstName'] . ' ' . $customer['lastName']; ?></td>
            <td><?php echo $customer['email']; ?></td>
            <td><?php echo $customer['city']; ?></td>
            <td><?php echo $customer['customerID']; ?></td>
            <td>
                <form action="." method="post">
                    <input type="hidden" name="action" value="display_customer" />
                    <input type="hidden" name="customer_id"
                         value="<?php echo $customer['customerID']; ?>" />
                    <input type="submit" value="Select" />
                 </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h2>Add a new customer</h2>
        <form action="." method="post">
            <input type="hidden" name="action" value="display_add" />
            <input type="submit" value="Add Customer" />
        </form>
</main>
<?php include '../view/footer.php'; ?>



