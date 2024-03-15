<?php
function viewcart($del)
{
    global $img_path;
    $tong = 0;
    $i = 0;
    if ($del == 1) {
        $xoasp_th = " <th></th>";
        $xoasp_td2 = "<td></td>";
    } else {
        $xoasp_th = "";
        $xoasp_td2 = "";
    }
    echo '
        <tr>
            <th>STT</th>
            <th>Hình</th>
            <th>Sản phẩm</th>
            <th>Đơn giá</th>        
            <th>Số lượng</th>
            <th>Thành tiền</th>
            ' . $xoasp_th . '
        </tr>
    ';
    $num = 1;
    foreach ($_SESSION['mycart'] as $cart) {
        $hinh  = $img_path . $cart[2];
        $ttien = $cart[3] * $cart[4];
        $tong += $ttien;
        if ($del == 1) {
            $xoasp_td = '<td><a href="index.php?act=delcart&idcart=' . $i . '"><input type = "button" value = "Xóa"></a></td>';
        } else {
            $xoasp_td = "";
        }
        echo '
            <tr>
                <td>' . $num . '</td>
                <td><img src="' . $hinh . '" alt = "" height = "80px"></td>
                <td>' . $cart[1] . '</td>
                <td>' . $cart[3] . '</td>
                <td><input type = "number" value = "' . $cart[4] . '" min = 0></td>
                <td>' . $ttien . '</td>
               ' . $xoasp_td . '
            </tr>
            
        ';
        $i += 1;
        $num++;
    }
    echo '
        <tr>
            <td colspan="5">Tổng đơn hàng </td>
            <td colspan="1">' . $tong . '</td>
            ' . $xoasp_td2 . '
        </tr>
    ';
}


function tongdonhang()
{
    $tong = 0;
    foreach ($_SESSION['mycart'] as $cart) {
        $ttien = $cart[3] * $cart[4];
        $tong += $ttien;
    }
    return $tong;
}

function insert_bill($id_user, $name_bill, $email_bill, $address_bill, $pttt_bill, $phoneNumber_bill, $dayAdd_bill, $total_bill)
{
    $sql = "INSERT INTO petrichor_bill(id_user,name_bill,email_bill,address_bill,pttt_bill,phoneNumber_bill,dayAdd_bill,total_bill)
    VALUE ('$id_user','$name_bill',' $email_bill','$address_bill','$pttt_bill','$phoneNumber_bill','$dayAdd_bill','$total_bill')";
    return pdo_execute_return_lastInsertId($sql);
}


function insert_cart($id_user, $id_goods, $image_goods, $name_goods, $price_goods, $amount_goods, $intoMoney_cart, $id_bill)
{
    $sql = "INSERT INTO petrichor_cart(id_user,id_goods,image_goods,name_goods,price_goods,amount_goods,intoMoney_cart,id_bill)
    VALUE ('$id_user',' $id_goods','$image_goods','$name_goods','$price_goods','$amount_goods','$intoMoney_cart','$id_bill')";
    return pdo_execute($sql);
}


function loadone_bill($id_bill)
{
    $sql = "SELECT * FROM petrichor_bill WHERE id_bill=" . $id_bill;
    $bill = pdo_query_one($sql);
    return $bill;
}


function loadall_cart($id_bill)
{
    $sql = "SELECT * FROM petrichor_cart WHERE id_bill=" . $id_bill;
    $bill = pdo_query($sql);
    return $bill;
}
function loadall_cart_count($id_bill)
{
    $sql = "SELECT * FROM petrichor_cart WHERE id_bill=" . $id_bill;
    $bill = pdo_query($sql);
    return sizeof($bill);
}

function loadall_bill($kyw = "", $id_user = 0)
{

    $sql = "SELECT * FROM petrichor_bill WHERE 1";
    if ($id_user > 0) $sql .= " AND id_user=" . $id_user;
    if ($kyw != "") $sql .= " AND id_bill LIKE '%" . $kyw . "%'";
    $sql .= " ORDER BY id_bill DESC";
    $listbill = pdo_query($sql);
    return $listbill;
}

function bill_chi_tiet($listbill)
{
    global $img_path;
    $tong = 0;
    $i = 0;
    echo '
        <tr>
            <th>STT</th>
            <th>Hình</th>
            <th>Sản phẩm</th>
            <th>Đơn giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
        </tr>
    ';
    $num = 1;
    foreach ($listbill as $cart) {
        $hinh  = $img_path . $cart['image_goods'];
        $tong += $cart['intoMoney_cart'];
        echo '
            <tr>
                <td>' . $num . '</td>
                <td><img src="' . $hinh . '" alt = "" height = "80px"></td>
                <td>' . $cart['name_goods'] . '</td>
                <td>' . $cart['price_goods'] . '</td>
                <td>' . $cart['amount_goods'] . '</td>
                <td>' . $cart['intoMoney_cart']  . '</td>
            </tr>
            
        ';
        $i += 1;
        $num++;
    }
    echo '
        <tr>
            <td colspan="5">Tổng đơn hàng </td>
            <td colspan="1">' . $tong . '</td>
        </tr>
    ';
}


function get_ttdh($n)
{
    switch ($n) {
        case '0':
            $tt = "Đơn hàng mới";
            break;
        case '1':
            $tt = "Đang xử lý";
            break;
        case '2':
            $tt = "Đang giao hàng";
            break;
        case '3':
            $tt = "Hoàn tất";
            break;

        default:
            $tt = "Đơn hàng mới";
            break;
    }
    return $tt;
}

function loadall_thongke()
{

    $sql = "SELECT petrichor_type.id_type as madm,petrichor_type.name_type as tendm,count(petrichor_goods.id_goods) as countsp,min(petrichor_goods.price_goods) as minprice,
    max(petrichor_goods.price_goods) as maxprice, avg(petrichor_goods.price_goods) as avgprice";
    $sql .= " FROM petrichor_goods left join petrichor_type on petrichor_type.id_type = petrichor_goods.id_type";
    $sql .= " GROUP BY petrichor_type.id_type ORDER BY petrichor_type.id_type DESC";
    $listtk = pdo_query($sql);
    return $listtk;
}

function update_bill($id_bill, $status_bill)
{
    $sql = "UPDATE petrichor_bill SET status_bill='" . $status_bill . "' WHERE id_bill=" . $id_bill;
    pdo_execute($sql);
}
