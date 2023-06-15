require([
    'jquery',
    'mage/validation'
    ], function ($) {

        $('#catalog-form').validate({
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
        // emailPattern = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/
        },
        phone_number: {
         required: true,
         pattern: /^[6-9]\d{9}$/
        },
        password: {
            required: true,
            maxlength: 8,
            pattern: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/
        },
        'confirm_password': {
            required: true,
            equalTo: "[name='password']"
        }
    },

            messages: {
                first_name: {
                    required: "first name can't be empty."
                },
                 last_name: {
                    required: "last name can't be empty."
                },
                email_id: {
                    required: "email can't be empty.",
                    email: "please enter a valid email address."
                    // emailpattern: "please enter a valid email address."
                },
                phone_number: {
                required: "phone number can't be empty.",
                pattern: "please enter a valid phone number."
                },
                password: {
            required: "Password is required.",
            maxlength: "Password should not exceed 8 characters.",
            pattern: "Password must contain at least one uppercase letter, one lowercase letter, one digit, and one special character."
        },
        'confirm-password': {
            required: "Confirm password is required.",
            // equalTo: "Passwords do not match."
        }
            }
});
// Instant validation for First Name field
$('input[name="first_name"]').on('keyup blur', function () {
    $('#first_name_error').text('');
    if (!$('#catalog-form').validate().element(this)) {
        $('#first_name_error').text('');
    }
});

// Instant validation for Last Name field
$('input[name="last_name"]').on('keyup blur', function () {
    $('#last_name_error').text('');
    if (!$('#catalog-form').validate().element(this)) {
        $('#last_name_error').text('');
    }
});
// Instant validation for email field
$('input[name="email_id"]').on('keyup blur', function () {
    $('#email_id_error').text('');
    if (!$('#catalog-form').validate().element(this)) {
        $('#email_id_error').text('');
    }
});
// Instant validation for phone number field
$('input[name="phone_number"]').on('keyup blur', function () {
    $('#phone_number_error').text('');
    if (!$('#catalog-form').validate().element(this)) {
        $('#phone_number_error').text('');
    }
});
// Instant validation for password field
$('input[name="password"]').on('keyup blur', function () {
    $('#password_error').text('');
    if (!$('#catalog-form').validate().element(this)) {
        $('#password_error').text('');
    }
});

// Instant validation for confirm password field
$('input[name="confirm_password"]').on('keyup blur', function () {
    $('#repassword_error').text('');
    if (!$('#catalog-form').validate().element(this)) {
        $('#repassword_error').text('');
    }
});
});
// Retrieve the password and confirm password fields
var passwordField = document.getElementById('password');
var confirmPasswordField = document.getElementById('confirm_password');

// Add an event listener to the confirm password field
confirmPasswordField.addEventListener('input', function () {
var password = passwordField.value;
var confirmPassword = confirmPasswordField.value;

// Check if the passwords match
if (password !== confirmPassword) {
// Display an error message or perform any desired action
document.getElementById('repassword_error').textContent = "Passwords do not match";
} else {
// Clear the error message or perform any desired action
document.getElementById('repassword_error').textContent = "";
}
});