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
    $(".createUpdate_user").validate({
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
            Role: {
                required: true,
                maxlength: 40
            },
            Deal: {
                required: true,
                maxlength: 40
            },
            Designation: {
                required: true,
                maxlength: 40
            }
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
            Role: {
                required: "Role is required",
                maxlength: "Role cannot be more than 40 characters"
            },
            Deal: {
                required: "Deal is required",
                maxlength: "Deal cannot be more than 40 characters"
            },
            Designation:{
                required: "Designation is required",
                maxlength: "Designation cannot be more than 40 characters"
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


    // Hide flash message after 2 seconds
    setTimeout(function() {
        var flashMessage = document.getElementById('flash-message');
        if (flashMessage) { // Check if the element exists
            flashMessage.style.display = 'none';
        }
    }, 2000);


    $(document).on('click', '.confirm-button', function(e) {
        e.preventDefault();
        var button = $(this);
        var userId = button.data('user-id');
        var deleteUserUrl = button.data('delete-url');
    
        Swal.fire({
            icon: 'warning',
            title: 'Are you sure you want to delete this record?',
            showDenyButton: false,
            showCancelButton: true,
            confirmButtonText: 'Yes',
            customClass: {
                confirmButton: 'btn-lg btn-primary', 
                cancelButton: 'btn-lg btn-secondary' 
            }
           
        }).then((result) => {
            if (result.isConfirmed) {
                // Proceed with deletion
                $.ajax({
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    url: deleteUserUrl,
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: response.message,
                            showDenyButton: false,
                            showCancelButton: false,
                            confirmButtonText: 'Ok',
                            customClass: {
                                confirmButton: 'btn-lg btn-primary', 
                                cancelButton: 'btn-lg btn-secondary' 
                            }
                        }).then((result) => {
                            window.location.reload(); 
                        });
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Something went wrong. Please try again later.'
                        });
                    }
                });
            }
        });
    });

    //on submit create 
    $('.btn-submit-adduser').click(function(e) {   
        e.preventDefault();
        $("#user_information").valid();
        if($("#user_information").valid()){
            var email = $('#Email').val();
            if(email) {
                $.ajax({
                    url: checkEmailvalid,
                    method: 'POST',
                    data: { 
                        Email: email,
                        _token: csrfToken
                    },
                    success: function(response) {
                        if (response.status === 'email_exist') {
                            $('.error-message1').text('Email ID already exists.').show();
                        }
                        else if (response.status === 'email_not_exist') 
                        {
                            //form submit 
                            var redirectUrl ="/users";
                            var data = $('#user_information').serialize();
                            var url= "/users/store";  

                            $.ajax({
                                url: url,
                                method: 'POST',
                                data: data,
                                success: function(response) {
                                    if (response.status === 'success') {
                                        $('.spinner-border').show();
                                        $('.spinner_overlay').show();
                                        window.location.href = redirectUrl + '?flash_message=' + encodeURIComponent(response.message) + '&flash_class=' + encodeURIComponent(response.class); 
                                    } else if (response.status === 'error') {
                                        window.location.href = redirectUrl + '?flash_message=' + encodeURIComponent(response.message) + '&flash_class=' + encodeURIComponent(response.class); 
                                    }
                                },
                                error: function(xhr, status, error) {
                                var errorMessage = xhr.responseJSON.message;
                                $('.error-message1').text(errorMessage).show();
                                }
                            });
            
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


    //on submit update
    $('.btn-submit-edituser').click(function(e) {   
        e.preventDefault();
        $("#edit_user_information").valid();
        var data = $('#edit_user_information').serialize(); 
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
                    } else if (response.status === 'error') {
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


