$(document).ready(function() {
  $("#owl-example").owlCarousel({
        // Banner
        items : 1,
        itemsCustom : [[2000,1]],
        slideSpeed : 200,
        paginationSpeed : 800,
        rewindSpeed : 1000,

        //Autoplay
        autoPlay : true,
        stopOnHover : true,

        navigation : true,
        navigationText : ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
        rewindNav : true,
        scrollPerPage : false,
    });

});
$(document).ready(function() {
    $("#owl-example-detail").owlCarousel({
        items : 1,
        itemsCustom : [[2000,1]],
        slideSpeed : 200,
        paginationSpeed : 800,
        rewindSpeed : 1000,

        ///Autoplay
        autoPlay : true,
        stopOnHover : true,
        navigation : true,
        navigationText : ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
        rewindNav : true,
        scrollPerPage : false,
    });
});
$(document).ready(function(){
    var current_fs, next_fs, previous_fs,radio; //fieldsets
    var opacity;
    $(".next").click(function(){
        current_fs = $(this).parent();
        next_fs = $(this).parent().next();
        address = $('.address:checked').val();
        if(address != null)
        {
            //console.log(address);
            add=$('#addr').val(address);
            //console.log(add);
            //Add Class Active
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
            //show the next fieldset
            next_fs.show();
            //hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
            step: function(now) {
            // for making fielset appear animation
            opacity = 1 - now;

            current_fs.css({
            'display': 'none',
            'position': 'relative'
            });
            next_fs.css({'opacity': opacity});
            },
            duration: 600
            });
        }else{
            Notiflix.Report.Init({ position:"center-center", fontFamily:"Helvetica", });
            Notiflix.Report.Failure('Lỗi','Vui lòng chọn địa chỉ giao hàng','Tiếp tục');
        }
    });
    //
    $(".previous").click(function(){
    location.reload();
    });
});


