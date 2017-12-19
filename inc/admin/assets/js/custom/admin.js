(function($) {
    'use strict';


    $(function() {
        var $styledCheckboxes = $('.es-trendy-switch-input');

        $( window ).trigger( 'resize' );

        if ($styledCheckboxes.length) {
            $styledCheckboxes.esCheckbox({
                labelTrue: Es_Trendy.tr.yes,
                labelFalse: Es_Trendy.tr.no
            });
        }

        var $tabs = $('.nav-tab-wrapper');

        if ($tabs.length) {
            $tabs.tabs();
        }

        $('.js-colorpicker').wpColorPicker();

    });
})(jQuery);
