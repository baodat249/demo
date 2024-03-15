<?php
session_start();
include "model/pdo.php";
include "model/danhmuc.php";
include "model/sanpham.php";
include "model/taikhoan.php";
include "model/cart.php";
include "view/header.php";
include "global.php";

if (!isset($_SESSION['mycart'])) $_SESSION['mycart'] = [];

$spnew = loadall_sanpham_cuahang();
$dsdm = loadall_danhmuc();
$dstop10 = loadall_sanpham_top10();

if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
            // **************** DÙNG ĐỂ CHẠY RA TRANG GIỚI THIỆU SẢN PHẨM **********************
        case 'gioithieu':
            include "view/gioithieu.php";
            break;
            // **************** DÙNG ĐỂ CHẠY RA TRANG CỬA HÀNG **********************
        case 'cuahang':
            include "view/cuahang.php";
            break;
            // **************** DÙNG ĐỂ CHẠY RA TRANG SẢN PHẨM CHI TIẾT **********************
        case 'sanphamct':
            if (isset($_GET['id_goods']) && ($_GET['id_goods']) > 0) {
                $id_goods = $_GET['id_goods'];
                $onesp = loadone_sanpham($id_goods);
                extract($onesp);
                $san_pham_cung_loai = load_sanpham_cungloai($id_goods, $id_type);
                view_goods($id_goods, $view_goods);
                include "view/sanphamct.php";
            } else {
                include "view/cuahang.php";
            }

            break;
            // **************** DÙNG ĐỂ CHẠY RA PHẦN SẢN PHẨM KHI MÀ MÌNH SEARCH HAY DÒ THEO LOẠI HÀNG **********************
        case 'sanpham':
            if (isset($_POST['kwy']) && ($_POST['kwy']) != 0) {
                $kwy = $_POST['kwy'];
            } else {
                $kwy = "";
            }
            if (isset($_GET['id_type']) && ($_GET['id_type']) > 0) {
                $id_type = $_GET['id_type'];
            } else {
                $id_type = 0;
            }
            $dssp = loadall_sanpham($kwy, $id_type);
            $tendm = load_ten_dm($id_type);
            include "view/sanpham.php";
            break;
            // **************** DÙNG ĐỂ CHẠY RA TRANG GIỎ HÀNG **********************
        case 'giohang':
            include "view/giohang.php";
            break;
            // **************** DÙNG ĐỂ CHẠY RA TRANG ĐĂNG NHẬP **********************
        case 'dangnhap':
            if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                $name_user = $_POST['name_user'];
                $password_user = $_POST['password_user'];
                $checkuser = checkuser($name_user, $password_user);
                if (is_array($checkuser)) {
                    $_SESSION['name_user'] = $checkuser;
                    // $thongbao = "Đăng nhập thành công";
                    header("Location: " . $_SERVER['HTTP_REFERER']);
                } else {
                    $thongbao = "Tài khoản không tồn tại";
                }
            }
            include "view/dangnhap.php";
            break;
            // **************** DÙNG ĐỂ CHẠY RA SỬA THÔNG TIN TÀI KHOẢN SAU KHI MÌNH ĐÃ ĐĂNG NHẬP TÀI KHOẢN **********************
        case 'edit_taikhoan':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $name_user = $_POST['name_user'];
                $id_user = $_POST['id_user'];
                $email_user = $_POST['email_user'];
                $address_user = $_POST['address_user'];
                $phoneNumber_user = $_POST['phoneNumber_user'];
                $password_user = $_POST['password_user'];
                $checkuser = checkuser($name_user, $password_user);
                update_taikhoan($id_user, $name_user, $email_user, $password_user, $address_user, $phoneNumber_user);
                $_SESSION['name_user'] = checkuser($name_user, $password_user);
                $thongbao = "Cập nhật thành công";
            }
            include "view/taikhoan/edit_taikhoan.php";
            break;

            // **************** QUÊN MẬT KHẨU**********************

        case 'quenmk':
            if (isset($_POST['guiemail']) && ($_POST['guiemail'])) {
                $email_user = $_POST['email_user'];
                $checkemail = checkemail($email_user);
                if (is_array($checkemail)) {
                    $thongbao = "Mật khẩu của bạn là: " . $checkemail['password_user'];
                } else {
                    $thongbao = "Email này không tồn tại!";
                }
            }
            include "view/taikhoan/quenmk.php";
            break;


            // **************** ĐĂNG XUẤT **********************
        case 'thoat':
            session_unset();
            header("Location: " . $_SERVER['HTTP_REFERER']);
            include "view/home.php";
            break;




            // **************** DÙNG ĐỂ CHẠY RA TRANG ĐĂNG KÝ TÀI KHOẢN **********************
        case 'dangky':
            if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                $email_user = $_POST['email_user'];
                $name_user = $_POST['name_user'];
                $password_user = $_POST['password_user'];
                $repassword_user = $_POST['repassword_user'];
                if (strlen($password_user) < 8) {
                    $thongbao = "Mật khẩu phải trên 8 ký tự";
                } else if ($password_user != $repassword_user) {
                    $thongbao = "Mật khẩu không trùng khớp";
                } else {
                    insert_taikhoan($email_user, $password_user, $name_user);
                    $thongbao = "Đăng ký thành công";
                }
            }
            include "view/taikhoan/dangky.php";
            break;

            // **************** THÊM VÀO GIỎ HÀNG **********************
        case 'addtocart':
            if (isset($_POST['addtocart']) && ($_POST['addtocart'])) {
                $id_goods = $_POST['id_goods'];
                $name_goods = $_POST['name_goods'];
                $image_goods = $_POST['image_goods'];
                $price_goods = $_POST['price_goods'];
                $soluong = 1;
                $ttien =  $soluong * $price_goods;
                $spadd = [$id_goods, $name_goods, $image_goods, $price_goods, $soluong, $ttien];
                array_push($_SESSION['mycart'], $spadd);
            }
            include "view/cart/viewcart.php";
            break;
            // **************** XÓA SẢN PHẨM TRONG GIỎ HÀNG **********************
        case 'delcart':
            if (isset($_GET['idcart'])) {
                array_slice($_SESSION['mycart'], $_GET['idcart'], 1);
                // echo "<script type='text/javascript'>alert('Hi');</script>";
            } else {
                $_SESSION['mycart'] = [];
            }
            // header("Location: " . $_SERVER['HTTP_REFERER']);
            header('Location: index.php?act=addtocart ');
            break;
            // **************** TRANG THANH TOÁN **********************
        case 'bill':
            include "view/cart/bill.php";
            break;
            // **************** HÓA ĐƠN **********************
        case 'billcomfirm':
            if (isset($_POST['dongydathang']) && ($_POST['dongydathang'])) {
                if (isset($_SESSION['name_user'])) $id_user = $_SESSION['name_user']['id_user'];
                else $id_user = 0;
                $name_bill = $_POST['name_user'];
                $email_bill = $_POST['email_user'];
                $address_bill = $_POST['address_user'];
                $pttt_bill = $_POST['pttt_bill'];
                $phoneNumber_bill = $_POST['phoneNumber_user'];
                $dayAdd_bill = date('h:i:sa d/m/Y');
                $total_bill = tongdonhang();

                $id_bill = insert_bill($id_user, $name_bill, $email_bill, $address_bill, $pttt_bill, $phoneNumber_bill, $dayAdd_bill, $total_bill);

                // Insert into cái bảng cart : $_SESSION[mycart]  && idbill
                foreach ($_SESSION['mycart'] as $cart) {
                    insert_cart($_SESSION['name_user']['id_user'], $cart[0], $cart[2], $cart[1], $cart[3], $cart[4], $cart[5], $id_bill);
                }

                $_SESSION['cart'] = [];
            }
            $bill = loadone_bill($id_bill);
            $billct = loadall_cart($id_bill);
            include "view/cart/billconfirm.php";
            break;
            // **************** ĐƠN HÀNG CỦA TÔI **********************
        case 'mybill':
            $listbill = loadall_bill($_SESSION['name_user']['id_user']);
            include "view/cart/mybill.php";
            break;
        default:
            include "view/home.php";
            break;
    }
} else {
    include "view/home.php";
}
include "view/footer.php";
