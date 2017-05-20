<?php include '../view/header.php'; 
/****************************************************
 * Date: 4/28/2017                                  *
 * Authors: Chantal Dale & Michelle Pierce          *
 * Class: CIS 4100                                  *
 * Project 3                                        *
 ****************************************************/
?>
<main>

    <h2>Technician Login</h2>
    <p>You must login before you can update an incident.</p>
      
        <form action="index.php" method="post">
            <input type="hidden" name="action" value="display_incident_select" />
            <label>Email:</label>
            <input type="text" name='email' value="<?php if (isset($_SESSION['email'])) 
                {echo $_SESSION['email'];} ?>" size="35" />
            <input type="submit" value="Login" />
        </form>

</main>
<?php include '../view/footer.php'; ?>