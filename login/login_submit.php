<?php
include '../config.php';
session_start();
if (isset($_POST["submit"]) && $_POST["username"] != "" && $_POST["password"] != "") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $password = md5($password);
    $sql = "SELECT * FROM users WHERE username ='$username' && password = '$password' ";
    $user = mysqli_query($connect, $sql);
    if (mysqli_num_rows($user) > 0) {
        $_SESSION["user"] = $username;
        header("location: ../index.php");
    } else {
        echo '<script>alert("Tên người dùng hoặc mật khẩu không đúng. Vui lòng thử lại.");</script>';
        header("refresh:1; url='login.php'");
    }
} else {
    header("location: login.php");
}
