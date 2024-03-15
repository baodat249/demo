<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petrichor Candle</title>
    <link rel="stylesheet" href="content/css/HEader.css">
    <link rel="stylesheet" href="content/css/footer.css">
    <link rel="shortcut icon" href="content/image/logo_tab.png">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>

<body>
    <div class="container">
        <!-- ************ MENU **************** -->
        <div class="container--menu" style="z-index: 3;">
            <div class="container--menu--logo">
                <a href="index.php?act=home">
                    <h3>Petrichor</h3>
                    <p>candle</p>
                </a>
            </div>
            <header>
                <ul>
                    <li><a href="index.php">Trang chủ</a></li>
                    <li><a href="index.php?act=gioithieu">Giới thiệu</a></li>
                    <li><a href="index.php?act=cuahang">Cửa hàng<i class="fas fa-chevron-down"></i></a>
                        <!-- <ul class="header_second">
                            <li><a href="">Chirstmas</a></li>
                            <li><a href="">Party</a></li>
                            <li><a href="">Holiday</a></li>
                        </ul> -->
                    </li>
                    <li><a href="index.php?act=giohang">Liên hệ</a></li>
                    <li><a href="index.php?act=dangnhap">Đăng nhập</a></li>
                </ul>
            </header>
            <div class="container--menu--user">
                <?php
                if (isset($_SESSION['name_user'])) {
                    extract($_SESSION['name_user']); ?>
                    <a href="index.php?act=mybill">
                        <ion-icon name="cart-outline"></ion-icon>
                    </a>
                    <ion-icon name="person-circle-outline" id="user" onclick="callTabUser()"></ion-icon>
                    <p><?= $name_user; ?></p>
                    <div class="container--menu--user--tab" id="tab_user">
                        <a href="index.php?act=edit_taikhoan">Cập nhật thông tin</a>
                        <?php
                        if ($role_user == 1) {
                            echo ' <a href="admin/">Admin</a>';
                        }
                        ?>
                        <a href="index.php?act=thoat">Đăng xuất</a>
                    </div>
                <?php
                } ?>
                <script>
                    var user = document.getElementById('user');
                    var tab_user = document.getElementById('tab_user');
                    var i = 0;

                    function callTabUser() {
                        if (i == 0) {
                            tab_user.style = `
                            display: block;
                            height: 8rem;
                            opacity: 1;
                            display: flex;
                            flex-direction: column;
                            gap: 1rem;
                            padding: 1rem;
                            position: absolute;
                            top: 5rem;
                            width: 100%;
                            background: #353535;
                        `;
                            i++;
                        } else {
                            tab_user.style = `display : none;`;
                            i--;
                        }

                    }
                </script>
            </div>
        </div>