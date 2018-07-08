$(document).ready(function(){
    $(".order-btn").fancybox();
    $("#f_send").on("click", function(){
        $("#f_contact").fadeOut("fast", function(){
            $(this).before("<p><strong>Заказ оформлен!</strong></p>");
            setTimeout("$.fancybox.close()", 1000);
        });
    });
});