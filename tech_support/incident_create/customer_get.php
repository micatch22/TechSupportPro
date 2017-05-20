<?php include '../view/header.php'; 
/****************************************************
 * Date: 4/28/2017                                  *
 * Authors: Chantal Dale & Michelle Pierce          *
 * Class: CIS 4100                                  *
 * Project 3                                        *
 ****************************************************/
?>
<main>

    <h2>Get Customer</h2>
    <p>You must enter the customer's email address to select the customer.</p>
        <form action="" method="post">
            <input type="hidden" name="action" value="get_customer" />
            <label>Email:</label>&nbsp;
            <input type="input" name="email" value="<?php echo $email; ?>" />&nbsp;
            <input type="submit" value="Get Customer" />
        </form>

</main>
<?php include '../view/footer.php'; ?>