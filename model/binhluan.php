<?php
function insert_binhluan($content_comments, $id_goods, $id_user, $dayAdd_comments)
{
    $sql = "INSERT INTO petrichor_comments(content_comments,id_goods,id_user,dayAdd_comments) 
    VALUES('$content_comments','$id_goods','$id_user','$dayAdd_comments')";
    pdo_execute($sql);
}
function loadall_binhluan($id_goods)
{
    $sql = "SELECT * FROM petrichor_comments WHERE 1";
    if ($id_goods > 0) $sql .= " AND id_goods = '" . $id_goods . "'";
    $sql .= " ORDER BY id_comments DESC";
    $listbinhluan = pdo_query($sql);
    return $listbinhluan;
}
function delete_binhluan($id_comments)
{
    $sql = "DELETE FROM petrichor_comments WHERE id_comments = " . $id_comments;
    pdo_execute($sql);
}

function loadall_binhluan_02()
{
    $sql = "SELECT * FROM petrichor_comments ORDER BY id_comments DESC";
    $listbinhluan = pdo_query($sql);
    return $listbinhluan;
}
