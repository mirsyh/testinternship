<?php include_once 'StuHeader.php'; ?>

<?php
$user_id = $_SESSION['user']['user_id'];
$sql_student = "SELECT * FROM `students` WHERE `student_user_id` = '$user_id'";
$result_student = $conn->query($sql_student);
if ($result_student->num_rows == 0) {
    redirect('StuProfile.php');
}
$student = $result_student->fetch_assoc();
$student_id = $student['student_id'];

$sql = "SELECT * FROM `student_internships` 
                JOIN `internships` ON `student_internships`.`internship_id` = `internships`.`internship_id` 
                JOIN `companies` ON `internships`.`internship_company_id` = `companies`.`company_id`
                    WHERE `student_id` = $student_id";
$result = $conn->query($sql);
?>
<style>

    .row {
        display: flex;
        flex-wrap: wrap;
        margin: -10px;
    }

    .col-12 {
        width: 100%;
        padding: 10px;
    }

    .card {
        border: 1px solid #e0e0e0;
        border-radius: 5px;
        overflow: hidden;
    }

    .card-header {
        background-color: #007bff;
        color: #ffffff;
        padding: 10px;
        font-size: 18px;
        text-align: center;
    }

    .card-body {
        padding: 20px;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
    }

    .table th,
    .table td {
        padding: 12px;
        border: 1px solid #e0e0e0;
        text-align: left;
    }

    .table th {
        background-color: #f8f9fa;
        font-weight: bold;
    }

    .table td {
        vertical-align: top;
    }

    .table td a {
        display: inline-block;
        padding: 8px 12px;
        color: #ffffff;
        text-align: center;
        text-decoration: none;
        border-radius: 5px;
        background-color: #007bff;
        transition: background-color 0.3s ease;
    }

    .table td a:hover {
        background-color: #0056b3;
    }

    .table td {
        word-break: break-word;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Application List
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Company</th>
                                <th>Internship</th>
                                <th>Status</th>
                                <th>Resume</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($result->num_rows > 0) : ?>
                                <?php while ($row = $result->fetch_assoc()) : ?>
                                    <tr>
                                        <td>
                                            <?= $row['company_name'] ?><br>
                                            <?= $row['company_address'] ?><br>
                                            <?= $row['company_contact'] ?>
                                        </td>
                                        <td><?= $row['internship_title'] ?></td>
                                        <td><?= $row['student_internship_status'] ?></td>
                                        <td>
                                            <a href="documents/<?= $row['student_internship_resume'] ?>" target="_blank">View</a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="4">No application available</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once 'footer.php'; ?>
