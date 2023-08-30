<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Thông Tin Tài Khoản</title>
</head>

<body>
    <div class="container">
        <h1>Thông Tin Tài Khoản</h1>
        <?php
        include '../config.php';
        session_start();

        if (!isset($_SESSION['user'])) {
            header('Location: login.php');
            exit();
        }

        $username = $_SESSION['user'];
        $sql = "SELECT id, username, password, student_id, full_name, email, birthday, gender, nationality FROM users WHERE username = '$username'";

        $result = mysqli_query($connect, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $birthday = $row['birthday'];
            $newBirthday = date('d-m-Y', strtotime($birthday));
        ?>
            <div class="info-item">
                <span class="info-label">Tên đăng nhập:</span>
                <span class="info-value"><?php echo $row['username']; ?></span>
            </div>
            <!-- <div class="info-item">
                <span class="info-label">Mật khẩu:</span>
                <span class="info-value password"><?php echo $row['password']; ?></span>
            </div> -->
            <div class="info-item">
                <span class="info-label">Mã sinh viên:</span>
                <span class="info-value"><?php echo $row['student_id']; ?></span>
            </div>
            <div class="info-item">
                <span class="info-label">Họ và tên:</span>
                <span class="info-value"><?php echo $row['full_name']; ?></span>
            </div>
            <div class="info-item">
                <span class="info-label">Email:</span>
                <span class="info-value"><?php echo $row['email']; ?></span>
            </div>
            <div class="info-item">
                <span class="info-label">Ngày sinh:</span>
                <span class="info-value"><?php echo $newBirthday; ?></span>
            </div>
            <div class="info-item">
                <span class="info-label">Giới tính:</span>
                <span class="info-value"><?php echo $row['gender']; ?></span>
            </div>
            <div class="info-item">
                <span class="info-label">Quốc tịch:</span>
                <span class="info-value"><?php echo $row['nationality']; ?></span>
            </div>
            <div class="button-container">
                <button class="edit-button"><a href="../index.php"><i class="fa-solid fa-house"></i> Trang chủ</a></button>
                <button class="edit-button"><a href="">Chỉnh Sửa</a></button>

            </div>
        <?php
        } else {
            echo "Không tìm thấy thông tin tài khoản.";
        }

        ?>
    </div>
</body>

</html>