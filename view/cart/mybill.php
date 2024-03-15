<link rel="stylesheet" href="content/css/bill.css">
<!-- ********************* GIỎI HÀNG **********************  -->
<div class="container--background--menu"></div>
<div class="container--cart">
    <div class="container--cart--table">
        <h2>ĐƠN HÀNG CỦA TÔI</h2>
        <table style="margin-bottom: 2rem;">
            <tr>
                <th>Mã đơn hàng</th>
                <th>Ngày đặt hàng</th>
                <th>Số lượng</th>
                <th>Tổng</th>
                <th>Tình trạng</th>
            </tr>
            <?php
            if (is_array($listbill)) {
                foreach ($listbill as $bill) {
                    extract($bill);
                    $ttdh = get_ttdh($bill['status_bill']);
                    $countsp =  loadall_cart_count($bill['id_bill']);
                    echo '
                        <tr>
                            <td>PC-' . $bill['id_bill'] . '</td>
                            <td>' . $bill['dayAdd_bill'] . '</td>
                            <td>' . $countsp . '</td>
                            <td>' . $bill['total_bill'] . '</td>
                            <td>' . $ttdh . '</td>
                        </tr>
                    ';
                }
            }
            ?>
        </table>
    </div>
    <div class="container--cart--image"></div>

</div>