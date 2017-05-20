<?php include '../view/header.php'; 
/****************************************************
 * Date: 4/28/2017                                  *
 * Authors: Chantal Dale & Michelle Pierce          *
 * Class: CIS 4100                                  *
 * Project 3                                        *
 ****************************************************/
?>
<main>
    <h2>Create Incident</h2>
        <?php if (isset($message)) : ?>
            <p><?php echo $message; ?></p>
        <?php else: ?>
            <form action="" method="post">
                <input type="hidden" name="action"
                       value="create_incident" />
                <input type="hidden" name="customer_id"
                       value="<?php echo $customer['customerID']; ?>" />

                <label>Customer:</label>
                <span><?php echo $customer['firstName'] . ' ' . $customer['lastName'] ?></span>
                <br />

                <label>Product:</label>
                <select name="product_code">
                <?php foreach ($products as $product) : ?>
                    <option value="<?php echo $product['productCode']; ?>">
                        <?php echo $product['name']; ?>
                    </option>
                <?php endforeach; ?>
                </select>
                <br />

                <label>Title:</label>
                <input type="input" name="title" />
                <br />

                <label>Description:</label>
                <textarea name="description" cols="40" rows="5"></textarea>
                <br />

                <label>&nbsp;</label>
                <input type="submit" value="Create Incident" />
            </form>
        <?php endif; ?>
</main>
<?php include '../view/footer.php'; ?>