$(document).ready(function () {
    // Form validation
    $(".createUpdate_adminuser").validate({
        rules: {
            bdmuser: {
                required: true,
                maxlength: 20,
            },
        },
        messages: {
            bdmuser: {
                required: "Bdm User is required",
                maxlength: "Bdm User cannot be more than 20 characters"
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

    // Hide flash message after 3 seconds
    setTimeout(function() {
        var flashMessage = document.getElementById('flash-message');
        if (flashMessage) { 
            flashMessage.style.display = 'none';
        }
    }, 3000);



     //BDM users
     $("#addTeamMemberButton").click(function() {
        $("#mainButton").hide();
        $("#secondaryButtons").show();

    });
    
    // add Bdmuser 
    $("#secondaryButtons button").click(function() {
      
        var selectedUserId = $("#bdm-dropdown").val();
      
        if (selectedUserId) {
            var requestData = {
                user_id: selectedUserId,
                RmId: RmId,
                _token: csrfToken,
            };
           
           var url = "/adminusers/rmbdmusers/store/" + RmId;        
            $.ajax({
                url: url,
                method: "POST",
                data: requestData,
                success: function(response) {
                    if (response.status === 'success') {
                        $('.spinner-border').show();
                        $('.spinner_overlay').show();
                        $('.card-success').html('<div class="alert alert-success">' + response.message + '</div>');

                        // Redirect to partner 
                        setTimeout(function() {
                            window.location.href = redirectUrl;
                        }, 2000);
                    } 
                    else if (response.status === 'error') {
                        $('.error-message2').text(response.message).show();
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    var errorMessage = xhr.responseJSON.message;
                    $('.error-message2').text(errorMessage).show();
                }
            });
        }
        else{
            $('.error-message2').text("Select Bdm Users").show(); 
        }
    });

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
    
});



