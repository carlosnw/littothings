// Validation for the blog comments form
// -------------------------------------------------

function commentsFormValidation() {

    // Define jQuery (Wordpress uses no conflict)
    var $ = jQuery;

    var $target = $('.js-commentform');

    $target.validate({

        rules: {
            author: {
                required: true,
                minlength: 2
            },

            email: {
                required: true,
                email: true
            },

            comment: {
                required: true,
                minlength: 10
            }
        },

        messages: {
            author: "Please fill the required field",
            email: "Please enter a valid email address.",
            comment: "Please fill the required field"
        },

        errorElement: "div",
        errorPlacement: function(error, element) {
            element.after(error);
        }

    });
}
jQuery(document).ready(commentsFormValidation);