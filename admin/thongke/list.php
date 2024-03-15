<!-- ---- CONTENT ----  -->
<div class="Admin--content">
    <div class="Admin--content--container">
        <div class="Admin--content--container--title">
            <h1>Thống kê hàng hóa</h1>
        </div>
        <div class="Admin--content--container--table">
            <div class="Admin--content--container--table--box">
                <table>
                    <tr>
                        <th>MÃ DANH MỤC</th>
                        <th>TÊN DANH MỤC</th>
                        <th>SỐ LƯỢNG</th>
                        <th>GIÁ CAO NHẤT</th>
                        <th>GIÁ THẤP NHẤT</th>
                        <th>GIÁ TRUNG BÌNH</th>
                    </tr>
                    <?php
                    foreach ($listthongke as $thongke) {
                        extract($thongke);
                        echo '
                <tr>
                    <td>' . $madm . '</td>
                    <td>' . $tendm . '</td>
                    <td>' . $countsp . '</td>
                    <td>' . $maxprice . '</td>
                    <td>' . $minprice . '</td>
                    <td>' . $avgprice . '</td>
                </tr>
            ';
                    }
                    ?>
                </table>
                <div class="Admin--content--container--table--button" style="margin-bottom:2rem;">
                    <a href="index.php?act=bieudo"><input type="button" value="Xem biểu đồ"></a>
                    <a href="index.php?act=thongkebl"><input type="button" value="Bình luận"></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ********************* CSS ***************************  -->
<link rel="stylesheet" href="../content/css/list-danhmuc.css">
<!-- <link rel="stylesheet" href="../content/css/list-sanpham.css"> -->
<link rel="stylesheet" href="../content/css/listbill.css">