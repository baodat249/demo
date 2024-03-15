<?php
function loadall_taikhoan()
{
    $sql = "SELECT * FROM petrichor_user ORDER BY id_user DESC";
    $listtaikhoan = pdo_query($sql);
    return $listtaikhoan;
}

function insert_taikhoan($email_user, $password_user, $name_user)
{
    $sql = "INSERT INTO petrichor_user(email_user,password_user,name_user) VALUES('$email_user','$password_user','$name_user')";
    pdo_execute($sql);
}

function checkuser($name_user, $password_user)
{
    $sql = "SELECT * FROM petrichor_user WHERE name_user='" . $name_user . "' AND password_user='" . $password_user . "'";
    $sp = pdo_query_one($sql);
    return $sp;
}

function checkemail($email_user)
{
    $sql = "SELECT * FROM petrichor_user WHERE email_user='" . $email_user . "' ";
    $sp = pdo_query_one($sql);
    return $sp;
}

function update_taikhoan($id_user, $name_user, $email_user, $password_user, $address_user, $phoneNumber_user)
{
    $sql = "UPDATE petrichor_user SET name_user='" . $name_user . "', email_user='" . $email_user . "', password_user='" . $password_user . "',phoneNumber_user='" . $phoneNumber_user . "',address_user='" . $address_user . "' WHERE id_user=" . $id_user;
    pdo_execute($sql);
}

function loadone_taikhoan($id_user)
{
    $sql = "SELECT * FROM petrichor_user WHERE id_user=" . $id_user;
    $tk = pdo_query_one($sql);
    return $tk;
}


function update_taikhoan_02($id_user, $name_user, $password_user, $email_user, $address_user, $phoneNumber_user, $role_user, $activate_user)
{
    $sql = "UPDATE petrichor_user SET name_user='" . $name_user . "', email_user='" . $email_user . "', password_user='" . $password_user . "',phoneNumber_user='" . $phoneNumber_user . "',address_user='" . $address_user . "',role_user='" . $role_user . "',activate_user='" . $activate_user . "' WHERE id_user=" . $id_user;
    pdo_execute($sql);
}

function delete_taikhoan($id_user)
{
    $sql = "DELETE FROM petrichor_user WHERE id_user = " . $id_user;
    pdo_execute($sql);
}
