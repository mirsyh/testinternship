<?php
require_once 'db.php';
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    if ($user['user_role'] == 'admin') {
        redirect('AHome.php');
    } else if ($user['user_role'] == 'student') {
        redirect('StuHome.php');
    } else if ($user['user_role'] == 'company') {
        redirect('CHome.php');
    } else if ($user['user_role'] == 'supervisor') {
        redirect('SvHome.php');
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $userpassword = $_POST['userpassword'];
    $sql = "SELECT * FROM `users` WHERE `user_username` = '$username' OR `user_email` = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($userpassword, $row['user_password'])) {
            $role =  $row['user_role'];
            $role = strtolower($role);
            $_SESSION['user'] = $row;

            if ($role == 'admin') {
                redirect('AHome.php');
            } else if ($role == 'student') {
                redirect('StuHome.php');
            } else if ($role == 'company') {
                redirect('CHome.php');
            } else if ($role == 'supervisor') {
                redirect('SvHome.php');
            }
        } else {
            echo "<script>alert('Invalid username or password')</script>";
        }
    } else {
        echo "<script>alert('Invalid username or password')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        .login-container {
            width: 300px;
            margin: 0 auto;
            border: 1px solid #000;
            padding: 50px;
            border: 3px solid grey;
            border-radius: 15px;
            text-align: center;
        }

        .login-container h3 {
            font-family: "Times New Roman", Times, serif;
            text-align: center;
        }

        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 95%;
            padding: 5px;
            margin: 15px 0;
            border: 2px solid grey;
            border-radius: 12px;

        }

        .login-container input[type="submit"] {
            width: 70%;
            padding: 5px;
            margin: 15px 0;
            background-color: white;
            border: 1px solid;
        }
    </style>
</head>

<body>
    <br><br><br><br>
    <div class="login-container">
        <img src="uitmlogo.png" alt="UiTM logo" style="width:150px;">
        <br>
        <h3>Internship Management System</h3>
        <br>
        <form action="index.php" method="post">
            <input type="text" id="username" name="username" placeholder="Username" required><br>
            <input type="password" id="userpassword" name="userpassword" placeholder="Password" required><br><br>
            <input type="submit" value="Login">
        </form>
        <p>First time user? Please <a href="SignUp.php">register</a>.</p>
    </div>
</body>

</html>