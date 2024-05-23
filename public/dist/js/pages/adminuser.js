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
    $(".createUpdate_adminuser").validate({
        rules: {
            FirstName: {
                required: true,
                maxlength: 20,
            },
            LastName:{
                required: true,
                maxlength: 20,
            },
            Role:{
                required: true,
                maxlength: 20,
            },
            Email: {
                required: true,
                email: true,
                maxlength: 50, 
            },
            Mobile: {
                required: true,
                minlength: 10,
                maxlength: 10,
                number: true
            },
            Designation: {
                required: true,
                maxlength: 40
            },
            password: {
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
            FirstName: {
                required: "First name is required",
                maxlength: "First name cannot be more than 20 characters"
            },
            LastName: {
                required: "Last name is required",
                maxlength: "Last name cannot be more than 20 characters"
            },
            Role: {
                required: "Role is required",
                maxlength: "Role  cannot be more than 20 characters"
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
            Designation:{
                required: "Designation is required",
                maxlength: "Designation cannot be more than 40 characters"
            },
            password: {
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


     //Update Form validation
     $(".Update_adminuser").validate({
        rules: {
            FirstName: {
                required: true,
                maxlength: 20,
            },
            LastName:{
                required: true,
                maxlength: 20,
            },
            Mobile: {
                required: true,
                minlength: 10,
                maxlength: 10,
                number: true
            },
            Designation: {
                required: true,
                maxlength: 40
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
            Mobile: {
                required: "Phone number is required",
                minlength: "Phone number must be of 10 digits"
            },
            Designation:{
                required: "Designation is required",
                maxlength: "Designation cannot be more than 40 characters"
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

    // Hide flash message after 2 seconds
    setTimeout(function() {
        var flashMessage = document.getElementById('flash-message');
        if (flashMessage) { 
            flashMessage.style.display = 'none';
        }
    }, 2000);

    //delete admin users
    $(document).on('click', '.confirm-button', function(e) {
        e.preventDefault();
        var button = $(this);
        var userId = button.data('user-id');
        var deleteAdminUserUrl = button.data('delete-url');
    
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
                $.ajax({
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    url: deleteAdminUserUrl,
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

    //on submit click
    $('.btn-submit-user').click(function(e) {   
        e.preventDefault();
        $("#adminuser_information").valid();
        if($("#adminuser_information").valid()){
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
                            var redirect_url = '/adminusers';
                            var data = $('#adminuser_information').serialize();
                            var url= "/adminusers/store"; 
                
                            $.ajax({
                                url: url,
                                method: 'POST',
                                data: data,
                                success: function(response) {
                                    if (response.status === 'success') {
                                        $('.spinner-border').show();
                                        $('.spinner_overlay').show();
                                        window.location.href = redirect_url + '?flash_message=' + encodeURIComponent(response.message) + '&flash_class=' + encodeURIComponent(response.class); 
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
    $('.btn-submit-editadminuser').click(function(e) 
    {   
        e.preventDefault();
        $("#update_adminuser_information").valid();
        //form submit 
        var redirect_url = '/adminusers';
        var data = $('#update_adminuser_information').serialize();
        
        if($("#update_adminuser_information").valid())
        { 
            $.ajax({
                url: url,
                method: 'POST',
                data: data,
                success: function(response) {
                    if (response.status === 'success') {
                        $('.spinner-border').show();
                        $('.spinner_overlay').show();
                        window.location.href = redirect_url + '?flash_message=' + encodeURIComponent(response.message) + '&flash_class=' + encodeURIComponent(response.class); 
                    } else if (response.error === 'error'){
                        window.location.href = redirect_url + '?flash_message=' + encodeURIComponent(response.message) + '&flash_class=' + encodeURIComponent(response.class); 
                    }
                },
                error: function(xhr, status, error) {
                var errorMessage = xhr.responseJSON.message;
                $('.error-message1').text(errorMessage).show();
                }
            });
        }
    });
});



