<!-- ---- CONTENT ----  -->
<div class="Admin--content">
    <div class="Admin--content--container">
        <div class="Admin--content--container--title">
            <h1>Danh sách tài khoản</h1>
        </div>
        <div class="Admin--content--container--table">
            <div class="Admin--content--container--table--box--user">
                <table>
                    <tr>
                        <td>Mã tài khoản</td>
                        <td>Tên đăng nhập</td>
                        <td>Mật khẩu</td>
                        <td>Trạng thái</td>
                        <td>Email</td>
                        <td>Vai trò</td>
                        <td>Địa chỉ</td>
                        <td>Số điện thoại</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <?php
                    $i = 1;
                    foreach ($listtaikhoan as $taikhoan) {
                        extract($taikhoan);
                        $suatk = "index.php?act=suatk&id_user=" . $id_user;
                        $xoatk = "index.php?act=xoatk&id_user=" . $id_user;
                        if ($role_user == 1) {
                            $vt = "admin";
                        } else {
                            $vt = "user";
                        }
                        if ($activate_user == 0) {
                            $tt = "On";
                        } else {
                            $tt = "Off";
                        }
                        echo '
                            <tr>
                                <td>' . $i . '</td>
                                <td>' . $name_user . '</td>
                                <td>' . $password_user . '</td>
                                <td>' . $tt . '</td>
                                <td>' . $email_user . '</td>
                                <td>' . $vt . '</td>
                                <td>' . $address_user . '</td>
                                <td>' . $phoneNumber_user . '</td>
                                <td>
                                    <a href = "' . $xoatk . '"><input type="button" value="Xóa"></a> 
                                </td>
                                <td>
                                    <a href = "' . $suatk . '"><input type="button" value="Sửa"></a>
                                </td>
                            </tr>
                        ';
                        $i++;
                    }
                    ?>

                </table>
            </div>
        </div>
    </div>
</div>
<!-- ********************* CSS ***************************  -->
<link rel="stylesheet" href="../content/css/List-danhmuc.css">
<link rel="stylesheet" href="../content/css/List-sanpham.css">
<link rel="stylesheet" href="../content/css/List-Taikhoan.css">