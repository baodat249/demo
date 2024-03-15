<!-- ---- CONTENT ----  -->
<div class="Admin--content">
    <div class="Admin--content--container">
        <div class="Admin--content--container--title">
            <h1>Danh sách bình luận</h1>
        </div>
        <div class="Admin--content--container--table">
            <div class="Admin--content--container--table--box--user">
                <table>
                    <tr>
                        <td>STT</td>
                        <td>Nội dung</td>
                        <td>Mã sản phẩm</td>
                        <td>Mã người bình luận</td>
                        <td>Ngày bình luận</td>
                        <td></td>
                    </tr>
                    <?php
                    $i = 1;
                    foreach ($listbinhluan as $binhluan) {
                        extract($binhluan);
                        $xoabl = "index.php?act=xoabl&id_comments=" . $id_comments;
                        echo '
                            <tr>
                                <td>' . $i . '</td>
                                <td>' . $content_comments . '</td>
                                <td>' . $id_goods . '</td>
                                <td>' . $id_user . '</td>
                                <td>' . $dayAdd_comments . '</td>
                                <td style = "padding : 0.5rem 1rem;">
                                    <a href = "' . $xoabl . '"><input type="button" value="Xóa"></a> 
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
<link rel="stylesheet" href="../content/css/list-danhmuc.css">
<link rel="stylesheet" href="../content/css/list-sanpham.css">
<link rel="stylesheet" href="../content/css/list-taikhoan.css">