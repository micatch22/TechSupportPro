<?php include '../view/header.php'; 
/****************************************************
 * Date: 4/28/2017                                  *
 * Authors: Chantal Dale & Michelle Pierce          *
 * Class: CIS 4100                                  *
 * Project 3                                        *
 ****************************************************/
?>
<main>

    <h1>Product List</h1>

  
        <table>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Version</th>
                <th>Release Date</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($products as $product) :
                $ts = strtotime($product['releaseDate']);
                $release_date_formatted = date('n/j/Y', $ts);
            ?>
            <tr>
                <td><?php echo $product['productCode']; ?></td>
                <td><?php echo $product['name']; ?></td>
                <td><?php echo $product['version']; ?></td>
                <td><?php echo $release_date_formatted; ?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_product" />
                    <input type="hidden" name="product_code"
                           value="<?php echo $product['productCode']; ?>" />
                    <input type="submit" value="Delete" />
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="?action=show_add_form">Add Product</a></p>


</main>
<?php include '../view/footer.php'; ?>