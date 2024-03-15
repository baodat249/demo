<!-- ---- CONTENT ----  -->
<div class="Admin--content">
    <div class="Admin--content--container">
        <div class="Admin--content--container--title">
            <h1>Danh sách hóa đơn</h1>
        </div>
        <div class="Admin--content--container--table" style="margin-bottom:2rem ;">
            <div class="Admin--content--container--table--box">
                <form action="index.php?act=listbill" method="post">
                    <input type="text" name="kyw" placeholder="Nhập tên sản phẩm">
                    <input type="submit" name="listok" value="Submit">
                </form>
                <table>
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Khách hàng</th>
                        <th>Số lượng hàng</th>
                        <th>Giá trị đơn hàng</th>
                        <th>Tình trạng đơn hàng</th>
                        <th>Ngày đặt hàng</th>
                        <th>Thao tác</th>
                        <th></th>
                    </tr>
                    <?php
                    foreach ($listbill as $bill) {
                        extract($bill);
                        $kh = $bill["name_bill"] . '
                        <br> Email:  ' . $bill["email_bill"] . '
                        <br> Địa chỉ:  ' . $bill["address_bill"] . '
                        <br> SĐT: ' . $bill["phoneNumber_bill"] . ';
                        ';
                        $countsp = loadall_cart_count($bill["id_bill"]);
                        $ttdh = get_ttdh($bill["status_bill"]);
                        $suabill = "index.php?act=suabill&id_bill=" . $bill['id_bill'];
                        $xoabill = "index.php?act=xoabill&id_bill=" . $bill['id_bill'];
                        echo '
                                <tr>
                                    <td>PC-' . $bill['id_bill'] . '</td>
                                    <td>' . $kh . '</td>
                                    <td>' . $countsp . '</td>
                                    <td>' . $bill["total_bill"] . '</td>
                                    <td>' . $ttdh . '</td>
                                    <td>' . $bill["dayAdd_bill"] . '</td>
                                    <td>
                                        <a href = "' . $xoabill . '"><input type="button" value="Xóa"></a> 
                                        <a href = "' . $suabill . '"><input type="button" value="Sửa"></a>
                                    </td>
                                </tr>
                            ';
                    }
                    ?>

                </table>
            </div>
        </div>
    </div>
</div>
<!-- ********************* CSS ***************************  -->
<link rel="stylesheet" href="../content/css/List-danhmuc.css">
<!-- <link rel="stylesheet" href="../content/css/list-sanpham.css"> -->
<link rel="stylesheet" href="../content/css/Listbill.css">