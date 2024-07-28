<?php include_once 'CHeader.php'; ?>

<?php
$user_id = $_SESSION['user']['user_id'];
$sql_company = "SELECT * FROM `companies` WHERE company_user_id = $user_id";
$result_company = $conn->query($sql_company);
if ($result_company->num_rows == 0) {
    redirect('CProfile.php');
}
$company = $result_company->fetch_assoc();
$company_id = $company['company_id'];

$sql = "SELECT * FROM `internships` WHERE `internship_company_id` = $company_id";
$result = $conn->query($sql);


if (isset($_POST['add'])) {
    $internship_title = $_POST['internship_title'];
    $internship_description = $_POST['internship_description'];
    $internship_responsibility = $_POST['internship_responsibility'];
    $internship_qualification = $_POST['internship_qualification'];
    $internship_allowance = $_POST['internship_allowance'];
    $internship_location = $_POST['internship_location'];
    $internship_deadline = $_POST['internship_deadline'];

    $sql = "INSERT INTO `internships` (`internship_title`, `internship_description`, `internship_responsibility`, `internship_qualification`, `internship_allowance`, `internship_location`, `internship_company_id`, `internship_deadline`) VALUES ('$internship_title', '$internship_description', '$internship_responsibility', '$internship_qualification', $internship_allowance, '$internship_location', $company_id, '$internship_deadline')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Internship added successfully')</script>";
        redirect('CJobList.php');
    } else {
        echo "<script>alert('Error: " . $conn->error . "')</script>";
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

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
    }

    .form-group input,
    .form-group textarea {
        width: 98%;
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
</style>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Add Internship
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="internship_title">Internship Title</label>
                            <input type="text" name="internship_title" id="internship_title" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="internship_description">Internship Description</label>
                            <textarea name="internship_description" id="internship_description" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="internship_responsibility">Internship Responsibility</label>
                            <textarea name="internship_responsibility" id="internship_responsibility" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="internship_qualification">Internship Qualification</label>
                            <textarea name="internship_qualification" id="internship_qualification" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="internship_allowance">Internship Allowance</label>
                            <input type="number" name="internship_allowance" id="internship_allowance" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="internship_location">Internship Location</label>
                            <input type="text" name="internship_location" id="internship_location" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="internship_deadline">Internship Deadline</label>
                            <input type="date" name="internship_deadline" id="internship_deadline" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="add" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once 'footer.php'; ?>