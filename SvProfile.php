<?php include_once 'SvHeader.php'; ?>

<?php
$user_id = $_SESSION['user']['user_id'];
$sql_company = "SELECT * FROM `supervisors` WHERE `supervisor_user_id` = '$user_id'";
$result_company = mysqli_query($conn, $sql_company);
if ($result_company->num_rows > 0) {
    $company = $result_company->fetch_assoc();
}

if (isset($_POST['update'])) {
    $supervisor_name = $_POST['supervisor_name'];
    $supervisor_contact = $_POST['supervisor_contact'];

    $sql = "SELECT * FROM `supervisors` WHERE `supervisor_user_id` = '$user_id'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $sql = "UPDATE `supervisors` SET `supervisor_name` = '$supervisor_name', `supervisor_contact` = '$supervisor_contact' WHERE `supervisor_user_id` = '$user_id'";
    } else {
        $sql = "INSERT INTO `supervisors` (`supervisor_name`, `supervisor_contact`, `supervisor_user_id`) VALUES ('$supervisor_name', '$supervisor_contact', '$user_id')";
    }

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Supervisor profile updated successfully')</script>";
        redirect('SvProfile.php');
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "')</script>";
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
</style>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Supervisor Profile
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="supervisor_name">Name</label>
                            <input type="text" name="supervisor_name" id="supervisor_name" value="<?php echo $company['supervisor_name']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="supervisor_contact">Contact</label>
                            <input type="text" name="supervisor_contact" id="supervisor_contact" value="<?php echo $company['supervisor_contact']; ?>" required>
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