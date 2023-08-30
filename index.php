<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--styles-->
    <link href="./styles.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Trang chủ - Bookstore</title>
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
        $account = '<a class="btn-login" href="./account_info/account_info.php" style="float: right">Xin chào, ' . $fullname . '</a>';
        $logoutButton = '<a class="btn-logout" href="./logout/logout.php" style="float: right">Đăng xuất</a>';
    } else {
        $loginButton = '<a class="btn-login" href="./login/login.php" style="float: right">Đăng nhập</a>';
        $registerButton = '<a class="btn-logout" href="./sign-up/sign-up.php" style="float: right">Đăng ký</a>';
    }
    ?>
    <div class="header">
        <h1>Bookstore</h1>
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
        <!-- <a class="btn-login" href="./login/login.php" style="float: right">Đăng nhập</a>
        <a class="btn-login" href="./sign-up/sign-up.php" style="float: right">Đăng ký</a> -->
    </div>
    <div class="row">
        <div class="leftcolumn">
            <div class="grid-container">
                <div class="card-book" onclick="window.location.href='book-information.php'">
                    <h2>NHÀ GIẢ KIM</h2>
                    <h5>Paulo Coelho</h5>
                    <img src="./images/1.jpg" alt="" style="height: 200px;">
                    <p>
                        "Nhà Giả Kim" là một cuốn tiểu thuyết viễn tưởng của nhà văn Paulo Coelho. Cuốn sách kể về cuộc
                        hành trình của một người phụ tá tên Santiago trong việc tìm kiếm hiểu về ý nghĩa thực sự của
                        cuộc sống. Được cho là một câu chuyện về sự khám phá bản thân và tìm kiếm đích thực...
                    </p>
                    <div class="book-price">
                        <p class="price"><del>180.000 VND</del></p>
                        <p class="price">150.000 VND</p>
                    </div>
                    <button class="btn-buy">Mua ngay</button>
                </div>
                <div class="card-book" onclick="window.location.href='book-information.php'">
                    <h2>ĐẮC NHÂN TÂM </h2>
                    <h5>Dale Carnegie</h5>
                    <img class="images" src="./images/2.jpg" />
                    <p>
                        "Đắc Nhân Tâm" là một trong những cuốn sách kinh điển về phát triển cá nhân và quan hệ
                        con người của Dale Carnegie. Cuốn sách giúp độc giả hiểu về tâm lý con người, cách giao
                        tiếp hiệu quả và cách xây dựng mối quan hệ tốt với người khác...
                    </p>
                    <div class="book-price">
                        <p class="price"><del>200.000 VND</del></p>
                        <p class="price">180.000 VND</p>
                    </div>
                    <button class="btn-buy">Mua ngay</button>
                </div>
                <div class="card-book" onclick="window.location.href='book-information.php'">
                    <h2>CÁCH NGHĨ ĐỂ THÀNH CÔNG</h2>
                    <h5>Napoleon Hill</h5>
                    <img class="images" src="./images/0.jpg" />
                    <p>
                        Cách Nghĩ Để Thành Công mang tới cho bạn triết lý thành đạt, đồng thời cung cấp phương pháp để
                        bạn lên kế hoạch chi tiết để đạt được thành công đó. Không chỉ có lý thuyết suông, tác phẩm này
                        được dẫn chứng từ những trường hợp...
                    </p>
                    <div class="book-price">
                        <p class="price"><del>220.000 VND</del></p>
                        <p class="price">200.000 VND</p>
                    </div>
                    <button class="btn-buy">Mua ngay</button>
                </div>
                <div class="card-book" onclick="window.location.href='book-information.php'">
                    <h2>QUẲNG GẮNG LO ĐI</h2>
                    <h5>Dale Carnegie</h5>
                    <img class="images" src="./images/5.jpg" />
                    <p>
                        Quẳng Gánh Lo Đi Và Vui Sống phân tích và giải đáp những nỗi buồn, lo lắng diễn ra hàng ngày
                        trong cuộc sống của mỗi người. Để từ đó tác giả xây dựng nên thái độ sống tích cực, hạnh phúc và
                        từ bỏ thói quen lo lắng để giúp bản thân luôn vui vẻ và tích cực để vượt qua khó khăn.
                    </p>
                    <div class="book-price">
                        <p class="price"><del>150.000 VND</del></p>
                        <p class="price">130.000 VND</p>>
                    </div>
                    <button class="btn-buy">Mua ngay</button>
                </div>
                <div class="card-book" onclick="window.location.href='book-information.php'">
                    <h2>HẠT GIỐNG TÂM HỒN</h2>
                    <h5>Nhiều tác giả</h5>
                    <img class="images" src="./images/3.jpg" />
                    <p>
                        Bộ sách hạt giống tâm hồn là bộ sách được tổng hợp các câu chuyện, bức tranh đầy ý nghĩa về cuộc
                        sống của nhiều tác giả khác nhau. Đó là những câu chuyện về sự thành công, tấm lòng cao đẹp giữa
                        con người với con người...
                    </p>
                    <div class="book-price">
                        <p class="price"><del>190.000 VND</del></p>
                        <p class="price">160.000 VND</p>
                    </div>
                    <button class="btn-buy">Mua ngay</button>
                </div>
                <div class="card-book" onclick="window.location.href='book-information.php'">
                    <h2>ĐỌC VỊ BẤT KÌ AI</h2>
                    <h5>David J.Lieberman</h5>
                    <img class="images" src="./images/4.jpg" />
                    <p>
                        Đọc Vị Bất Kỳ Ai là một quyển cẩm nang dạy bạn cách thâm nhập vào tâm trí của người khác, để suy
                        đoán được họ đang nghĩ gì. Cuốn sách có nội dung bao gồm 2 phần chính và được chia thành 15
                        chương. Đọc Vị Bất Kỳ Ai sẽ là sự lựa chọn phù hợp cho những ai đang tìm kiếm một quyển sách để
                        cải thiện và phát triển kỹ năng giao tiếp.
                    </p>
                    <div class="book-price">
                        <p class="price"><del>250.000 VND</del></p>
                        <p class="price">200.000 VND</p>
                    </div>
                    <button class="btn-buy">Mua ngay</button>
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
                <h4> Email: <i class="fa fa-envelope" aria-hidden="true"></i> nguyenvandat37660@gmail.com <br>
                    2051120208@gmail.com</h4>
            </div>
        </div>
    </div>


    <div class="footer full-width">
        <span>© 2023 Bookstore. All rights reserved.</span>
    </div>

</body>

</html>