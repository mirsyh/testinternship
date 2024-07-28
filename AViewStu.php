<?php
include_once "AHeader.php";

$sql = "SELECT * FROM `students` JOIN `users` ON `students`.`student_id` = `users`.`user_id`";
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

    .a {
        display: inline-block;
        padding: 10px 15px;
        color: #ffffff;
        text-align: center;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
        cursor: pointer;
    }

    .a-primary {
        background-color: #007bff;
        border: none;
    }

    .a-primary:hover {
        background-color: #0056b3;
    }
</style>

<h3 style='text-align:center'>List of Students</h3><br>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Program</th>
        <th>CGPA</th>
        <th>Contact Number</th>
        <th>Supervisor Name</th>
    </tr>
    <?php foreach ($result as $key => $row) : ?>
        <tr>
            <td><?= $row["student_id"] ?></td>
            <td><?= $row["student_name"] ?></td>
            <td><?= $row["student_program"] ?></td>
            <td><?= $row["student_cgpa"] ?></td>
            <td><?= $row["student_contact"] ?></td>
            <td>
                <?php if ($row["student_supervisor_id"]) : ?>
                    <?php
                    $sql = "SELECT * FROM `supervisors` JOIN `users` ON `supervisors`.`supervisor_id` = `users`.`user_id` WHERE `supervisors`.`supervisor_id` = " . $row["student_supervisor_id"];
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $supervisor = $result->fetch_assoc();
                        echo $supervisor["supervisor_name"];
                    } else {
                        echo "No Supervisor Assigned";
                    }
                    ?>
                <?php else : ?>
                    <a href="AAssignSv.php?student_id=<?= $row["student_id"] ?>">Supervisor</a>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php include_once "footer.php"; ?>