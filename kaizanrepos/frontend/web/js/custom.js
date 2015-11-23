/*$(window).scroll(function(){
    if($(window).scrollTop() > 0){
        $('body').addClass('Fixed');
    }
});
*/

$('#modal-show').modal('show');

var owl = $(".slider-hotel");
owl.owlCarousel({
    itemsCustom : [
        [0, 1],
        [450, 1],
        [600, 1],
        [700, 2],
        [900, 2],
        [1200, 3]
    ],
    navigation : false,
    pagination: true
});

$(window).bind("load resize", function() {
    var lessheight = $('#headerCntr').height() + 40;
    $('.loginBox').css('min-height', $(window).height() - lessheight );
});