<?php include_once 'AHeader.php'; ?>

<?php if (isset($_GET['student_id'])) {
    $student_id = $_GET['student_id'];
    $sql = "SELECT * FROM `students` JOIN `users` ON `students`.`student_user_id` = `users`.`user_id` WHERE `students`.`student_id` = $student_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $student = $result->fetch_assoc();

        if (isset($_POST['update'])) {
            $supervisor_id = $_POST['supervisor_id'];
            $sql = "UPDATE `students` SET `student_supervisor_id` = $supervisor_id WHERE `student_id` = $student_id";
            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Supervisor assigned successfully')</script>";
                redirect('AViewStu.php');
            } else {
                echo "<script>alert('Error: " . $conn->error . "')</script>";
            }
        }
    } else {
        echo "<script>alert('Student not found')</script>";
        redirect('AViewStu.php');
    }
} else {
    redirect('AViewStu.php');
}
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

    select {
        width: 100%;
        padding: 10px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #f1f1f1;
    }

    select:focus {
        background-color: #ddd;
        outline: none;
    }

    .container {
        margin: auto;
        width: 50%;
        padding: 10px;
    }

    button {
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
    }
</style>
<div class="container">
    <h3 style='text-align:center'>Assign Supervisor to <?= $student["student_name"] ?></h3><br>
    <form action="" method="post">

        <table>
            <tr>
                <th>ID</th>
                <td><?= $student["student_id"] ?></td>
            </tr>
            <tr>
                <th>Name</th>
                <td><?= $student["student_name"] ?></td>
            </tr>
            <tr>
                <th>Program</th>
                <td><?= $student["student_program"] ?></td>
            </tr>
            <tr>
                <th>CGPA</th>
                <td><?= $student["student_cgpa"] ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?= $student["user_email"] ?></td>
            </tr>
            <tr>
                <th>Contact Number</th>
                <td><?= $student["student_contact"] ?></td>
            </tr>
            <tr>
                <th>Supervisor Name</th>
                <td>
                    <select name="supervisor_id" id="supervisor_id" class="form-control">
                        <option value="">Select Supervisor</option>
                        <?php
                        $sql = "SELECT * FROM `supervisors` JOIN `users` ON `supervisors`.`supervisor_user_id` = `users`.`user_id`";
                        $result = $conn->query($sql);
                        foreach ($result as $row) : ?>
                            <option value="<?= $row['supervisor_id'] ?>" <?= $student['student_supervisor_id'] == $row['supervisor_id'] ? 'selected' : '' ?>><?= $row['supervisor_name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
        </table>
        <br>
        <!-- button update -->
        <button type="submit" name="update" class="btn btn-primary">Update</button>

    </form>

</div>


<?php include_once 'footer.php'; ?>