$(function(){
    $('.star_ul a').hover(function(){
        $(".active-star").removeClass('active-star');
        $(this).addClass('active-star');
        $('.s_result').css('color','#c00').html($(this).attr('title'));
        $("#score").val($(this).attr('name'));
    });
})