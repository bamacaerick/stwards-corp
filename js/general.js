var $ = jQuery;

$(document).ready(function () {
    var $menu = $('.menu');
    var $menuChildren = $('.menu > li.menu-item-has-children')

    if ($menuChildren) {
        $menuChildren.each((index, element) => {
            $(element).on('click', function () { 
                console.log('entra en el click');
                $(this).find('.sub-menu').slideToggle('fast');
            })
        });
    }
});
