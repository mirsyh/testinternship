<?php
include_once 'SvHeader.php';
$sql = "SELECT * FROM `companies` JOIN `users` ON companies.company_user_id = users.user_id";
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
        padding: 3px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>

<h3 style='text-align:center'>List of Companies</h3><br>


<table>
    <tr>
        <th>Name</th>
        <th>Address</th>
        <th>Email</th>
        <th>Contact Number</th>
    </tr>

    <?php if ($result->num_rows > 0) : ?>
        <?php foreach ($result as $key => $row) : ?>
            <tr>
                <td><?= $row["company_name"] ?></td>
                <td><?= $row["company_address"] ?></td>
                <td><?= $row["user_email"] ?></td>
                <td><?= $row["company_contact"] ?></td>
            </tr>
        <?php endforeach; ?>
    <?php else : ?>
        <tr>
            <td colspan="4">No companies found</td>
        </tr>
    <?php endif; ?>
</table>

<?php include_once 'footer.php'; ?>