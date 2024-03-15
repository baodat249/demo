<?php
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/taikhoan.php";
include "../model/binhluan.php";
include "../model/cart.php";
include "header.php";
?>
<!-- ---- CONTENT ----  -->
<div class="Admin--content">
    <div class="Admin--content--container">
        <?php
        // controller

        if (isset($_GET['act'])) {
            $act = $_GET['act'];
            switch ($act) {
                    // ************************* DANH MỤC ******************************* 
                case 'adddm':
                    // Kiểm tra xem người dùng có click vào nút add hay không
                    if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                        $name_type = $_POST['name_type'];
                        insert_danhmuc($name_type);
                        $thongbao = "<script type='text/javascript'>alert('Thêm thành công');</script>";
                    }
                    include "danhmuc/add.php";
                    break;
                case 'listdm':
                    $listdanhmuc = loadall_danhmuc();
                    include "danhmuc/list.php";
                    break;
                case 'xoadm':
                    if (isset($_GET['id_type']) && ($_GET['id_type'] > 0)) {
                        delete_danhmuc($_GET['id_type']);
                    }
                    $listdanhmuc = loadall_danhmuc();
                    include "danhmuc/list.php";
                    break;
                case 'suadm':
                    if (isset($_GET['id_type']) && ($_GET['id_type'] > 0)) {
                        $dm = loadone_danhmuc($_GET['id_type']);
                    }

                    include "danhmuc/update.php";
                    break;
                case 'updatedm':
                    if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                        $name_type = $_POST['name_type'];
                        $id_type = $_POST['id_type'];
                        update_danhmuc($id_type, $name_type);
                        $thongbao = "<script type='text/javascript'>alert('Thêm thành công');</script>";
                    }
                    $listdanhmuc = loadall_danhmuc();
                    include "danhmuc/list.php";
                    break;

                    // ************************* TÀI KHOẢN ******************************* 
                case 'suatk':
                    if (isset($_GET['id_user']) && ($_GET['id_user'] > 0)) {
                        $dm = loadone_taikhoan($_GET['id_user']);
                    }

                    include "taikhoan/update.php";
                    break;

                case 'listtk':
                    $listtaikhoan = loadall_taikhoan();
                    include "taikhoan/list.php";
                    break;

                case 'updatetk':
                    if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                        $name_user = $_POST['name_user'];
                        $id_user = $_POST['id_user'];
                        $password_user = $_POST['password_user'];
                        $email_user = $_POST['email_user'];
                        $address_user = $_POST['address_user'];
                        $phoneNumber_user = $_POST['phoneNumber_user'];
                        $role_user = $_POST['role_user'];
                        $activate_user = $_POST['activate_user'];
                        update_taikhoan_02($id_user, $name_user, $password_user, $email_user, $address_user, $phoneNumber_user, $role_user, $activate_user);
                        $thongbao = "<script type='text/javascript'>alert('Thêm thành công');</script>";
                    }
                    $listtaikhoan = loadall_taikhoan();
                    include "taikhoan/list.php";
                    break;

                case 'xoatk':
                    if (isset($_GET['id_user']) && ($_GET['id_user'] > 0)) {
                        delete_taikhoan($_GET['id_user']);
                    }
                    $listtaikhoan = loadall_taikhoan();
                    include "taikhoan/list.php";
                    break;
                    // ************************* BÌNH LUẬN ******************************* 
                case 'xoabl':
                    if (isset($_GET['id_comments']) && ($_GET['id_comments'] > 0)) {
                        delete_binhluan($_GET['id_comments']);
                    }
                    $listbinhluan = loadall_binhluan_02();
                    include "binhluan/list.php";
                    break;
                    // ************************* BILL******************************* 

                case 'suabill':
                    if (isset($_GET['id_bill']) && ($_GET['id_bill'] > 0)) {
                        $bill = loadone_bill($_GET['id_bill']);
                    }
                    include "bill/update.php";
                    break;


                    // ************************* SẢN PHẨM ******************************* 


                case 'addsp':
                    // Kiểm tra xem người dùng có click vào nút add hay không
                    if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                        $id_type = $_POST['id_type'];
                        $name_goods = $_POST['name_goods'];
                        $price_goods = $_POST['price_goods'];
                        $discount_goods = $_POST['discount_goods'];
                        $image_goods = $_FILES['image_goods']['name'];
                        $dayAdd_goods = $_POST['dayAdd_goods'];
                        $describe_goods = $_POST['describe_goods'];
                        $especially_goods = $_POST['especially_goods'];
                        $target_dir = "../upload/";
                        $target_file = $target_dir . basename($_FILES["image_goods"]["name"]);
                        if (move_uploaded_file($_FILES["image_goods"]["tmp_name"], $target_file)) {
                            // echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
                        } else {
                            // echo "Sorry, there was an error uploading your file.";
                        }
                        insert_sanpham($name_goods, $price_goods, $discount_goods, $image_goods, $dayAdd_goods, $describe_goods, $especially_goods, $id_type);
                        $thongbao = "<script type='text/javascript'>alert('Thêm thành công');</script>";
                    }
                    $listdanhmuc = loadall_danhmuc();
                    include "sanpham/add.php";
                    break;
                case 'listsp':
                    if (isset($_POST['listok']) && ($_POST['listok'])) {
                        $kyw = $_POST['kyw'];
                        $id_type = $_POST['id_type'];
                    } else {
                        $kyw = "";
                        $id_type = 0;
                    }
                    $listdanhmuc = loadall_danhmuc();
                    $listsanpham = loadall_sanpham($kyw, $id_type);
                    include "sanpham/list.php";
                    break;
                case 'xoasp':
                    if (isset($_GET['id_goods']) && ($_GET['id_goods'] > 0)) {
                        delete_sanpham($_GET['id_goods']);
                    }
                    $listdanhmuc = loadall_danhmuc();
                    $listsanpham = loadall_sanpham("", 0);
                    include "sanpham/list.php";
                    break;
                case 'suasp':
                    if (isset($_GET['id_goods']) && ($_GET['id_goods'] > 0)) {
                        $sanpham = loadone_sanpham($_GET['id_goods']);
                    }
                    $listdanhmuc = loadall_danhmuc();
                    include "sanpham/update.php";
                    break;
                case 'updatesp':
                    if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                        $id_type = $_POST['id_type'];
                        $id_goods = $_POST['id_goods'];
                        $name_goods = $_POST['name_goods'];
                        $price_goods = $_POST['price_goods'];
                        $discount_goods = $_POST['discount_goods'];
                        $image_goods = $_FILES['image_goods']['name'];
                        $dayAdd_goods = $_POST['dayAdd_goods'];
                        $describe_goods = $_POST['describe_goods'];
                        $especially_goods = $_POST['especially_goods'];
                        $target_dir = "../upload/";
                        $target_file = $target_dir . basename($_FILES["image_goods"]["name"]);
                        if (move_uploaded_file($_FILES["image_goods"]["tmp_name"], $target_file)) {
                            // echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
                        } else {
                            // echo "Sorry, there was an error uploading your file.";
                        }
                        update_sanpham($id_goods, $id_type, $name_goods, $price_goods, $discount_goods, $image_goods, $dayAdd_goods, $describe_goods, $especially_goods);
                        $thongbao = "<script type='text/javascript'>alert('Thêm thành công');</script>";
                    }
                    $listdanhmuc = loadall_danhmuc();
                    $listsanpham = loadall_sanpham();
                    include "sanpham/list.php";
                    break;
                case 'dskh':
                    $listtaikhoan = loadall_taikhoan();
                    include "taikhoan/list.php";
                    break;
                case 'dsbl':
                    $listbinhluan = loadall_binhluan(0);
                    include "binhluan/list.php";
                    break;
                case 'listbill':
                    if (isset($_POST['kyw']) && ($_POST['kyw']) != "") {
                        $kyw = $_POST['kyw'];
                    } else {
                        $kyw = "";
                    }
                    $listbill = loadall_bill($kyw, 0);
                    include "bill/listbill.php";
                    break;
                case 'thongke':
                    $listthongke = loadall_thongke();
                    include "thongke/list.php";
                    break;
                case 'bieudo':
                    $listthongke = loadall_thongke();
                    include "thongke/bieudo.php";
                    break;
                case 'thongkebl':
                    $listthongke = loadall_thongke();
                    include "thongke/binhluantk.php";
                    break;
                case 'guiemail':
                    include "sendemail/email.php";
                    break;
                case 'sendEmail':
                    include "sendemail/send.php";
                    break;
                default:
                    include "home.php";
                    break;
            }
        } else {
            include "home.php";
        }
        ?>
    </div>
</div>
</div>
<?php
include "footer.php"; ?>