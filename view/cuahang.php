<link rel="stylesheet" href="content/css/CUaHang.css">
<!-- ********************* CỬA HÀNG **********************  -->
<div class="container--shop">
    <!-- ********************* BANNER *******************  -->
    <div class="container--shop--banner">
        <!-- Slideshow container -->
        <div class="slideshow-container">
            <h2>Petrichor_Candle</h2>

            <!-- Full-width images with number and caption text -->
            <div class="mySlides fade">
                <img src="content/image/banner-01.jpg" style="width:100%">
            </div>

            <div class="mySlides fade">
                <img src="content/image/banner-02.jpg" style="width:100%">
            </div>

            <div class="mySlides fade">
                <img src="content/image/banner-06.jpg" style="width:100%">
            </div>

        </div>
        <br>
    </div>
    <div class="container--shop--goods">
        <div class="container--shop--goods--tab">
            <form class="container--shop--goods--tab--search" action="index.php?act=sanpham" method="post">
                <input type="text" placeholder="Tìm kiếm" name="kwy">
                <input type="submit" name="timkiem" value="Tìm Kiếm">
            </form>
            <div class="container--shop--goods--tab--types">
                <h2>Danh mục</h2>
                <?php
                foreach ($dsdm as $dm) {
                    extract($dm);
                    $linkdm = "index.php?act=sanpham&id_type=" . $id_type;
                    echo '
                        <a href="' . $linkdm . '">' . $name_type . '</a>
                    ';
                }
                ?>
            </div>
            <div class="container--shop--goods--tab--top">
                <h2>top 10</h2>
                <?php
                foreach ($dstop10 as $sp) {
                    extract($sp);
                    $linksp = "index.php?act=sanphamct&id_goods=" . $id_goods;
                    $img = $img_path . $image_goods;
                    echo '
                            <div class="container--shop--goods--tab--top--box">
                                <div class="container--shop--goods--tab--top--box--img">
                                    <img src="' . $img . '" alt="" style="width: 100%">
                                </div>
                                <a href="' . $linksp . '">' . $name_goods . '</a>
                            </div>
                    ';
                }
                ?>

            </div>
        </div>
        <div class="container--shop--goods--show">
            <?php
            $i = 0;
            foreach ($spnew as $sp) {
                extract($sp);
                $linksp = "index.php?act=sanphamct&id_goods=" . $id_goods;
                $hinh = $img_path . $image_goods;
                if (($i == 2) || ($i == 5) || ($i == 8)) {
                    $mr = "";
                } else {
                    $mr = "mr";
                }
                echo '
                
                <div class="container--shop--goods--show--product ' . $mr . '">
                    <div class="container--shop--goods--show--product--image">
                        <img src="' . $hinh . '" alt="" width = "100%">
                    </div>
                    <div class="container--shop--goods--show--product--info">
                    <a style = "font-size: 1.5rem;"href="' . $linksp . '">' . $name_goods . '</a>
                        <p style = "font-size: 1rem;">' . $price_goods . '$</p>
                        <form action = "index.php?act=addtocart" method = "post">
                            <input type="hidden" name = "id_goods" value = "' . $id_goods . '">
                            <input type="hidden" name = "name_goods" value = "' . $name_goods . '">
                            <input type="hidden" name = "image_goods" value = "' . $image_goods . '">
                            <input type="hidden" name = "price_goods" value = "' . $price_goods . '">
                            <input type="submit" name = "addtocart" value = "Thêm vào giỏ hàng">
                        </form>
                    </div>
                </div>
                ';
                $i += 1;
            }
            ?>
        </div>
    </div>