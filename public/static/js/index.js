$('.nav-list li a').on('mouseenter', function(){
    $(this).hover(function(){
        $('.common-dropdown').fadeIn();
    });
});
$('#commonDropdown').on('mouseleave',function(){
    $('.common-dropdown').fadeOut();
});
$('.close-icon').click(function (e) {
    e.preventDefault();
    e.stopPropagation();
    $('.common-dropdown').fadeOut();
})
var _height = $(window).height();
$('.common-dropdown').height(_height * 0.7);

$(window).click(function(){
    var elem = event.srcElement ? event.srcElement : event.target;
    while (elem) {
        if (elem.id && elem.id == 'commonDropdown') {
            return;
        }
        elem = elem.parentNode;
    }
    $('#commonDropdown').fadeOut();
});

