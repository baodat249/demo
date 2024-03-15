<?php
function insert_sanpham($name_goods, $price_goods, $discount_goods, $image_goods, $dayAdd_goods, $describe_goods, $especially_goods, $id_type)
{
    $sql = "INSERT INTO petrichor_goods(name_goods,price_goods,discount_goods,image_goods,dayAdd_goods,describe_goods,especially_goods,id_type) VALUES('$name_goods','$price_goods','$discount_goods','$image_goods','$dayAdd_goods','$describe_goods','$especially_goods','$id_type')";
    pdo_execute($sql);
}
function delete_sanpham($id_goods)
{
    $sql = "DELETE FROM petrichor_goods WHERE id_goods = " . $id_goods;
    pdo_execute($sql);
}

function loadall_sanpham_top10()
{
    $sql = "SELECT * FROM petrichor_goods WHERE 1 ORDER BY view_goods DESC LIMIT 0,10 ";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function loadall_sanpham_cuahang()
{
    $sql = "SELECT * FROM petrichor_goods WHERE 1 ORDER BY id_goods DESC LIMIT 0,9 ";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}

function loadall_sanpham($kyw = "", $id_type = 0)
{
    $sql = "SELECT * FROM petrichor_goods WHERE 1";
    if ($kyw != "") {
        $sql .= " AND name_goods LIKE '%" . $kyw . "%' ";
    }
    if ($id_type > 0) {
        $sql .= " AND id_type = '" . $id_type . "'";
    }
    $sql .= " ORDER BY id_goods DESC";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}

function load_ten_dm($id_type)
{
    if ($id_type > 0) {
        $sql = "SELECT * FROM petrichor_type WHERE id_type=" . $id_type;
        $dm = pdo_query_one($sql);
        extract($dm);
        return $name_type;
    } else {
        return "";
    }
}

function loadone_sanpham($id_goods)
{
    $sql = "SELECT * FROM petrichor_goods WHERE id_goods=" . $id_goods;
    $sp = pdo_query_one($sql);
    return $sp;
}

function load_sanpham_cungloai($id_goods, $id_type)
{
    $sql = "SELECT * FROM petrichor_goods WHERE id_type = " . $id_type . " AND id_goods <>" . $id_goods;
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function update_sanpham($id_goods, $id_type, $name_goods, $price_goods, $discount_goods, $image_goods, $dayAdd_goods, $describe_goods, $especially_goods)
{
    if ($image_goods != "")
        $sql = "UPDATE petrichor_goods SET name_goods='" . $name_goods . "', id_type='" . $id_type . "', price_goods='" . $price_goods . "',discount_goods='" . $discount_goods . "',image_goods='" . $image_goods . "',dayAdd_goods='" . $dayAdd_goods . "',describe_goods='" . $describe_goods . "', especially_goods='" . $especially_goods . "' WHERE id_goods=" . $id_goods;
    else
        $sql = "UPDATE petrichor_goods SET name_goods='" . $name_goods . "', id_type='" . $id_type . "', price_goods='" . $price_goods . "',discount_goods='" . $discount_goods . "',dayAdd_goods='" . $dayAdd_goods . "',describe_goods='" . $describe_goods . "', especially_goods='" . $especially_goods . "' WHERE id_goods=" . $id_goods;
    pdo_execute($sql);
}


function view_goods($id_goods, $view_goods)
{
    $sql = "UPDATE petrichor_goods SET view_goods='" . $view_goods . "'+1 WHERE id_goods=" . $id_goods;
    pdo_execute($sql);
}
