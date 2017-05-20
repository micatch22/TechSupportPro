<?php include'view/header.php'; 

/****************************************************
 * Date: 4/28/2017                                  *
 * Authors: Chantal Dale & Michelle Pierce          *
 * Class: CIS 4100                                  *
 * Project: 20-1                                    *
 ****************************************************/
?>
<main>
    <nav>    
    <h2>Administrators</h2>
    <ul>
        <li><a href="product_manager">Manage Products</a></li>
        <li><a href="technician_manager">Manage Technicians</a></li>
        <li><a href="customer_manager">Manage Customers</a></li>
        <li><a href="incident_create">Create Incident</a></li>
        <li><a href="incident_assign">Assign Incident</a></li>
        <li><a href="incident_display">Display Incidents</a></li>
    </ul>

    <h2>Technicians</h2>
    <ul>
        <li><a href="incident_update">Update Incident</a></li>
    </ul>

    <h2>Customers</h2>
    <ul>
        <li><a href="product_register">Register Product</a></li>
    </ul>
    </nav>
</main>
<?php include 'view/footer.php'; ?>