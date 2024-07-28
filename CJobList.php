<?php include_once 'CHeader.php'; ?>

<?php
$user_id = $_SESSION['user']['user_id'];
$sql_company = "SELECT * FROM `companies` WHERE company_user_id = $user_id";
$result_company = $conn->query($sql_company);
if ($result_company->num_rows == 0) {
    redirect('company-profile.php');
}
$company = $result_company->fetch_assoc();
$company_id = $company['company_id'];

$sql = "SELECT * FROM `internships` WHERE `internship_company_id` = $company_id";
$result = $conn->query($sql);

if (isset($_GET['delete'])) {
    $internship_id = $_GET['delete'];

    try {
        $sql = "DELETE FROM `internships` WHERE `internship_id` = $internship_id";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Internship deleted successfully')</script>";
            redirect('CJobList.php');
        } else {
            echo "<script>alert('Error: " . $conn->error . "')</script>";
        }
    } catch (Exception $e) {
        echo "<script>alert('Error: " . $e->getMessage() . "')</script>";
    }
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

    .table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
    }

    .table th,
    .table td {
        padding: 10px;
        border: 1px solid #e0e0e0;
        text-align: left;
    }

    .table th {
        background-color: #f8f9fa;
        font-weight: bold;
    }

    .btn {
        display: inline-block;
        padding: 10px 15px;
        color: #ffffff;
        text-align: center;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .btn-danger {
        background-color: #dc3545;
        border: none;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Internship List
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Allowance</th>
                                <th>Location</th>
                                <th>Deadline</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($result->num_rows > 0) : ?>
                                <?php while ($row = $result->fetch_assoc()) : ?>
                                    <tr>
                                        <td><?= $row['internship_title'] ?></td>
                                        <td><?= $row['internship_allowance'] ?></td>
                                        <td><?= $row['internship_location'] ?></td>
                                        <td><?= date('d M Y', strtotime($row['internship_deadline'])) ?></td>
                                        <td>
                                            <a href="#CJobList.php?delete=<?= $row['internship_id'] ?>" class="btn btn-danger" onclick="deleteInternship(<?= $row['internship_id'] ?>)">Delete</a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="8">No internship available</td>
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
<script>
    function deleteInternship(internship_id) {
        if (confirm('Are you sure you want to delete this internship?')) {
            window.location.href = `CJobList.php?delete=${internship_id}`;
        }
    }
</script>