<!-- ************************* FOOTER ******************** -->
<div class="footer container--footer">
    <div class="footer__top">
        <div class="footer__introduce">
            <div class="footer__introduce__title">
                <div class="footer__introduce__title__logo">
                    <h3>Petrichor</h3>
                </div>
                <p class="footer__title__candle">candle</p>
            </div>
            <div class="footer__introduce__content">
                <p>Thương hiệu bán nến nhức nách hàng đầu việt nam
                    chúng đảm bảo hứa suông với bạn là sản phẩm của
                    chúng tạm ổn.
                </p>
            </div>
            <div class="footer__introduce__social">
                <ion-icon name="logo-facebook"></ion-icon>
                <ion-icon name="logo-instagram"></ion-icon>
                <ion-icon name="logo-pinterest"></ion-icon>
                <ion-icon name="logo-youtube"></ion-icon>
                <ion-icon name="logo-discord"></ion-icon>
            </div>
        </div>
        <div class="footer__job">
            <p class="footer__job__title">Sự nghiệp</p>
            <div class="footer__job__content">
                <p>Cơ hội</p>
                <p>Công việc</p>
                <p>Câu hỏi</p>
            </div>
        </div>
        <div class="footer__help">
            <p class="footer__help__title">
                Hỗ trợ
            </p>
            <div class="footer__help__content">
                <p>Về chúng tôi</p>
                <p>Chúng tôi làm gì</p>
                <p>Gặp gỡ</p>
                <p>Trang</p>
                <p>Liên kết</p>
            </div>
        </div>
        <div class="footer__contact">
            <p class="footer__contact__title">Liên hệ</p>
            <div class="footer__contact__content">
                <p>12 Quang Trung Park, 12 District, Ho Chi Minh City</p>
                <p>petrichorcandle@gmail.com</p>
                <p>candlepetrichor@outlook.com</p>
                <p>+76 485789739</p>
            </div>
        </div>
    </div>
    <div class="footer__bottom">
        <p>Copyright © 2022 by hannie mduyn. All rights reserved.</p>
    </div>
</div>
</div>
</body>
<!-- ********************** SLIDE SHOW ************************* -->
<script>
    let slideIndex = 0;
    showSlides();

    function showSlides() {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {
            slideIndex = 1
        }
        slides[slideIndex - 1].style.display = "block";
        setTimeout(showSlides, 10000); // Change image every 10 seconds
    }
</script>

</html>