<?php include_once 'StuHeader.php'; ?>
<?php
$user_id = $_SESSION['user']['user_id'];
$sql_student = "SELECT * FROM `students` WHERE `student_user_id` = '$user_id'";

$result_student = $conn->query($sql_student);
if ($result_student->num_rows > 0) {
    $student = $result_student->fetch_assoc();
}

if (isset($_POST['update'])) {
    $student_name = $_POST['student_name'];
    $student_address = $_POST['student_address'];
    $student_program = $_POST['student_program'];
    $student_cgpa = $_POST['student_cgpa'];
    $student_contact = $_POST['student_contact'];

    $sql = "SELECT * FROM `students` WHERE `student_user_id` = '$user_id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $sql = "UPDATE `students` SET `student_name` = '$student_name', `student_address` = '$student_address', `student_program` = '$student_program', `student_cgpa` = '$student_cgpa', `student_contact` = '$student_contact' WHERE `student_user_id` = '$user_id'";
    } else {
        $sql = "INSERT INTO `students` (`student_name`, `student_address`, `student_program`, `student_cgpa`, `student_contact`, `student_user_id`) VALUES ('$student_name', '$student_address', '$student_program', '$student_cgpa', '$student_contact', '$user_id')";
    }

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Student profile updated successfully')</script>";
        redirect('StuProfile.php');
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
        display: flex;
        align-items: center;
        margin-bottom: 15px;
        flex-wrap: wrap;
    }

    .form-group label {
        flex: 1;
        margin-bottom: 0;
    }

    .form-group input,
    .form-group textarea {
        flex: 2;
        padding: 10px;
        border: 1px solid #e0e0e0;
        border-radius: 5px;
        width: 100%;
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

    .form-group select {
        flex: 2;
        padding: 10px;
        border: 1px solid #e0e0e0;
        border-radius: 5px;
        width: 100%;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Student Profile
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="student_name">Student Name</label>
                            <input type="text" name="student_name" id="student_name" class="form-control" value="<?= $student['student_name'] ?? '' ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="student_address">Student Address</label>
                            <textarea name="student_address" id="student_address" class="form-control" required><?= $student['student_address'] ?? '' ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="student_program">Student Program</label>
                            <input type="text" name="student_program" id="student_program" class="form-control" value="<?= $student['student_program'] ?? '' ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="student_cgpa">Student CGPA</label>
                            <input type="text" name="student_cgpa" id="student_cgpa" class="form-control" value="<?= $student['student_cgpa'] ?? '' ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="student_contact">Student Contact Number</label>
                            <input type="text" name="student_contact" id="student_contact" class="form-control" value="<?= $student['student_contact'] ?? '' ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="student_supervisor_id">Student Supervisor</label>
                            <select name="student_supervisor_id" id="student_supervisor_id" class="form-control" disabled style="color: #000;">
                                <option value="">No Supervisor</option>
                                <?php
                                $sql_supervisor = "SELECT * FROM `supervisors`";
                                $result_supervisor = $conn->query($sql_supervisor);
                                if ($result_supervisor->num_rows > 0) {
                                    while ($supervisor = $result_supervisor->fetch_assoc()) {
                                        $selected = '';
                                        if ($student['student_supervisor_id'] == $supervisor['supervisor_id']) {
                                            $selected = 'selected';
                                        }
                                        echo "<option value='" . $supervisor['supervisor_id'] . "' $selected>" . $supervisor['supervisor_name'] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="update" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once 'footer.php'; ?>