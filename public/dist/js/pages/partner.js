$(document).ready(function ()
{   

     $('[data-card-widget="collapse"]').click(function(){
        var buttonGroup = $('.button-group');
        if (buttonGroup.is(':visible')) {
            buttonGroup.hide();
        } else {
            buttonGroup.show();
        }
    });

    // hide flash message after 2 seconds
    setTimeout(function() {
        var flashMessage = document.getElementById('flash-message');
        if (flashMessage) { 
            flashMessage.style.display = 'none';
        }
    }, 2000);

    // Refresh
    $('#refresh-btn').on('click', function() {
        var currentUrl = window.location.href;
        var updatedUrl = currentUrl.split('?')[0];
        window.location.href = updatedUrl;
    });
    
    // Handle filter dropdown change event
    var filterValue = $('#approval_status_filter').data('filter');
    $('#approval_status_filter').on('change', function() {
        filterValue = $(this).val();
        window.location.href = partnerUrl + "?approval_status=" + filterValue;
    });


    //RM Users
    $("#updateTeamMemberButton").click(function() {
        $("#mainButtonRM").hide();
        $("#secondaryButtonsRM").show();
    });


    // add RMuser 
    $("#secondaryButtonsRM button").click(function() {
        
        var selectedUserId = $("#rm-dropdown").val();
        if (selectedUserId) {
            var requestData = {
                user_id: selectedUserId,
                companyId: companyId,
                _token: csrfToken,
            };
            
            var url = "/partner/rm/store/" + companyId;
            $.ajax({
                url: url,
                method: "POST",
                data: requestData,
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') 
                    {
                        location.reload();
                        $('.spinner-border').show();
                        $('.spinner_overlay').show();
                        CheckAssignRms();
                        $("#mainButtonRM").show();
                        $("#secondaryButtonsRM").hide();
                        $("#rm-user").html('<option>' + response.selectedvalue  +  '</option>');
                  
                    } else if (response.status === 'rm_bdm_cannot_create') {
                        $('.error-message3').text('Cannot Create Same RM').show();
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    var errorMessage = xhr.responseJSON.message;
                    $('.error-message2').text(errorMessage).show();
                    
                }
            });
        }
    });

    //check that RM assign or not
    CheckAssignRms();
    function CheckAssignRms() 
    {
        $.ajax({
            url:partnerRMcheck,
            type: 'GET',
            success: function(response) {
                if (response.status === 'success'){   
                    $("#bdmUserList").show();
                }
                else if (response.status === 'error') {
                    $("#bdmUserList").hide(); 
                }
            },
            error: function(xhr, status, error) {
                   
        }
        });
    }


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
                companyId: companyId,
                _token: csrfToken,
            };
           var url = "/partner/store/" + companyId; 
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
    });

    //delete Bdm Partner
    $(document).on('click', '.confirm-button', function(e) {
        e.preventDefault();
        var button = $(this);
        var userId = button.data('user-id');
        var deletePartnerBdmUrl = button.data('delete-url');
      
        var csrfToken = button.data('csrf-token');
    
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
                    url: deletePartnerBdmUrl,
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


