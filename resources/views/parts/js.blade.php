<!--Global JavaScript -->
<script src="/js/frontend/jquery/jquery.min.js"></script>
<script src="/js/frontend/popper/popper.min.js"></script>
<script src="/js/frontend/bootstrap/bootstrap.min.js"></script>
<script src="/js/frontend/wow/wow.min.js"></script>
<script src="/js/frontend/owl-carousel/owl.carousel.min.js"></script>

<!-- Plugin JavaScript -->
<script src="/js/frontend/jquery-easing/jquery.easing.min.js"></script>
<script src="/js/frontend/custom.js"></script>

<script type="text/javascript">
    $(document).ready(function(){

        $(window).scroll(function(){
            if ($(this).scrollTop() > 100) {
                $('.scrollup').fadeIn();
            } else {
                $('.scrollup').fadeOut();
            }
        });

        $('.scrollup').click(function(){
            $("html, body").animate({ scrollTop: 0 }, 600);
            return false;
        });

    });
</script>

<!-- Form order service -->
<script type="text/javascript">
    $('#order_service').submit(function(event) {

        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: '/order_service',
            data: $('#order_service').serialize(),
            success: function(data) {
                document.getElementById("order_service").innerHTML =
                    '<h4 style="text-align: center">'+"Спасибо за заказ, наш менеджер скоро с вами свяжется!"+'</h4>'+'<br>';
            },
            error: function(xhr, str){
            }
        });
    });
</script>

<script>
    $('#refresh').on('click',function(){
        var captcha = $('img.captcha-img');
        var config = captcha.data('refresh-config');
        $.ajax({
            method: 'GET',
            url: '/get_captcha/' + config,
        }).done(function (response) {
            captcha.prop('src', response);
        });
    });
</script>