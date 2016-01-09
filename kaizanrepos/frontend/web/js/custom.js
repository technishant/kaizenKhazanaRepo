/*$(window).scroll(function(){
 if($(window).scrollTop() > 0){
 $('body').addClass('Fixed');
 }
 });
 */

var size_li = $('#myList li').size();
x = 10;
$('#myList li:lt(' + x + ')').slideDown('slow');
$('#loadMore').click(function (e) {
    e.preventDefault();
    var n = $("#myList li").size();
    x = (x + 5 <= size_li) ? x + 5 : size_li;
    $('#myList li:lt(' + x + ')').slideDown('slow');
    if (n == x) {
        $(this).hide('slow');
    }
});


var size_li2 = $('#myList2 li').size();
var x2 = 6;
$('#myList2 li:lt(' + x2 + ')').slideDown('slow');
$('#loadMore2').click(function (e) {
    e.preventDefault();
    var n2 = $("#myList2 li").size();
    x2 = (x2 + 3 <= size_li2) ? x2 + 3 : size_li2;
    $('#myList2 li:lt(' + x2 + ')').slideDown('slow');
    if (n2 == x2) {
        $(this).hide('slow');
    }
});


$('#modal-show').modal('show');

$(".slider-product").owlCarousel({
    navigation: true,
    pagination: false,
    slideSpeed : 300,
    paginationSpeed : 400,
    singleItem: true,
    items : 1,
    itemsDesktop : false,
    itemsDesktopSmall : false,
    itemsTablet: false,
    itemsMobile : false
});


$(window).bind("load resize", function () {
    var lessheight = $('#headerCntr').height() + 40;
    $('.loginBox').css('min-height', $(window).height() - lessheight);
});