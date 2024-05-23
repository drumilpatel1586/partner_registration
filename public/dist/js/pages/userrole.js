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
    $(".userrole").validate({
        rules: {
            Name: {
                required: true,
                maxlength: 20,
            },
        },
        messages: {
            Name: {
                required: "Role Name is required",
                maxlength: "Role Name cannot be more than 10 characters"
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

    //delete role
    $(document).on('click', '.confirm-button', function(e) {
        e.preventDefault();
        var button = $(this);
        var userId = button.data('role-id');
        var deleteRoleUrl = button.data('delete-url');
    
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
                    url: deleteRoleUrl,
                    success: function(response) {
                        if (response.status === 'success') {
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
                        } else if (response.status === 'error') {
                            Swal.fire({
                                icon: 'error',
                                title: response.message,
                                confirmButtonText: 'Ok',
                                customClass: {
                                    confirmButton: 'btn-lg btn-primary', 
                                    cancelButton: 'btn-lg btn-secondary' 
                                }
                            }).then((result) => {
                                window.location.reload(); 
                            });
                        }
                       
                    },
                    error: function(xhr, textStatus, error ) {
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
   
    //create role
    $('.btn-submit-user').click(function(e) {   
        e.preventDefault();
        $("#user_information").valid();
        var data = $('#user_information').serialize();
        url= "/user-role/store";  

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
    
    //edit role
    $('.btn-submit-edituserRole').click(function(e) {   
        e.preventDefault();
        $("#userrole_edit_information").valid();
        var data = $('#userrole_edit_information').serialize();

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


