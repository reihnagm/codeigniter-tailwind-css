var sign_in;
var sign_up;

(function ($) {
    'use strict';
    $(function() {
        // $(document).on("click","#form-submit-sign-up", function(evt) {
        //     evt.preventDefault();
        // });
        sign_in = function()
        {
            alert('sign in');
        }

        sign_up = function()
        {

        }
    });

})(jQuery);

function sign_in(event)
{
    event.preventDefault();
    sign_in();
}

function sign_up(event)
{
    event.preventDefault();
    sign_up();
}
