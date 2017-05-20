<?php include '../view/header.php'; 
/****************************************************
 * Date: 4/28/2017                                  *
 * Authors: Chantal Dale & Michelle Pierce          *
 * Class: CIS 4100                                  *
 * Project 3                                        *
 ****************************************************/
?>
<main>

    <h2>Customer Login</h2>
    <p>You must login before you can register a product.</p>
    
        <form action="" method="post">
            <input type="hidden" name="action" value="display_register" />
            <label>Email:</label>
            <input type="input" name="email" value="<?php echo $email; ?>" />
            <input type="submit" value="Login" />
        </form>
    

</main>
<?php include '../view/footer.php'; ?>