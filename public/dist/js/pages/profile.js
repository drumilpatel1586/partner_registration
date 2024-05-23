$(document).ready(function () {
    $('[data-card-widget="collapse"]').click(function(){
        var buttonGroup = $('.button-group');
        if (buttonGroup.is(':visible')) {
            buttonGroup.hide();
        } else {
            buttonGroup.show();
        }
    });

    // Form validation
    $(".profile").validate({
        rules: {
            FirstName: {
                required: true,
                maxlength: 20,
            },
            LastName:{
                required: true,
                maxlength: 20,
            },
            Email: {
                required: true,
                email: true,
                maxlength: 50
            },
            Mobile: {
                required: true,
                minlength: 10,
                maxlength: 10,
                number: true
            },
        },
        messages: {
            FirstName: {
                required: "First name is required",
                maxlength: "First name cannot be more than 20 characters"
            },
            LastName: {
                required: "Last name is required",
                maxlength: "Last name cannot be more than 20 characters"
            },
            Email: {
                required: "Email is required",
                email: "Email must be a valid email address",
                maxlength: "Email cannot be more than 50 characters",
            },
            Mobile: {
                required: "Phone number is required",
                minlength: "Phone number must be of 10 digits"
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


    // Hide flash message after 2 seconds
    setTimeout(function() {
        var flashMessage = document.getElementById('flash-message');
        if (flashMessage) { // Check if the element exists
            flashMessage.style.display = 'none';
        }
    }, 2000);

  
    

    $('.btn-submit-user').click(function(e) {   
        e.preventDefault();
        $("#profile_information").valid();
        redirectUrl = "/user-profile";
        var data = $('#profile_information').serialize();
        var url= "user-profile/" + userId;  
        
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
  
});


