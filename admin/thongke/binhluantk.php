<!-- ---- CONTENT ----  -->
<div class="Admin--content">
    <div class="Admin--content--container">
        <div class="Admin--content--container--title">
            <h1>Thống kê bình luận</h1>
        </div>
        <div class="Admin--content--container--table">
            <div class="Admin--content--container--table--box">
                <table>
                    <tr>
                        <th>TÊN HÀNG HÓA</th>
                        <th>SỐ BÌNH LUẬN</th>
                        <th>NGÀY MỚI NHẤT</th>
                        <th>NGÀY CŨ NHẤT</th>
                    </tr>
                    <?php
                    foreach ($listthongke as $thongke) {
                        extract($thongke);
                        echo '
                <tr>
                     <td></td>
                     <td></td>
                    <td>' . $countsp . '</td>
                    <td>' . $maxprice . '</td>
                </tr>
            ';
                    }
                    ?>
                </table>
                <div class="Admin--content--container--table--button" style="margin-bottom:2rem;">
                    <a href="index.php?act=bieudo"><input type="button" value="Xem biểu đồ"></a>
                    <a href="index.php?act=thongke"><input type="button" value="Sản phẩm"></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ********************* CSS ***************************  -->
<link rel="stylesheet" href="../content/css/list-danhmuc.css">
<!-- <link rel="stylesheet" href="../content/css/list-sanpham.css"> -->
<link rel="stylesheet" href="../content/css/listbill.css">