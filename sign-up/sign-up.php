<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="./styles.css">
</head>

<body>
    <h1>Đăng ký thành viên</h1>
    <form id="registration-form" action="sign-up_submit.php" method="POST" onsubmit="submitForm(event)">
        <!--  -->
        <label for="username">Tên đăng nhập</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Mật khẩu</label>
        <input type="password" id="password" name="password" required>
        <label for="password">Nhập lại mật khẩu</label>
        <input type="password" id="repassword" name="repassword" required>
        <label for="student-id">Mã sinh viên:</label>
        <input type="text" id="student_id" name="student_id" required>
        <label for="full-name">Họ và tên:</label>
        <input type="text" id="full_name" name="full_name" required>
        <label for="date-of-birth">Ngày sinh:</label>
        <input type="date" id="birthday" style="font-size: 20px;" name="birthday" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <label>Giới tính:</label>
        <fieldset id="gender-form">
            <input type="radio" id="gender-male" name="gender" value="Male" required>
            <label for="gender-male">Nam</label>
            <input type="radio" id="gender-female" name="gender" value="Female" required>
            <label for="gender-female">Nữ</label>
            <input type="radio" id="gender-other" name="gender" value="Other" required>
            <label for="gender-other">Khác</label>
        </fieldset>
        <br>
        <label for="nationality">Quốc tịch:</label>
        <select id="nationality" name="nationality" required>
            <option value="" disabled selected>Chọn quốc tịch</option>
            <option value="vn">Việt Nam</option>
            <option value="us">United States</option>
            <option value="jp">Nhật Bản</option>
            <option value="kr">Hàn Quốc</option>
            <option value="cn">Trung Quốc</option>
        </select>


        <div class="btn">
            <button type="submit" name="submit" id="btn-submit">Đăng ký</button>
            <button type="reset" id="btn-reset">Reset</button>
        </div>

    </form>
</body>

</html>