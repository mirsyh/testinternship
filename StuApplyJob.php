<?php
include_once 'StuHeader.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM `internships` JOIN `companies` ON internships.internship_company_id  = companies.company_id WHERE `internship_id` = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $jobtitle = $row["internship_title"];
            $jobdesc = $row["internship_description"];
            $joballowance = $row["internship_allowance"];
            $joblocation = $row["internship_location"];
            $compname = $row["company_name"];
            $compemail = $row["company_email"];
            $compcontactnum = $row["company_contact"];
            $deadline = $row["internship_deadline"];
        }

        if (isset($_POST['apply'])) {
            $user_id = $_SESSION['user']['user_id'];
            $sql_student = "SELECT * FROM `students` WHERE `student_user_id` = $user_id";
            $result_student = $conn->query($sql_student);
            if ($result_student->num_rows > 0) {
                $student = $result_student->fetch_assoc();
                $student_id = $student['student_id'];
            } else {
                echo "<script>alert('Please complete your profile first.');</script>";
                redirect('StuProfile.php');
            }
            $resume = $_FILES['resume']['name'];
            $target_dir = "documents/";
            $target_file = $target_dir . basename($_FILES["resume"]["name"]);
            $uploadOk = 1;
            $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            if ($_FILES["resume"]["size"] > 2000000) {
                echo "<script>alert('Sorry, your file is too large.');</script>";
                $uploadOk = 0;
            }

            if ($fileType != "pdf") {
                echo "<script>alert('Sorry, only PDF files are allowed.');</script>";
                $uploadOk = 0;
            }

            if ($uploadOk == 0) {
                echo "<script>alert('Sorry, your file was not uploaded.');</script>";
            } else {
                $newfilename = uniqid() . '.' . $fileType;
                if (move_uploaded_file($_FILES["resume"]["tmp_name"], $target_dir . $newfilename)) {
                    $sql = "SELECT * FROM `student_internships` WHERE `student_id` = $student_id AND `internship_id` = $id";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        echo "<script>alert('You have already applied for this job.');</script>";
                    } else {
                        $sql = "INSERT INTO `student_internships` (`student_id`, `internship_id`, `student_internship_resume`, `student_internship_status`) VALUES ($student_id, $id, '$newfilename', 'applied')";
                        if ($conn->query($sql) === TRUE) {
                            echo "<script>alert('Job application submitted successfully.');</script>";
                            redirect('StuHome.php');
                        } else {
                            echo "<script>alert('Error: " . $conn->error . "');</script>";
                        }
                    }
                } else {
                    echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
                }
            }
        }
    }
} else {
    echo "<script>alert('No internship available at the moment.');</script>";
    redirect('StuHome.php');
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
</style>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3>Apply for Job</h3>
                </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="jobtitle">Job Title</label>
                            <input type="text" name="jobtitle" id="jobtitle" class="form-control" value="<?php echo $jobtitle; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="jobdesc">Job Description</label>
                            <textarea rows="6" name="jobdesc" id="jobdesc" class="form-control" readonly><?php echo nl2br(htmlspecialchars($jobdesc)); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="joballowance">Job Allowance</label>
                            <input type="text" name="joballowance" id="joballowance" class="form-control" value="<?php echo $joballowance; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="joblocation">Job Location</label>
                            <input type="text" name="joblocation" id="joblocation" class="form-control" value="<?php echo $joblocation; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="compname">Company Name</label>
                            <input type="text" name="compname" id="compname" class="form-control" value="<?php echo $compname; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="compemail">Company Email</label>
                            <input type="email" name="compemail" id="compemail" class="form-control" value="<?php echo $compemail; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="compcontactnum">Company Contact Number</label>
                            <input type="text" name="compcontactnum" id="compcontactnum" class="form-control" value="<?php echo $compcontactnum; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="deadline">Deadline</label>
                            <input type="text" name="deadline" id="deadline" class="form-control" value="<?php echo $deadline; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="resume">Upload Resume</label>
                            <input type="file" name="resume" id="resume" class="form-control" required accept=".pdf">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="apply" class="btn btn-primary">Apply</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once 'footer.php'; ?>