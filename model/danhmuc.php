<?php
function insert_danhmuc($name_type)
{
    $sql = "INSERT INTO petrichor_type(name_type) VALUES('$name_type')";
    pdo_execute($sql);
}
function delete_danhmuc($id_type)
{
    $sql = "DELETE FROM petrichor_type WHERE id_type = " . $id_type;
    pdo_execute($sql);
}
function loadall_danhmuc()
{
    $sql = "SELECT * FROM petrichor_type ORDER BY id_type DESC";
    $listdanhmuc = pdo_query($sql);
    return $listdanhmuc;
}
function loadone_danhmuc($id_type)
{
    $sql = "SELECT * FROM petrichor_type WHERE id_type=" . $id_type;
    $dm = pdo_query_one($sql);
    return $dm;
}
function update_danhmuc($id_type, $name_type)
{
    $sql = "UPDATE petrichor_type SET name_type='" . $name_type . "' WHERE id_type=" . $id_type;
    pdo_execute($sql);
}
