<?php include '../view/header.php'; 
/****************************************************
 * Date: 4/28/2017                                  *
 * Authors: Chantal Dale & Michelle Pierce          *
 * Class: CIS 4100                                  *
 * Project 3                                 *
 ****************************************************/
?>
<main>
    <h1 class="top">Database Error</h1>
    <p>An error occurred while attempting to work with the database.</p>
    <p>Message: <?php echo $error_message; ?></p>
</main>
<?php include '../view/footer.php'; ?>