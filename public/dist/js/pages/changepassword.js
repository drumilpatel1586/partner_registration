$(document).ready(function () {
    $('[data-card-widget="collapse"]').click(function(){
        var buttonGroup = $('.button-group');
        if (buttonGroup.is(':visible')) {
            buttonGroup.hide();
        } else {
            buttonGroup.show();
        }
    });

    $("#change-password").validate({
          rules: {
            old_password: {
                required: true,
                maxlength: 20,
            },
            new_password: {
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
            old_password: {
                required: " Current Password is required",
                maxlength: " Current Password cannot be more than 20 characters"
            },
            new_password: {
                required: "Password is required",
                maxlength: "Password cannot be more than 20 characters",
                equalTo: "Passwords do not match"
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


      $(".eye-toggleOld").click(function () {
          var passwordField = $("#old_password");
          var eyeiconO = $("#eyeOldPassword");
        if (passwordField.attr("type") === "password") {
            passwordField.attr("type", "text");
            eyeiconO.removeClass("fa-eye-slash").addClass("fa-eye");
        } else {
            passwordField.attr("type", "password");
            eyeiconO.removeClass("fa-eye").addClass("fa-eye-slash");
        }
      });


      $(".eye-toggle_p").click(function () {
        var passwordField = $("#password");
        var eyeiconP = $("#eyePassword");
        if (passwordField.attr("type") === "password") {
            passwordField.attr("type", "text");
            eyeiconP.removeClass("fa-eye-slash").addClass("fa-eye");
        } else {
            passwordField.attr("type", "password");
            eyeiconP.removeClass("fa-eye").addClass("fa-eye-slash");
        }
    });

    $(".eye-toggle_pc1").click(function () {
        var passwordField = $("#password-confirm"); 
        var eyeiconPC = $("#eyeConfirmPassword");
        if (passwordField.attr("type") === "password") {
            passwordField.attr("type", "text");
            eyeiconPC.removeClass("fa-eye-slash").addClass("fa-eye");
        } else {
            passwordField.attr("type", "password");
            eyeiconPC.removeClass("fa-eye").addClass("fa-eye-slash");
        }
    });

    // $('.btn-submit-user').click(function() {
    //     $('#change-password').submit();
    // });

    $('.btn-submit-user').click(function(e) {   
        e.preventDefault();
        $("#change-password").valid();  //validation
        var data = $('#change-password').serialize();
        url= "/update-password";  

        if (data) {
            $.ajax({
                url: url,
                method: 'POST',
                data: data,
                success: function(response) {
                    if (response.status === 'success') {
                        $('.spinner-border').show();
                        $('.spinner_overlay').show();
                        window.location.href = response.redirect + '?flash_message=' + encodeURIComponent(response.message) + '&flash_class=' + encodeURIComponent(response.class); 
                    }else if(response.status === 'error'){
                        window.location.href = response.redirect + '?flash_message=' + encodeURIComponent(response.message) + '&flash_class=' + encodeURIComponent(response.class); 
                    } else if(response.status === 'invalid_token'){
                        window.location.href = response.redirect + '?flash_message=' + encodeURIComponent(response.message) + '&flash_class=' + encodeURIComponent(response.class);
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
    if (flashMessage) { 
        flashMessage.style.display = 'none';
    }
}, 3000);