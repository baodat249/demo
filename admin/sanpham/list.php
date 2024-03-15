<!-- ---- CONTENT ----  -->
<div class="Admin--content">
    <div class="Admin--content--container">
        <div class="Admin--content--container--title">
            <h1>Danh sách sản phẩm</h1>
        </div>
        <div class="Admin--content--container--table">
            <div class="Admin--content--container--table--box">
                <form action="index.php?act=listsp" method="post">
                    <input type="text" name="kyw" placeholder="Nhập tên sản phẩm">
                    <select name="id_type" id="">
                        <option value="0" selected>Tất cả</option>
                        <?php
                        foreach ($listdanhmuc as $danhmuc) {
                            extract($danhmuc);
                            echo '<option value="' . $id_type . '">' . $name_type . '</option>';
                        }
                        ?>
                    </select>
                    <input type="submit" name="listok" value="Submit">
                </form>
                <table>
                    <tr>
                        <th>Mã sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá sản phẩm</th>
                        <th>Ảnh sản phẩm</th>
                        <th>Lượt xem</th>
                        <th>Loại</th>
                        <th></th>
                    </tr>
                    <?php
                    $i = 1;
                    foreach ($listsanpham as $sanpham) {
                        extract($sanpham);
                        $suasp = "index.php?act=suasp&id_goods=" . $id_goods;
                        $xoasp = "index.php?act=xoasp&id_goods=" . $id_goods;
                        $hinhpath = "../upload/" . $image_goods;
                        if (is_file($hinhpath)) {
                            $hinh = "<img src='" . $hinhpath . "' height = '80'>";
                        } else {
                            $hinh = "No photo";
                        }
                        if ($especially_goods == 1) {
                            $tt = "Đặc biệt";
                        } else {
                            $tt = "Không đặc biệt";
                        }
                        echo '
                            <tr>
                                <td>' . $i . '</td>
                                <td>' . $name_goods . '</td>
                                <td>' . $price_goods . '</td>
                                <td>' . $hinh . '</td>
                                <td>' . $view_goods . '</td>
                                <td>' . $tt . '</td>
                                <td>
                                    <a href = "' . $xoasp . '"><input type="button" value="Xóa"></a> 
                                    <a href = "' . $suasp . '"><input type="button" value="Sửa"></a>
                                </td>
                            </tr>
                        ';
                        $i++;
                    }
                    ?>

                </table>
                <div class="Admin--content--container--table--button" style="margin-bottom:2rem;">
                    <a href="index.php?act=addsp"><input type="button" value="Nhập thêm"></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ********************* CSS ***************************  -->
<link rel="stylesheet" href="../content/css/list-danhmuc.css">
<link rel="stylesheet" href="../content/css/List-sanpham.css">