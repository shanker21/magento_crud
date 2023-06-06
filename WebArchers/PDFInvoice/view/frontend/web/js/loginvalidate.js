require([
    'jquery',
    'mage/validation'
], function ($) {
    $('#login-form').validate({
        errorPlacement: function (error, element) {
            error.insertAfter(element);
        },
        rules: {
            email_id: {
                required: true,
                email: true,
                pattern: /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/
            },
            password: {
                required: true,
            }
        },
        messages: {
            email_id: {
                required: "Email can't be empty.",
                email: "Email is not valid.",
                pattern: "please enter Email is not valid."
            },
            password: {
                required: "password can't be empty.",             
            }
        } 
    });       
        // Instant validation for email Name field
        $('input[name="email_id"]').on('keyup blur', function () {
            $('#email_id_error').text('');
            if (!$('#login-form').validate().element(this)) {
                $('#email_id_error').text('');
            }
        });
        $('input[name="password"]').on('keyup blur', function () {
            $('#password_error').text('');
            if (!$('#login-form').validate().element(this)) {
                $('#password_error').text('');
            }
        });
});