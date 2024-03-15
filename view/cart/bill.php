<link rel="stylesheet" href="content/css/bill.css">
<!-- ********************* GIỎI HÀNG **********************  -->
<div class="container--background--menu"></div>
<div class="container--cart">
    <form action="index.php?act=billcomfirm" method="post" class="container--cart--table">
        <h2>THÔNG TIN NGƯỜI MUA</h2>
        <table class="container--cart--table--first">
            <?php
            if (isset($_SESSION['name_user'])) {
                $name_user = $_SESSION['name_user']['name_user'];
                $address_user = $_SESSION['name_user']['address_user'];
                $email_user = $_SESSION['name_user']['email_user'];
                $phoneNumber_user = $_SESSION['name_user']['phoneNumber_user'];
            } else {
                $name_user = "";
                $address_user = "";
                $email_user = "";
                $phoneNumber_user = "";
            }
            ?>
            <tr>
                <td>Người đặt hàng</td>
                <td><input type=" text" name="name_user" value="<?= $name_user ?>">
                </td>
            </tr>
            <tr>
                <td>Địa chỉ</td>
                <td><input type="text" name="address_user" value="<?= $address_user ?>"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email_user" value="<?= $email_user ?>"></td>
            </tr>
            <tr>
                <td>Điện thoại</td>
                <td><input type="text" name="phoneNumber_user" value="<?= $phoneNumber_user ?>"></td>
            </tr>
        </table>
        <br>
        <div class="container--cart--table--thirt">
            <h2>PHƯƠNG THỨC THANH TOÁN</h2>
            <table>
                <tr>
                    <td><input type="radio" value="1" name="pttt_bill" checked>Thanh toán trực tiếp</td>
                    <td><input type="radio" value="2" name="pttt_bill">Chuyển khoản ngân hàng</td>
                    <td><input type="radio" value="3" name="pttt_bill">Thanh toán online</td>
                </tr>
            </table>
        </div>
        <br>
        <table class="container--cart--table--second">
            <h2>GIỎ HÀNG</h2>
            <?php viewcart(0); ?>
        </table>
        <br>
        <div class="container--cart--table--button">
            <a href="index.php?act=bill"><input type="submit" value="Đồng ý đặt hàng" name="dongydathang"></a>
        </div>
    </form>
    <div class="container--cart--image"></div>

</div>