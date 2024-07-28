<?php require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $useremail = $_POST['useremail'];
    $username = $_POST['username'];
    $userpassword = $_POST['userpassword'];
    $repeatpassword = $_POST['userpassword'];
    $userrole = $_POST['userrole'];

    if ($userpassword !== $repeatpassword) {
        echo "<script>alert('Passwords do not match. Please enter again.')</script>";
    } else {
        $hashedpassword = password_hash($userpassword, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO `users` (user_email, user_username, user_password, user_role) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $useremail, $username, $hashedpassword, $userrole);

        if ($stmt->execute()) {
            echo '<script>alert("Sign Up Successful")</script>';
            redirect('index.php');
            exit();
        } else {
            echo '<script>alert("Please try again")</script>' . $stmt . "<br>" . $conn->error;
        }
        $stmt->close();
        $conn->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="signup.css">
</head>

<body>
    <br><br><br><br>
    <div class="signup-container">
        <p><img src="uitmlogo.png" alt="UiTM Logo" style="width:150px" class="center"></p>
        <br>
        <h3>Internship Management System</h3>
        <br>
        <form action="SignUp.php" method="post">
            <input type="text" id="useremail" name="useremail" placeholder="Enter Email" required><br>
            <input type="text" id="username" name="username" placeholder="Enter Username" required><br>
            <input type="password" id="userpassword" name="userpassword" placeholder="Enter Password" required><br>
            <input type="password" id="repeatpassword" name="repeatpassword" placeholder="Reenter Password" required><br><br>
            <label>Role:</label><br><br>
            <input type="radio" id="student" name="userrole" value="student" required>
            <label for="student">Student</label>
            <input type="radio" id="supervisor" name="userrole" value="supervisor" required>
            <label for="supervisor">Supervisor</label>
            <input type="radio" id="company" name="userrole" value="company" required>
            <label for="company">Company</label><br><br>
            <input type="submit" value="Sign Up" a href="Login.php">
        </form>
    </div>
</body>

</html>