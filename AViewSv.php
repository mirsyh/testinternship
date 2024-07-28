<?php include_once 'AHeader.php'; ?>
<?php
$sql = "SELECT * FROM `supervisors` JOIN `users` ON supervisors.supervisor_id = users.user_id";
$result = $conn->query($sql);
?>
<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;

    }

    td {
        border: 1px solid black;
        text-align: left;
        padding: 10px;
    }

    th {
        border: 1px solid black;
        text-align: center;
        padding: 5px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>

<h3 style='text-align:center'>List of Supervisors</h3><br>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Contact Number</th>
    </tr>
    <?php foreach ($result as $key => $row) : ?>
        <tr>
            <td><?= $row["supervisor_id"] ?></td>
            <td><?= $row["supervisor_name"] ?></td>
            <td><?= $row["supervisor_contact"] ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<?php include_once 'footer.php'; ?>