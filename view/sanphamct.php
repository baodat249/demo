<link rel="stylesheet" href="content/css/SAnphamct.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- ********************* CHI TIẾT SẢN PHẨM **********************  -->
<div class="container--home">
    <?php extract($onesp);


    ?>
    <div class="container--home--detail">
        <div class="container--home--detail--background_header"></div>
        <div class="container--home--detail--title">
            <h2><?= $name_goods ?></h2>
        </div>
        <div class="container--home--detail--box">
            <div class="container--home--detail--box--image">
                <?php
                $img = $img_path . $image_goods;
                echo '
            <img src="' . $img . '" style = "width: 100%"> <br>
        ';
                ?>
            </div>
            <div class="container--home--detail--box--describe">
                <?php
                if ($especially_goods == 0) {
                    $i = "Thường";
                } else {
                    $i = "Đăc biệt";
                }
                echo '
                        <h2>' . $name_goods . '</h2>
                        <p>Giá: $' . $price_goods . '</p>
                        <p>Lượt xem: ' . $view_goods . ' lượt</p>
                        <p>Giảm giá: ' . $discount_goods . '%</p>
                        <p>Loại hàng: ' . $i . '</p>
                        <div class = "amount">
                            <input type = "number" value = "0" min = 0 id = "my-input"> 
                        </div><br>
                        <div class = "box_button">
                            <form action = "index.php?act=addtocart" method = "post">
                                <input type="hidden" name = "id_goods" value = "' . $id_goods . '">
                                <input type="hidden" name = "name_goods" value = "' . $name_goods . '">
                                <input type="hidden" name = "image_goods" value = "' . $image_goods . '">
                                <input type="hidden" name = "price_goods" value = "' . $price_goods . '">
                                <input id="addcart" type="submit" name = "addtocart" value = "Thêm vào giỏ hàng">
                            </form>
                            <a href = "#">Mua</a>
                        </div>
                        <p>Mô tả sản phẩm: <i> ' . $describe_goods . ' </i> </p>
                    ';
                ?>
            </div>
        </div>

    </div>
    <div class="container--home--comment">
        <div class="container--home--comment--screen">
            <div class="container--home--comment--screen--title">
                <h2>Bình luận</h2>
            </div>
            <div class="container--home--comment--screen--box" id="binhluan">
                <script>
                    $(document).ready(function() {
                        $("#binhluan").load("view/binhluan/formbinhluan.php", {
                            id_goods: <?= $id_goods ?>
                        });
                    });
                </script>
            </div>
        </div>
    </div>
    <div class="container--home--same_kind">
        <div class="container--home--same_kind--title">
            <h2>Sản phẩm cùng loại</h2>
        </div>
        <br>
        <div class="container--home--same_kind--goods">
            <?php
            foreach ($san_pham_cung_loai as $san_pham_cung_loai) {
                extract($san_pham_cung_loai);
                $linksp = "index.php?act=sanphamct&id_goods=" . $id_goods;
                echo '
                <a href="' . $linksp . '">
                    <ion-icon name="play-circle-outline"></ion-icon> ' . $name_goods . '
                </a>
                ';
            }
            ?>
            <br>
        </div>
    </div>
</div>
<style>
    #addcart {
        padding: 0.3rem 1rem;
        border: none;
        background: pink;
    }
</style>