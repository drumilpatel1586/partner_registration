$(document).ready(function () {
    $(".create_password_reset").validate({
          rules: {
              Password: {
                required: true,
                minlength: 6
            },
          },
          messages: {
            Password: {
                required: "Please enter a password",
                minlength: "Your password must be at least 6 characters long"
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


    // for validation
    $('.btn-passwordreset').click(function(e) {   
        e.preventDefault();
        $("#password_reset").valid();
        if($("#password_reset").valid()){
            var data = $('#password_reset').serialize();
            if (data) {
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: data,
                    success: function(response) {
                        if (response.status === 'success') {
                            $('.spinner-border').show();
                            $('.spinner_overlay').show();
                            window.location.href = redirectUrl; 
                        }
                        
                    },
                    error: function(xhr, status, error) {
                        var errorMessage = xhr.responseJSON.message;
                        $('.error-message1').text(errorMessage).show();
                }
                });
            } 
        }
       
    });  
});

setTimeout(function() {
    var flashMessage = document.getElementById('flash-message');
    if (flashMessage) { 
        flashMessage.style.display = 'none';
    }
}, 5000);