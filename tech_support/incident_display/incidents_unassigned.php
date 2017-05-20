<?php include '../view/header.php'; 
/****************************************************
 * Date: 4/28/2017                                  *
 * Authors: Chantal Dale & Michelle Pierce          *
 * Class: CIS 4100                                  *
 * Project 3                                        *
 ****************************************************/
?>
<main>
    <h2>Unassigned Incidents</h2>
    <p><a href="?action=display_assigned">View Assigned Incidents</a></p>
        <table>
            <tr>
                <th>Customer</th>
                <th>Product</th>
                <th>Incident</th>
            </tr>
            <?php foreach ($incidents as $i) :
                $ts = strtotime($i['dateOpened']);
                $date_opened = date('n/j/Y', $ts);
            ?>
            <tr>
                <td>
                    <?php echo $i['firstName'] . ' ' . $i['lastName']; ?>
                </td>
                <td>
                    <?php echo $i['productName']; ?>
                </td>
                <td>
                    <table id="no_border">
                        <tr>
                            <td>ID:</td>
                            <td><?php echo $i['incidentID']; ?></td>
                        </tr>
                        <tr>
                            <td>Opened:</td>
                            <td><?php echo $date_opened; ?></td>
                        </tr>
                        <tr>
                            <td>Title:</td>
                            <td><?php echo $i['title']; ?></td>
                        </tr>
                        <tr>
                            <td>Description:</td>
                            <td><?php echo $i['description']; ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
   </main>
<?php include '../view/footer.php'; ?>