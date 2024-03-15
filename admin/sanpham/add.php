           <!-- ---- CONTENT ----  -->
           <div class="Admin--content">
               <div class="Admin--content--container">
                   <div class="Admin--content--container--title" style="background-color: #F8EDE3;">
                       <h1>Thêm sản phẩm</h1>
                   </div>
                   <div class="Admin--content--container--form">
                       <form action="index.php?act=addsp" method="post" enctype="multipart/form-data">
                           <div class="Admin--content--container--form--group">
                               <div class="Admin--content--container--form--box">
                                   <label for="">Danh mục sản phẩm</label> <br>
                                   <select name="id_type" id="">
                                       <?php
                                        foreach ($listdanhmuc as $danhmuc) {
                                            extract($danhmuc);
                                            echo '<option value="' . $id_type . '">' . $name_type . '</option>';
                                        }
                                        ?>

                                   </select>
                               </div>
                               <div class="Admin--content--container--form--box">
                                   <label for="">Tên sản phẩm</label> <br>
                                   <input type="text" name="name_goods" required>
                               </div>
                           </div>
                           <div class="Admin--content--container--form--group">
                               <div class="Admin--content--container--form--box">
                                   <label for="">Giá sản phẩm</label> <br>
                                   <input type="text" name="price_goods" required>
                               </div>
                               <div class="Admin--content--container--form--box">
                                   <label for="">Giảm giá (%)</label> <br>
                                   <input type="text" name="discount_goods" required>
                               </div>
                           </div>
                           <div class="Admin--content--container--form--group">
                               <div class="Admin--content--container--form--box">
                                   <label for="">Ảnh sản phẩm</label> <br>
                                   <input type="file" name="image_goods" required>
                               </div>
                               <div class="Admin--content--container--form--box">
                                   <label for="">Ngày nhập sản phẩm</label> <br>
                                   <input type="date" name="dayAdd_goods" required>
                               </div>
                           </div>
                           <div class="Admin--content--container--form--group">
                               <div class="Admin--content--container--form--box">
                                   <label for="">Mô tả sản phẩm</label> <br>
                                   <textarea name="describe_goods" id="" cols="60" rows="10" required></textarea>
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
                               <input type="submit" name="themmoi" value="THÊM MỚI">
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