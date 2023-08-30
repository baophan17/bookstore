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
    <style>
        .container {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        #anh {
            border-radius: 40px;
            height: 500px;
            width: 700px;
        }

        .btn_container {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 10px;
        }

        .btn_container button {
            border: none;
            background-color: transparent;
            font-size: 20px;
            cursor: pointer;
            transition: transform 0.3s, color 0.3s;
            padding: 5px 20px;
            height: 40px;
            width: 60px;
            border-radius: 20px;
            align-items: center;
            border: 1px solid black;
        }

        .btn_container button:hover {
            color: #007bff;
            transform: scale(1.1);
        }

        .btn_container button:active {
            transform: scale(1.2);
        }
    </style>


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
        <a id="icon-button" href="./banHang/banHang.html"><i class="fa-solid fa-cart-shopping"></i></a>
        <?php echo isset($loginButton) ? $loginButton : $account ?>
        <?php echo isset($registerButton) ? $registerButton : $logoutButton; ?>
    </div>
    <div class="row">
        <div class="leftcolumn">
            <div class="container">
                <div class="image-border">
                    <img id="anh" src="./images/1.jpg" alt="images/1.jpg">
                    <div class="btn_container">
                        <button class="btn-first" onclick="first()"><i class="fa-solid fa-backward"></i></button>
                        <button class="btn-prev" onclick="prev()"><i class="fa-solid fa-arrow-left"></i></button>
                        <button class="btn-next" onclick="next()"><i class="fa-solid fa-arrow-right"></i></button>
                        <button class="btn-last" onclick="last()"><i class="fa-solid fa-forward"></i></button>
                    </div>
                </div>
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
    <script>
        var image = [];
        var index = 0;
        var sohinh = 19;
        for (var i = 0; i < sohinh; i++) {
            image[i] = new Image();
            image[i].src = "images/" + i + ".jpg";
        }

        function first() {
            index = 0;
            var anh = document.getElementById("anh");
            anh.src = image[index].src;
        }

        function prev() {
            index--;
            if (index < 0) index = image.length - 1;
            var anh = document.getElementById("anh");
            anh.src = image[index].src;
        }

        function next() {
            index++;
            if (index >= image.length) index = 0;
            var anh = document.getElementById("anh");
            anh.src = image[index].src;
        }

        function last() {
            index = image.length - 1;
            var anh = document.getElementById("anh");
            anh.src = image[index].src;
        }
    </script>
</body>

</html>