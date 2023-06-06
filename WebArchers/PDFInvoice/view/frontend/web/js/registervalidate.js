require([
    'jquery',
    'mage/validation'
], function ($) {
    $('#pdfinvoice-form').validate({
        errorPlacement: function (error, element) {
            error.insertAfter(element);
        },
        rules: {
            first_name: {
                required: true
            },
            last_name: {
                required: true
            },
            email_id: {
                required: true,
                email: true,
                pattern: /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/
            },
            phone_number: {
                required: true,
                pattern: /^[6-9]\d{9}$/
            },
            password: {
                required: true,
                pattern: /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}$/  // Requires one capital letter, one special character, one number, and at least 8 characters
            },
            confirm_password: {
                required: true,
                equalTo: "[name='password']"  // Requires the value to match the password field
            }
        },
        messages: {
            first_name: {
                required: "Please enter your first name."
            },
            last_name: {
                required: "Please enter your last name."
            },
            email_id: {
                required: "Please enter your email address.",
                email: "Please enter a valid email address.",
                pattern: "Email is not valid."
            },
            phone_number: {
                required: "Please enter your phone number.",
                pattern: "Please enter a valid phone number."
            },
            password: {
                required: "Please enter your password",
                pattern: "Please enter a valid password (at least 8 characters with one capital letter, one special character, and one number)."
            },
            confirm_password: {
                required: "Please enter your confirmation password",
                equalTo: "Passwords do not match."
            }   
        } 
    });
        // Instant validation for First Name field
        $('input[name="first_name"]').on('keyup blur', function () {
            $('#first_name_error').text('');
            if (!$('#pdfinvoice-form').validate().element(this)) {
                $('#first_name_error').text('');
            }
        });
        // Instant validation for Last Name field
        $('input[name="last_name"]').on('keyup blur', function () {
            $('#last_name_error').text('');
            if (!$('#pdfinvoice-form').validate().element(this)) {
                $('#last_name_error').text('');
            }
        });
// Instant validation for email Name field
        $('input[name="email_id"]').on('keyup blur', function () {
            $('#email_id_error').text('');
            if (!$('#pdfinvoice-form').validate().element(this)) {
                $('#email_id_error').text('');
            }
        });
// Instant validation for phonu Name field
        $('input[name="phone_number"]').on('keyup blur', function () {
            $('#phone_number_error').text('');
            if (!$('#pdfinvoice-form').validate().element(this)) {
                $('#phone_number_error').text('');
            }
        });
    $('input[name="password"]').on('keyup blur', function () {
            $('#password_error').text('');
            if (!$('#pdfinvoice-form').validate().element(this)) {
                $('#password_error').text('');
            }
        });
        $('input[name="confirm_password"]').on('keyup blur', function () {
            $('#confirm_password_error').text('');
            if (!$('#pdfinvoice-form').validate().element(this)) {
                $('#confirm_password_error').text('');
            }
        });


});
