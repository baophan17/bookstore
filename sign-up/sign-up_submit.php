<?php
include '../config.php';

if (isset($_POST['submit']) && $_POST["username"] != '' && $_POST["password"] != '' && $_POST["repassword"] != '' && $_POST["repassword"] != '') {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $repassword = $_POST["repassword"];
    $student_id = $_POST["student_id"];
    $full_name = $_POST["full_name"];
    $birthday = $_POST["birthday"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];
    $nationality = $_POST["nationality"];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $old = mysqli_query($connect, $sql);
    $password = md5($password);
    $repassword = md5($repassword);
    if (mysqli_num_rows($old) > 0) {
        echo '<script>alert("Tên đăng nhập đã tồn tại!");</script>';
        header("refresh:1; url=sign-up.php");
        exit();
    } else {
        if ($password != $repassword) {
            echo '<script>alert("Mật khẩu và mật khẩu xác nhận không trùng khớp!");</script>';
            header("refresh:1; url='sign-up.php'");
        } else {
            $sql = "INSERT INTO users (student_id, username, full_name, password, email, birthday, gender, nationality) VALUES ('$student_id', '$username', '$full_name', '$password', '$email', '$birthday', '$gender', '$nationality') ";
            mysqli_query($connect, $sql);
            echo '<script>alert("Đăng ký thành công!");</script>';
            header("refresh:1; url='../login/login.php'");
            exit();
        }
    }
} else {
    header("location:sign-up.php");
}
