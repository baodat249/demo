<link rel="stylesheet" href="content/css/dangky.css">
<!-- ********************* Đăng ký **********************  -->
<div class="container--regester">
    <div class="container--regester--content">
        <div class="container--regester--content--form">
            <div class="container--regester--content--form--title">
                <h3>ĐĂNG KÝ</h3>
            </div>
            <div class="container--regester--content--form--input">
                <form action="index.php?act=dangky" method="post">
                    <input type="text" class="fullname" placeholder="Tài khoản" name="name_user" required id="name_user">
                    <input type="email" class="email" placeholder="Email" name="email_user" required id="email_user">
                    <input type="password" class="pass" placeholder="Mật khẩu" name="password_user" required id="password_user">
                    <input type="password" class="pass" placeholder="Nhập lại mật khẩu" name="repassword_user" required id="repassword_user">
                    <div class="submit_user">
                        <input type="submit" class="submit" value="Đăng ký" name="dangky">
                        <input type="reset" class="submit" placeholder="Reset">
                    </div>
                </form>
            </div>
            <?php
            if (isset($thongbao) && ($thongbao != "")) {
                echo "<script type='text/javascript'>alert('$thongbao');</script>";
            }
            ?>
            <p>Đã có tài khoản?<a href="index.php?act=dangnhap"> Đăng nhập</a></p>
        </div>
    </div>
</div>