jQuery(document).ready(function($) {
    /* Toggle Element */
    function twr_admin_bnt_show( $button, $area_element ){
        $button.on('click', function() {
            var inputCheckbox = $area_element.find('.trw_table_tr input[type="checkbox"]');
            if(inputCheckbox.prop("checked") === true){
                inputCheckbox.prop('checked', false)
            } else {
                inputCheckbox.prop('checked', true)
            }
        });
    }
    twr_admin_bnt_show( $(".trw_select_widgeta"), $("#twr_basics") );
    
});