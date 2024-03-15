<link rel="stylesheet" href="content/css/dangky.css">
<link rel="stylesheet" href="content/css/edit_taikhoan.css">
<!-- ********************* Đăng ký **********************  -->
<div class="container--regester">
    <div class="container--regester--content">
        <div class="container--regester--content--form">
            <div class="container--regester--content--form--title">
                <h3>CẬP NHẬT TÀI KHOẢN</h3>
            </div>
            <div class="container--regester--content--form--input">
                <?php
                if (isset($_SESSION['name_user']) && (is_array($_SESSION['name_user']))) {
                    extract($_SESSION['name_user']);
                }
                ?>
                <form action="index.php?act=edit_taikhoan" method="post" enctype="multipart/form-data">
                    <input type="text" class="fullname" placeholder="Tài khoản" name="name_user" value="<?= $name_user ?>" required>
                    <input type="email" class="email" placeholder="Email" name="email_user" value="<?= $email_user ?>" required>
                    <input type="password" class="pass" placeholder="Mật khẩu" name="password_user" value="<?= $password_user ?>" required>
                    <input type="text" class="address" name="address_user" placeholder="Địa chỉ" value="<?= $address_user ?>" required>
                    <input type="text" class="phone" name="phoneNumber_user" placeholder="Số điện thoại" value="<?= $phoneNumber_user ?>" required>
                    <div class="submit_user">
                        <input type="hidden" name="id_user" value="<?= $id_user ?>">
                        <input type="submit" class="submit" placeholder="Cập nhật" name="capnhat">
                        <input type="reset" class="submit" placeholder="Reset">
                    </div>
                </form>
            </div>
            <?php
            if (isset($thongbao) && ($thongbao != "")) {
                echo "<script type='text/javascript'>alert('$thongbao');</script>";
            }
            ?>
        </div>
    </div>
</div>