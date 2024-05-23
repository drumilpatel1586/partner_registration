$(document).ready(function ()
{
    $(".manage_user").validate({
        rules: {
            old_rmuser: {
                required: true,
                maxlength: 20,
            },
            new_rmuser:{
                required: true,
                maxlength: 20,
            }
        },
        messages: {
            old_rmuser: {
                required: "Old User is required",
            },
            new_rmuser: {
                required: "New User is required",
            }
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


    $(".manage_bdmuser").validate({
        rules: {
            old_bdmuser: {
                required: true,
                maxlength: 20,
            },
            new_bdmuser:{
                required: true,
                maxlength: 20,
            }
        },
        messages: {
            old_bdmuser: {
                required: "Old User is required",
            },
            new_bdmuser: {
                required: "New User is required",
            }
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
    
    // hide flash message after 2 seconds
    setTimeout(function() {
        var flashMessage = document.getElementById('flash-message');
        if (flashMessage) { 
            flashMessage.style.display = 'none';
        }
    }, 2000);

    //RM form submit 
    $('.btn-submit-user').click(function(e) {   
        e.preventDefault();
        $("#user_information").valid();
        var data = $('#user_information').serialize();
        url= "/rm-user/store";  

        if ( $("#user_information").valid()) {
            $.ajax({
                url: url,
                method: 'POST',
                data: data,
                success: function(response) {
                    if (response.status === 'success') {
                        $('.spinner-border').show();
                        $('.spinner_overlay').show();
                        window.location.href = redirectUrl + '?flash_message=' + encodeURIComponent(response.message) + '&flash_class=' + encodeURIComponent(response.class); 
                    }else if(response.status === 'error'){
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

     //BDM form submit 
     $('.btn-submit-bdmuser').click(function(e) {   
        e.preventDefault();
        $("#bdmuser_information").valid();
        var data = $('#bdmuser_information').serialize();
        url= "/bdm-user/store";  

        if ( $("#bdmuser_information").valid()) {
            $.ajax({
                url: url,
                method: 'POST',
                data: data,
                success: function(response) {
                    if (response.status === 'success') {
                        $('.spinner-border').show();
                        $('.spinner_overlay').show();
                        window.location.href = redirectUrl + '?flash_message=' + encodeURIComponent(response.message) + '&flash_class=' + encodeURIComponent(response.class); 
                    }else if(response.status === 'error'){
                        window.location.href = redirectUrl + '?flash_message=' + encodeURIComponent(response.message) + '&flash_class=' + encodeURIComponent(response.class);
                    }
                    
                },
                error: function(xhr, status, error) {
                    var errorMessage = xhr.responseJSON.message;
                    $('.error-message2').text(errorMessage).show();
            }
            });
        } else {
           
        }
    });  

});


