           <?php
            if (is_array($dm)) {
                extract($dm);
            }
            ?>
           <!-- ---- CONTENT ----  -->
           <div class="Admin--content">
               <div class="Admin--content--container">
                   <div class="Admin--content--container--title" style="background-color: #F8EDE3;">
                       <h1>Cập nhật loại hàng</h1>
                   </div>
                   <div class="Admin--content--container--form">
                       <form action="index.php?act=updatedm" method="post">
                           <div class="Admin--content--container--form--box">
                               <label for="">Mã loại</label> <br>
                               <input type="text" name="id_type" disabled required>
                           </div>
                           <div class="Admin--content--container--form--box">
                               <label for="">Tên loại</label> <br>
                               <input required type="text" name="name_type" value="<?php if (isset($name_type) && ($name_type != "")) echo $name_type ?>">
                           </div>
                           <div class="Admin--content--container--form--button" style="margin-bottom: 2rem;">
                               <input type="hidden" name="id_type" value="<?php if (isset($id_type) && ($id_type > 0)) echo $id_type ?>">
                               <input type="submit" name="capnhat" value="CẬP NHẬT">
                               <input type="reset" value="NHẬP LẠI">
                               <a href="index.php?act=listdm"><input type="button" value="DANH SÁCH"></a>
                           </div>
                           <?php
                            if (isset($thongbao) && ($thongbao != "")) echo $thongbao; ?>
                       </form>
                   </div>
               </div>
           </div>
           </div>
           <!-- ********************* CSS ***************************  -->
           <link rel="stylesheet" href="../content/css/add-danhmuc.css">