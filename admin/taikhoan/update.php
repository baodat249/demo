<?php
if (is_array($dm)) {
    extract($dm);
}
?>
<!-- ---- CONTENT ----  -->
<div class="Admin--content">
    <div class="Admin--content--container">
        <div class="Admin--content--container--title" style="background-color: #F8EDE3;">
            <h1>Cập nhật tài khoản</h1>
        </div>
        <div class="Admin--content--container--form">
            <form action="index.php?act=updatetk" method="post">
                <div class="Admin--content--container--form--group">
                    <div class="Admin--content--container--form--box">
                        <label for="">Tài khoản</label> <br>
                        <input type="text" name="name_user" value="<?= $name_user ?>" required>
                    </div>
                </div>
                <div class="Admin--content--container--form--group">
                    <div class="Admin--content--container--form--box">
                        <label for="">Mật khẩu</label> <br>
                        <input type="text" name="password_user" value="<?= $password_user ?>" required>
                    </div>
                    <div class="Admin--content--container--form--box">
                        <label for="">Email</label> <br>
                        <input type="email" name="email_user" value="<?= $email_user ?>" required>
                    </div>
                </div>
                <div class="Admin--content--container--form--group">
                    <div class="Admin--content--container--form--box">
                        <label for="">Địa chỉ</label> <br>
                        <input type="text" name="address_user" value="<?= $address_user ?>" required>
                    </div>
                    <div class="Admin--content--container--form--box">
                        <label for="">Số điện thoại</label> <br>
                        <input type="text" name="phoneNumber_user" value="<?= $phoneNumber_user ?>" required>
                    </div>
                </div>
                <div class="Admin--content--container--form--group">
                    <div class="Admin--content--container--form--box">
                        <label for="">Vai trò</label> <br>
                        <select name="role_user" id="" style="margin-top:0.5rem ;">
                            <option value="1">Admin</option>
                            <option value="0">User</option>
                        </select>
                    </div>
                    <div class="Admin--content--container--form--box">
                        <label for="">Trạng thái</label> <br>
                        <select name="activate_user" id="" style="margin-top:0.5rem ;">
                            <option value="1">On</option>
                            <option value="0">Off</option>
                        </select>
                    </div>
                </div>
                <br>
                <div class="Admin--content--container--form--button">
                    <input type="hidden" name="id_user" value="<?= $id_user ?>">
                    <input type="submit" name="capnhat" value="CẬP NHẬT">
                    <input type="reset" value="NHẬP LẠI">
                    <a href="index.php?act=listtk"><input type="button" value="DANH SÁCH"></a>
                </div>
                <?php
                if (isset($thongbao) && ($thongbao != "")) echo $thongbao; ?>
            </form>
        </div>
    </div>
</div>
</div>
</div>
<!-- ********************* CSS ***************************  -->
<link rel="stylesheet" href="../content/css/add-danhmuc.css">