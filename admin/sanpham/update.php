           <?php
            if (is_array($sanpham)) {
                extract($sanpham);
            }
            $hinhpath = "../upload/" . $image_goods;
            if (is_file($hinhpath)) {
                $hinh = "<img src = '" . $hinhpath . "' height = '80'>";
            } else {
                $hinh = "no photo";
            }
            ?>
           <!-- ---- CONTENT ----  -->
           <div class="Admin--content">
               <div class="Admin--content--container">
                   <div class="Admin--content--container--title">
                       <h1>Cập nhật sản phẩm</h1>
                   </div>
                   <div class="Admin--content--container--form">
                       <form action="index.php?act=updatesp" method="post" enctype="multipart/form-data">
                           <div class="Admin--content--container--form--group">
                               <div class="Admin--content--container--form--box">
                                   <label for="">Danh mục sản phẩm</label> <br>
                                   <select name="id_type" id="">
                                       <?php
                                        foreach ($listdanhmuc as $danhmuc) {
                                            extract($danhmuc);
                                            if ($id_type == $id_type) $s = "selected";
                                            $s = "";
                                            echo '<option value="' . $id_type . '" "' . $s . '">' . $name_type . '</option>';
                                        }
                                        ?>

                                   </select>
                               </div>
                               <div class="Admin--content--container--form--box">
                                   <label for="">Tên sản phẩm</label> <br>
                                   <input type="text" name="name_goods" value="<?= $name_goods ?>" required>
                               </div>
                           </div>
                           <div class="Admin--content--container--form--group">
                               <div class="Admin--content--container--form--box">
                                   <label for="">Giá sản phẩm</label> <br>
                                   <input type="text" name="price_goods" value="<?= $price_goods ?>" required>
                               </div>
                               <div class="Admin--content--container--form--box">
                                   <label for="">Giảm giá (%)</label> <br>
                                   <input type="text" name="discount_goods" value="<?= $discount_goods ?>" required>
                               </div>
                           </div>
                           <div class="Admin--content--container--form--group">
                               <div class="Admin--content--container--form--box">
                                   <label for="">Ảnh sản phẩm</label> <br>
                                   <input type="file" name="image_goods" required>
                                   <?= $hinh ?>
                               </div>
                               <div class="Admin--content--container--form--box">
                                   <label for="">Ngày nhập sản phẩm</label> <br>
                                   <input type="date" name="dayAdd_goods" value="<?= $dayAdd_goods ?>" required>
                               </div>
                           </div>
                           <div class="Admin--content--container--form--group">
                               <div class="Admin--content--container--form--box">
                                   <label for="">Mô tả sản phẩm</label> <br>
                                   <textarea required name="describe_goods" id="" cols="60" rows="5"><?= $describe_goods ?></textarea>
                               </div>
                               <div class="Admin--content--container--form--box">
                                   <label for="">Sản phẩm đặc biệt</label> <br>
                                   <select name="especially_goods" id="">
                                       <option value="1">Đặc biệt</option>
                                       <option value="0">Không đặc biệt</option>
                                   </select>
                               </div>
                           </div>

                           <div class="Admin--content--container--form--button">
                               <input type="hidden" name="id_goods" value="<?= $id_goods ?>">
                               <input type="submit" name="capnhat" value="CẬP NHẬT">
                               <input type="reset" value="NHẬP LẠI">
                               <a href="index.php?act=listsp"><input type="button" value="DANH SÁCH"></a>
                           </div>
                           <?php
                            if (isset($thongbao) && ($thongbao != "")) echo $thongbao; ?>
                       </form>
                   </div>
               </div>
           </div>
           </div>
           <!-- ********************* CSS ***************************  -->
           <link rel="stylesheet" href="../content/css/add-Sanpham.css">