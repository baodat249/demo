<link rel="stylesheet" href="content/css/dangky.css">
<!-- ********************* Đăng ký **********************  -->
<div class="container--regester">
    <div class="container--regester--content">
        <div class="container--regester--content--form">
            <div class="container--regester--content--form--title">
                <h3>QUÊN MẬT KHẨU</h3>
            </div>
            <div class="container--regester--content--form--input">
                <form action="index.php?act=quenmk" method="post">
                    <input type="email" class="email" placeholder="Email" name="email_user">
                    <div class="submit_user" style=" display: flex;align-items: center;justify-content: center;">
                        <input type="submit" class="submit" placeholder="Gửi" name="guiemail">
                    </div>
                </form>
            </div>
            <?php
            if (isset($thongbao) && ($thongbao != "")) {
                echo "<script type='text/javascript'>alert('$thongbao');</script>";
            }
            ?>
        </div>
    </div>
</div>