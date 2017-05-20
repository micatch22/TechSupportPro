<?php include '../view/header.php'; 
/****************************************************
 * Date: 4/28/2017                                  *
 * Authors: Chantal Dale & Michelle Pierce          *
 * Class: CIS 4100                                  *
 * Project 3                                        *
 ****************************************************/
?>
<main>
    <h2>Select Technician</h2>
        <table>
            <tr>
                <th>Name</th>
                <th>Open Incidents</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($technicians as $t) : ?>
            <tr>
                <td><?php echo $t['firstName'] . ' ' . $t['lastName']; ?></td>
                <td><?php echo $t['openIncidentCount']; ?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action" value="select_technician" />
                    <input type="hidden" name="technician_id"
                           value="<?php echo $t['techID']; ?>" />
                    <input type="submit" value="Select" />
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>

</main>
<?php include '../view/footer.php'; ?>