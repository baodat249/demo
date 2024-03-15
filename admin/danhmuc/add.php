           <!-- ---- CONTENT ----  -->
           <div class="Admin--content">
               <div class="Admin--content--container">
                   <div class="Admin--content--container--title" style="background:#F8EDE3 ;">
                       <h1>Danh mục</h1>
                   </div>
                   <div class="Admin--content--container--form">
                       <form action="index.php?act=adddm" method="post">
                           <div class="Admin--content--container--form--box">
                               <label for="">Mã loại</label> <br>
                               <input type="text" name="id_type" disabled required>
                           </div>
                           <div class="Admin--content--container--form--box">
                               <label for="">Tên loại</label> <br>
                               <input type="text" name="name_type" required>
                           </div>
                           <div class="Admin--content--container--form--button" style="margin-bottom: 2rem;">
                               <input type="submit" name="themmoi" value="THÊM MỚI">
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