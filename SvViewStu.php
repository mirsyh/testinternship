<?php
include_once 'SvHeader.php';

$user_id = $_SESSION['user']['user_id'];
$sql_supervisor = "SELECT * FROM `supervisors` WHERE `supervisor_user_id` = '$user_id'";
$result_supervisor = $conn->query($sql_supervisor);
if ($result_supervisor->num_rows == 0) {
    redirect('SvProfile.php');
}
$supervisor = $result_supervisor->fetch_assoc();
$supervisor_id = $supervisor['supervisor_id'];
$sql = "SELECT * FROM `students` JOIN `users` ON `students`.`student_user_id` = `users`.`user_id` WHERE `students`.`student_supervisor_id` = '$supervisor_id'";
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

<h3 style='text-align:center'>List of Students under <?= $supervisor['supervisor_name'] ?></h3><br>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Program</th>
        <th>CGPA</th>
        <th>Email</th>
        <th>Contact Number</th>
    </tr>
    <?php if ($result->num_rows > 0) : ?>
        <?php foreach ($result as $key => $row) : ?>
            <tr>
                <td><?= $row["student_id"] ?></td>
                <td><?= $row["student_name"] ?></td>
                <td><?= $row["student_program"] ?></td>
                <td><?= $row["student_cgpa"] ?></td>
                <td><?= $row["user_email"] ?></td>
                <td><?= $row["student_contact"] ?></td>
            </tr>
        <?php endforeach; ?>
    <?php else : ?>
        <tr>
            <td colspan="6">No students found</td>
        </tr>
    <?php endif; ?>
</table>

<?php include_once 'footer.php'; ?>