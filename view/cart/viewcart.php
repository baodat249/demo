<link rel="stylesheet" href="content/css/bill.css">
<!-- ********************* GIỎI HÀNG **********************  -->
<div class="container--background--menu"></div>
<div class="container--cart">
    <div class="container--cart--table">
        <h2>GIỎ HÀNG</h2>
        <table class="container--cart--table--second">
            <?php
            viewcart(1);
            ?>
        </table>
        <div class="container--cart--table--button" style="margin-top: 2rem ;">
            <a href="index.php?act=bill"><input type="submit" value="Đồng ý đặt hàng"></a>
            <a href="index.php?act=delcart"><input type="submit" value="Xóa giỏ hàng"></a>
        </div>
    </div>
    <div class="container--cart--image"></div>

</div>