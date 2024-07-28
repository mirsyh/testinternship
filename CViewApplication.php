<?php include_once 'CHeader.php'; ?>
<?php

$user_id = $_SESSION['user']['user_id'];
$sql_company = "SELECT * FROM `companies` WHERE `company_user_id` = '$user_id'";
$result_company = mysqli_query($conn, $sql_company);
if ($result_company->num_rows > 0) {
    $company = $result_company->fetch_assoc();

    $company_id = $company['company_id'];
    $sql = "SELECT * FROM `student_internships` 
                JOIN `internships` ON `student_internships`.`internship_id` = `internships`.`internship_id` 
                JOIN `students` ON `student_internships`.`student_id` = `students`.`student_id`
                JOIN `companies` ON `internships`.`internship_company_id` = `companies`.`company_id`
                    WHERE `internships`.`internship_company_id` = $company_id";
    $result = $conn->query($sql);
}


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

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #e0e0e0;
        border-radius: 5px;
    }

    .form-group textarea {
        resize: vertical;
    }

    .btn {
        display: inline-block;
        padding: 10px 15px;
        color: #ffffff;
        text-align: center;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
        cursor: pointer;
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

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
                                <th>Company Name</th>
                                <th>Internship Title</th>
                                <th>Resume</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($result->num_rows > 0) : ?>
                                <?php foreach ($result as $key => $row) : ?>
                                    <tr>
                                        <td><?= $row["company_name"] ?></td>
                                        <td><?= $row["internship_title"] ?></td>
                                        <td><a href="documents/<?= $row["student_internship_resume"] ?>" target="_blank">View Resume</a></td>
                                        <td><?= strtoupper($row["student_internship_status"]) ?></td>
                                        <td>
                                            <a href="CUpdateApplication.php?id=<?= $row['student_internship_id'] ?>" class="btn btn-primary">Edit</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
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