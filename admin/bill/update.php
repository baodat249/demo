<?php
if (is_array($bill)) {
    extract($bill);
}
?>
<!-- ---- CONTENT ----  -->
<div class="Admin--content">
    <div class="Admin--content--container">
        <div class="Admin--content--container--title" style="background-color: #F8EDE3;">
            <h1>Cập nhật đơn hàng</h1>
        </div>
        <div class="Admin--content--container--form">
            <form action="index.php?act=updatebill" method="post">
                <div class="Admin--content--container--form--box">
                    <label for="">Mã đơn hàng</label> <br>
                    <input type="text" name="id_bill" disabled>
                </div>
                <div class="Admin--content--container--form--box">
                    <label for="">Tình trạng đơn hàng</label> <br>
                    <select name="status_bill" id="">
                        <option value="0">Đơn hàng mới</option>
                        <option value="1">Đang chờ xác nhận</option>
                        <option value="2">Đang giao hàng</option>
                        <option value="3">Đã thanh toán</option>
                    </select>
                </div>
                <div class="Admin--content--container--form--button" style="margin-bottom: 2rem;">
                    <input type="hidden" name="id_type" value="<?= $id_bill ?>">
                    <input type="submit" name="capnhat" value="CẬP NHẬT">
                    <input type="reset" value="NHẬP LẠI">
                    <a href="index.php?act=listbill"><input type="button" value="DANH SÁCH"></a>
                </div>
                <?php
                if (isset($thongbao) && ($thongbao != "")) echo $thongbao; ?>
            </form>
        </div>
    </div>
</div>
</div>
<!-- ********************* CSS ***************************  -->
<link rel="stylesheet" href="../content/css/add-danhmuc.css">