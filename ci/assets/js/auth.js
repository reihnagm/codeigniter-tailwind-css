var global_func;

(function ($) {
    'use strict';
    $(function() {
        global_func = function()
        {
            $(document).on("click","#form-submit-sign-up", function() {
                alert('test');
            });
        }
    });
})(jQuery);
