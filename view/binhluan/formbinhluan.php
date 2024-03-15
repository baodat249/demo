<?php
session_start();
include "../../model/binhluan.php";
include "../../model/pdo.php";
$id_goods = $_REQUEST['id_goods'];
$dsbl = loadall_binhluan($id_goods);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../content/css/formbinhluan.css">
</head>

<body>
    <?php
    foreach ($dsbl as $bl) {
        extract($bl);
        if ($id_user != "") {
            echo '
            <div class = "BX_test">
                <p>
                    <ion-icon name="caret-forward-outline"></ion-icon>' . $content_comments . '
                </p>
                <p>
                    ' . $id_user . ' | ' . $dayAdd_comments . '
                </p>
            </div>
            ';
        }
    }
    ?>

    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" class="container--home--comment--start">
        <input type="hidden" name="id_goods" value="<?= $id_goods ?>">
        <input type="text" name="content_comments">
        <input type="submit" name="guibinhluan" value="Gửi bình luận">
    </form>
    <?php
    if (isset($_POST['guibinhluan']) && ($_POST['guibinhluan'])) {
        $content_comments = $_POST['content_comments'];
        $id_goods = $_POST['id_goods'];
        $id_user = $_SESSION['name_user']['id_user'];
        $dayAdd_comments = date('h:i:sa d/m/Y');
        insert_binhluan($content_comments, $id_goods, $id_user, $dayAdd_comments);
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
    ?>

</body>
<style>
    .container--home--comment--start {
        flex: 1;
        border-top: 0.1rem solid var(--gray_line);
    }

    .container--home--comment--start input:nth-child(2) {
        margin-top: 1rem;
        padding: 1rem;
        height: 2rem;
        width: 85%;
    }

    .container--home--comment--start input:nth-child(3) {
        width: 10%;
        margin-left: 1rem;
        height: 2.2rem;
        border: none;
        background: var(--background_grey);
        font-weight: 600;
        transition: 0.5s;
    }

    .container--home--comment--start input:nth-child(3):hover {
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    }
</style>

</html>