<?php include '../view/header.php' 
/****************************************************
 * Date: 4/28/2017                                  *
 * Authors: Chantal Dale & Michelle Pierce          *
 * Class: CIS 4100                                  *
 * Project: 20-1                                    *
 ****************************************************/
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css"
        href="../main.css" />
    </head>
    
    <main>
    <h2>Customer Search</h2>
    
        <form action="index.php" method="post">
            <input type="hidden" name="action" value="search_customers" />
            <label>Last Name:</label>
            <input type="text" name="last_name" value="<?php if (isset($last_name))
                                                {echo $last_name;} ?>" />
            <input type="submit" value="Search" />
        </form>
    
    <h2>Add a new customer</h2>
        <form action="index.php" method="post">
            <input type="hidden" name="action" value="display_add" />
            <input type="submit" value="Add Customer" />
        </form>
    </main>
</html>
<?php require_once '../view/footer.php'?>
        
    