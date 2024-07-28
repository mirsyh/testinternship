<?php include_once 'CHeader.php'; ?>

<?php

$user_id = $_SESSION['user']['user_id'];
$sql_company = "SELECT * FROM `companies` WHERE `company_user_id` = '$user_id'";
$result_company = mysqli_query($conn, $sql_company);
if ($result_company->num_rows > 0) {
    $company = $result_company->fetch_assoc();
}

if (isset($_POST['update'])) {
    $company_name = $_POST['company_name'];
    $company_email = $_POST['company_email'];
    $company_contactnum = $_POST['company_contactnum'];
    $company_address = $_POST['company_address'];

    $sql = "SELECT * FROM `companies` WHERE `company_user_id` = '$user_id'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $sql = "UPDATE `companies` SET `company_name` = '$company_name', `company_email` = '$company_email', `company_contact` = '$company_contactnum', `company_address` = '$company_address' WHERE `company_user_id` = '$user_id'";
    } else {
        $sql = "INSERT INTO `companies` (`company_name`, `company_email`, `company_contact`, `company_address`, `company_user_id`) VALUES ('$company_name', '$company_email', '$company_contactnum', '$company_address', '$user_id')";
    }

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Company profile updated successfully')</script>";
        redirect('CProfile.php');
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
                    Company Profile
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="company_name">Company Name</label>
                            <input type="text" name="company_name" id="company_name" class="form-control" value="<?= $company['company_name'] ?? '' ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="company_email">Company Email</label>
                            <input type="email" name="company_email" id="company_email" class="form-control" value="<?= $company['company_email'] ?? '' ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="company_contactnum">Company Contact Number</label>
                            <input type="text" name="company_contactnum" id="company_contactnum" class="form-control" value="<?= $company['company_contact'] ?? '' ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="company_address">Company Address</label>
                            <textarea name="company_address" id="company_address" class="form-control" required><?= $company['company_address'] ?? '' ?></textarea>
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