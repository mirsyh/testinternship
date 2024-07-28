<?php include_once 'CHeader.php'; ?>
<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM `student_internships` 
                JOIN `internships` ON `student_internships`.`internship_id` = `internships`.`internship_id` 
                JOIN `students` ON `student_internships`.`student_id` = `students`.`student_id`
                JOIN `companies` ON `internships`.`internship_company_id` = `companies`.`company_id`
                    WHERE `student_internships`.`student_internship_id` = $id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $student_internship = $result->fetch_assoc();
    }

    if (isset($_POST['status'])) {
        $status = $_POST['status'];
        $sql = "UPDATE `student_internships` SET `student_internship_status` = '$status' WHERE `student_internship_id` = $id";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Application updated successfully')</script>";
            redirect('CViewApplication.php');
        } else {
            echo "<script>alert('Error: " . $conn->error . "')</script>";
        }
    }
} else {
    redirect('CViewApplication.php');
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

    .form-group select {
        width: 100%;
        padding: 10px;
        border: 1px solid #e0e0e0;
        border-radius: 5px;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Application Edit
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="student_internship_id" value="<?php echo $student_internship['student_internship_id']; ?>">
                        <div class="form-group">
                            <label for="student_name">Student Name</label>
                            <input type="text" name="student_name" id="student_name" class="form-control" value="<?php echo $student_internship['student_name']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="internship_title">Internship Title</label>
                            <input type="text" name="internship_title" id="internship_title" class="form-control" value="<?php echo $student_internship['internship_title']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="resume">Resume</label>
                            <a href="documents/<?php echo $student_internship['student_internship_resume']; ?>" target="_blank">View CV</a>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="applied" <?php echo $student_internship['student_internship_status'] == 'applied' ? 'selected' : ''; ?>>Applied</option>
                                <option value="accepted" <?php echo $student_internship['student_internship_status'] == 'accepted' ? 'selected' : ''; ?>>Accepted</option>
                                <option value="rejected" <?php echo $student_internship['student_internship_status'] == 'rejected' ? 'selected' : ''; ?>>Rejected</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once 'footer.php'; ?>