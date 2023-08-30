<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--styles-->
    <link href="./styles.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <title>Trang chủ - Bookstore</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

<body>
    <?php
    include './config.php';
    session_start();

    if (isset($_SESSION["user"])) {
        $username = $_SESSION['user'];
        $sql = "SELECT full_name FROM users WHERE username ='$username' LIMIT 1";
        $user = mysqli_query($connect, $sql);
        $row = mysqli_fetch_assoc($user);
        $fullname = $row['full_name'];
        $account = '<a class="btn-login" href="" style="float: right">Xin chào, ' . $fullname . '</a>';
        $logoutButton = '<a class="btn-logout" href="./logout/logout.php" style="float: right">Đăng xuất</a>';
    } else {
        $loginButton = '<a class="btn-login" href="./login/login.php" style="float: right">Đăng nhập</a>';
        $registerButton = '<a class="btn-logout" href="./sign-up/sign-up.php" style="float: right">Đăng ký</a>';
    }
    ?>
    <div class="header">
        <h1><a href="./index.php" style="text-decoration: none; color: #fff">Bookstore</a></h1>
        <p>Mua sách trực tuyến</p>
    </div>
    <div class="topnav">

        <a class="btn-home" href="index.php"><i class="fa-solid fa-house"></i> Trang chủ</a>

        <a href="hienthianh.php" class="btn-picture">Kho ảnh</a>
        <div class="search-container">
            <input type="text" placeholder="Tìm sách..." name="search" />
            <button class="btn-search" type="submit"><i class="fas fa-search"></i></button>
        </div>
        <a id="icon-button" href="#"><i class="fa-solid fa-cart-shopping"></i></a>
        <?php echo isset($loginButton) ? $loginButton : $account ?>
        <?php echo isset($registerButton) ? $registerButton : $logoutButton; ?>
    </div>
    <div class="row">
        <div class="leftcolumn content-product">
            <div>
                <img class="img-book" src="./images/1.jpg" alt="">
            </div>
            <div class="des-book" style="float: left;">
                <h2>NHÀ GIẢ KIM</h2>

                <p>
                    "Nhà Giả Kim" là một cuốn tiểu thuyết viễn tưởng của nhà văn Paulo Coelho. Cuốn sách kể về cuộc
                    hành trình của một người phụ tá tên Santiago trong việc tìm kiếm hiểu về ý nghĩa thực sự của
                    cuộc sống. Được cho là một câu chuyện về sự khám phá bản thân và tìm kiếm đích thực...
                </p>
                <h5>Tác giả: Paulo Coelho</h5>
                <button class="btn-addtocart">Thêm vào giỏ hàng</button>
                <button class="btn-buy-des">Mua ngay</button>
            </div>
        </div>
        <div class="rightcolumn">
            <div class="card">
                <h2>Giới thiệu</h2>

                <p>ĐÂY LÀ MÔN LẬP TRÌNH WEB</p>
            </div>
            <div class="card">
                <h2>Follow Me</h2>
                <ul class="icons">
                    <li>
                        <span class="icon"><i class="fa fa-facebook"></i></span>
                        <span class="titulo">Facebook</span>
                    </li>
                    <li>
                        <span class="icon"><i class="fa fa-github"></i></span>
                        <span class="titulo">Github</span>
                    </li>
                    <li>
                        <span class="icon"><i class="fa fa-whatsapp"></i></span>
                        <span class="titulo">WhatsApp</span>
                    </li>
                    <li>
                        <span class="icon"><i class="fa fa-linkedin"></i></span>
                        <span class="titulo">LinkedIn</span>
                    </li>
                    <li>
                        <span class="icon"><i class="fa fa-instagram"></i></span>
                        <span class="titulo">Instagram</span>
                    </li>
                </ul>
            </div>
            <div class="card">
                <h2>Liên hệ</h2>
                <h4>Điện thoại: <i clas s="fab fa-whatsapp-square"></i> 0987654321</h4>
                <h4>
                    Email: <i class="fa fa-envelope" aria-hidden="true"></i>
                    nguyenvandat37660@gmail.com <br>
                    baophan@gmail.com
                </h4>
            </div>
        </div>
    </div>


    <div class="footer full-width">
        <span>© 2023 Bookstore. All rights reserved.</span>
    </div>

</body>

</html>