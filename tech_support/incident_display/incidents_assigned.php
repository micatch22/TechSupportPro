<?php include '../view/header.php'; 
/****************************************************
 * Date: 4/28/2017                                  *
 * Authors: Chantal Dale & Michelle Pierce          *
 * Class: CIS 4100                                  *
 * Project 3                                        *
 ****************************************************/
?>
<main>
    <h2>Assigned Incidents</h2>
    <p><a href="?action=display_unassigned">View Unassigned Incidents</a></p>
        <table>
            <tr>
                <th>Customer</th>
                <th>Product</th>
                <th>Technician</th>
                <th>Incident</th>
            </tr>
            <?php foreach ($incidents as $i) :
                $ts = strtotime($i['dateOpened']);
                $date_opened = date('n/j/Y', $ts);

                if (isset($i['dateClosed'])) {
                    $ts = strtotime($i['dateClosed']);
                    $date_closed = date('n/j/Y', $ts);
                } else {
                    $date_closed = 'OPEN';
                }
            ?>
            <tr>
                <td>
                    <?php echo $i['customerFirstName'] . ' ' . $i['customerLastName']; ?>
                </td>
                <td>
                    <?php echo $i['productName']; ?>
                </td>
                <td>
                    <?php echo $i['techFirstName'] . ' ' . $i['techLastName']; ?>
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
                            <td>Closed:</td>
                            <td><?php echo $date_closed; ?></td>
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