$(document).ready(function () {
    $("#forget_password").validate({
          rules: {
              Email: {
                  required: true,
                  email: true,
                  maxlength: 50
              },
          },
          messages: {
              Email: {
                  required: "Email is required",
                  email: "Email must be a valid email address",
                  maxlength: "Email cannot be more than 50 characters",
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
});


    
//forgot password form submit
$('.forgot-btn').click(function(e) {   
    e.preventDefault();
    $("#forget_password").valid();
    var data = $('#forget_password').serialize();
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
                } else if(response.status === 'error'){
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



setTimeout(function() {
    var flashMessage = document.getElementById('flash-message');
    if (flashMessage) { 
        flashMessage.style.display = 'none';
    }
}, 5000);