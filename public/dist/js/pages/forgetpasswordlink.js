$(document).ready(function () {
    $("#forgetpasswordlink").validate({
          rules: {
              Email: {
                  required: true,
                  email: true,
                  maxlength: 50
              },
              Password: {
                required: true,
                maxlength: 20,
            },
            Password_confirmation: {
                required: true,
                equalTo: "#password", 
                maxlength: 20
            },
          },
          messages: {
              Email: {
                  required: "Email is required",
                  email: "Email must be a valid email address",
                  maxlength: "Email cannot be more than 50 characters",
              },
              Password: {
                required: "Password is required",
                maxlength: "Password cannot be more than 20 characters"
            },
            Password_confirmation: {
                required: "Password confirmation is required",
                maxlength: "Password confirmation cannot be more than 20 characters",
                equalTo: "Passwords do not match"
            },
          },
          errorElement: 'span',
         errorPlacement: function (error, element) {
              error.addClass('invalid-feedback');
              element.closest('.form-group').append(error);
         },
         highlight: function (element, errorClass, validClass) {
              $(element).addClass('is-invalid');
         },
         unhighlight: function (element, errorClass, validClass) {
              $(element).removeClass('is-invalid');
         }
      });


      $(".eye-toggle").click(function () {
        var passwordField = $("#Password");
        var eyeIcon = $("#eyePassword");
        if (passwordField.attr("type") === "password") {
            passwordField.attr("type", "text");
            eyeIcon.removeClass("fa-eye").addClass("fa-eye-slash");
        } else {
            passwordField.attr("type", "password");
            eyeIcon.removeClass("fa-eye-slash").addClass("fa-eye");
        }
    });

    $(".eye-toggle_pc").click(function () {
        var passwordField = $("#password-confirm"); 
        var eyeIcon = $("#eyeConfirmPassword");
        if (passwordField.attr("type") === "password") {
            passwordField.attr("type", "text");
            eyeIcon.removeClass("fa-eye").addClass("fa-eye-slash");
        } else {
            passwordField.attr("type", "password");
            eyeIcon.removeClass("fa-eye-slash").addClass("fa-eye");
        }
    });


    
$('.btn-resetPassword').click(function(e) {   
    e.preventDefault();
    $("#forgetpasswordlink").valid();
    var data = $('#forgetpasswordlink').serialize();
    if (data) {
        $.ajax({
            url: url,
            method: 'POST',
            data: data,
            success: function(response) {
                if (response.status === 'success') {
                    $('.spinner-border').show();
                    $('.spinner_overlay').show();
                    window.location.href = redirectUrl + '?flash_message=' + encodeURIComponent(response.message) + '&flash_class=' + encodeURIComponent(response.class); 
                }
                
            },
            error: function(xhr, status, error) {
            var errorMessage = xhr.responseJSON.message;
            $('.error-message1').text(errorMessage).show();
        }
        });
    } else {
       
    }
});  




});

setTimeout(function() {
    var flashMessage = document.getElementById('flash-message');
    if (flashMessage) { // Check if the element exists
        flashMessage.style.display = 'none';
    }
}, 5000);