<!-- ********************* CSS ***************************  -->
<link rel="stylesheet" href="../content/css/add-Sanpham.css">
<link rel="stylesheet" href="../content/css/email.css">

<div class="Admin--content">
    <div class="Admin--content--container">
        <div class="Admin--content--container--title">
            <h1>Gửi email</h1>
        </div>
        <div class="Admin--content--container--form_email">

            <form action="index.php?act=sendEmail" method="post" id="contact">
                <input type="text" placeholder="Họ và tên" name="name" tabindex="1" autofocus require> <br>
                <input type="email" placeholder="Email" name="email" tabindex="2" require> <br>
                <input type="text" placeholder="Nội dung" name="tel" tabindex="3" require> <br>
                <input type="email" placeholder="Tới" name="toEmail" tabindex="4" require> <br>
                <button type="submit" name="submit">Gửi email</button>
            </form>
        </div>
    </div>
</div>