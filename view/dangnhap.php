<link rel="stylesheet" href="content/css/dangky.css">
<!-- ********************* ĐĂNG NHẬP **********************  -->
<div class="container--login container--regester">
    <div class="container--regester--content">
        <div class="container--regester--content--form">
            <div class="container--regester--content--form--title">
                <h3>ĐĂNG NHẬP</h3>
            </div>
            <div class="container--regester--content--form--input">
                <form action="index.php?act=dangnhap" method="post">
                    <input type="text" class="user" placeholder="Tài khoản" name="name_user" required>
                    <input type="password" class="pass" placeholder="Mật khẩu" name="password_user" required>
                    <div class="submit_user" style="justify-content:center ; margin-bottom:2rem;">
                        <input type="submit" class="submit" name="dangnhap" value="Đăng nhập">
                    </div>
                </form>
            </div>
            <?php
            if (isset($thongbao) && ($thongbao != "")) {
                echo "<script type='text/javascript'>alert('$thongbao');</script>";
            }
            ?>
            <p style="text-align: center;"><a href="index.php?act=quenmk">Quên mật khẩu?</a> <br> <br> Bạn chưa có tài khoản, Đăng ký? <a href="index.php?act=dangky"> tại đây</a></p>
        </div>
    </div>
</div>