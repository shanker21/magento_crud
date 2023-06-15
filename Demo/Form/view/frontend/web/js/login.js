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
                    },
                    password: {
                        required: true,
                    }
                },
                messages: {
                    email_id: {
                        required: "Email can't be empty.",                   
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

                // showpassword
                $(document).ready(function() {
                    $('.show-password-icon').click(function() {
                        var passwordInput = $('#password');
                        var type = passwordInput.attr('type') === 'password' ? 'text' : 'password';
                        passwordInput.attr('type', type);
                        
                        var iconText = type === 'password' ? 'Show Password' : 'Hide Password';
                        $(this).text(iconText);
                    });
                });
    });