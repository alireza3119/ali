</div>
<div class="footer">
    <div class="wrapper">
        <div class="section group">
            <div class="col_1_of_4 span_1_of_4">
                <h4>تماس با ما</h4>
                <ul>
                    <li><a href="#">درباره ما</a></li>
                    <li><a href="#">خدمات مشتری</a></li>
                    <li><a href="#"><span>تماس با ما</span></a></li>
                </ul>
            </div>
            <div class="col_1_of_4 span_1_of_4">
                <h4>چگونه خرید کنیم</h4>
                <ul>
                    <li><a href="about.php">درباره ما</a></li>
                    <li><a href="faq.php">خدمات به مشتری</a></li>
                    <li><a href="contact.php"><span>نقشه سایت</span></a></li>
                </ul>
            </div>
            <div class="col_1_of_4 span_1_of_4">
                <h4>حساب من</h4>
                <ul>
                    <li><a href="contact.php">ورود</a></li>
                    <li><a href="index.php">سبد خرید </a></li>
                    <li><a href="faq.php">کمک</a></li>
                </ul>
            </div>
            <div class="col_1_of_4 span_1_of_4">
                <h4>تماس با ما</h4>
                <ul>
                    <li><span>028-3522-7809</span></li>
                    <li><span>0912-181-9791</span></li>
                </ul>
                <div class="social-icons">
                    <h4>ما را دنبال کنید</h4>
                    <ul>
                        <li class="facebook"><a href="#" target="_blank"> </a></li>
                        <li class="twitter"><a href="#" target="_blank"> </a></li>
                        <li class="googleplus"><a href="#" target="_blank"> </a></li>
                        <li class="contact"><a href="#" target="_blank"> </a></li>
                        <div class="clear"></div>
                    </ul>
                </div>
            </div>
        </div>
        <div class="copy_right">
            <p>تمام حقوق این سایت متعلق به شرکت کامبیوتری بارسیان می باشد </p>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        /*
         var defaults = {
         containerID: 'toTop', // fading element id
         containerHoverID: 'toTopHover', // fading element hover id
         scrollSpeed: 1200,
         easingType: 'linear'
         };
         */

        $().UItoTop({ easingType: 'easeOutQuart' });

    });
</script>
<a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
<link href="css/flexslider.css" rel='stylesheet' type='text/css' />
<script defer src="js/jquery.flexslider.js"></script>
<script type="text/javascript">
    $(function(){
        SyntaxHighlighter.all();
    });
    $(window).load(function(){
        $('.flexslider').flexslider({
            animation: "slide",
            start: function(slider){
                $('body').removeClass('loading');
            }
        });
    });
</script>
</body>
</html>
