<link rel="stylesheet" href="content/css/bill.css">
<link rel="stylesheet" href="content/css/billconfirm.css">
<!-- ********************* HÓA ĐƠN **********************  -->
<div class="container--background--menu"></div>
<div class="container--cart">
    <div class="container--cart--table">
        <?php if (isset($bill) && (is_array($bill))) {
            extract($bill);
        }
        ?>
        <h2>ĐẶT HÀNG THÀNH CÔNG</h2>
        <div class="container--cart--table--box">
            <li>Mã đơn hàng: PC-<?= $bill['id_bill'] ?></li>
            <li>Ngày đặt hàng: <?= $bill['dayAdd_bill'] ?></li>
            <li>Tổng đơn hàng: <?= $bill['total_bill'] ?></li>
            <li>Phương thức thanh toán: <?= $bill['pttt_bill'] ?></li>
        </div>

        <div class="container--cart--table--info">
            <table>
                <tr>
                    <td>Người đặt hàng</td>
                    <td><?= $bill['name_bill'] ?></td>
                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td><?= $bill['address_bill'] ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?= $bill['email_bill'] ?></td>
                </tr>
                <tr>
                    <td>Điện thoại</td>
                    <td><?= $bill['phoneNumber_bill'] ?></td>
                </tr>
            </table>
        </div>

        <div class="container--cart--table--bill">
            <table>
                <?php
                bill_chi_tiet($billct);
                ?>
            </table>
        </div>

    </div>
    <div class="container--cart--image"></div>

</div>