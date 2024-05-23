$(document).ready(function () {
    $('.next-btn').click(function(e) {
        e.preventDefault(); 
        
        var email = $('#email').val(); 
        $.ajax({
            url: loginauthenticate,
            method: 'POST',
            data: { 
                Email: email,
                _token: csrfToken
            },
            success: function(response) {
                if (response.status === 'success') {
                    $('.password-input').show();
                    $('.next-btn').hide();
                    $('.reqisterlink').hide();
                    $('.login-input').show();
                    $('.error-message').hide(); 
                } else if (response.status === 'not_authorized') {
                    $('.error-message').text('Invalid Username.').show();
                    
                } else if (response.status === 'not_approved_by_NSH') {
                    $('.error-message').text('Registration is under review.').show();
                    
                } else if (response.status === 'pending_verification') {
                    $('.error-message').text('Your verification is pending.').show();
                    
                } else if (response.status === 'invalid_credentials') {
                    $('.error-message').text('Invalid credentials.').show();
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });

    // Add event listener for login button
    $('.login-input').click(function(e) {
        e.preventDefault();
        var email = $('#email').val();
        var password = $('#password').val();
        if (password) {
            $.ajax({
                url: login_check,
                method: 'POST',
                data: { 
                    Email: email,
                    Password: password,
                    _token: csrfToken
                },
                success: function(response) {
                    if (response.status === 'success') {
                        $('.spinner-border').show();
                        $('.spinner_overlay').show();
                        window.location.href = response.redirect; 

                    } else if (response.status === 'wrong_password') {
                        $('.error-message1').text('Invalid Password.').show();
 
                    } else if (response.status === 'no_password') {
                        $('.error-message1').text('User is not verified.').show();
                    }
                    else if (response.status === 'not_authorized') {
                        $('.error-message1').text('Invalid Username.').show();
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
    
    //  "Forgot Password" link
    $('#forgot-password-link').click(function(e) 
    {
    e.preventDefault();
    window.location.href = forgetPasswordRoute
    });
   
});


setTimeout(function() {
    var flashMessage = document.getElementById('flash-message');
    if (flashMessage) { 
        flashMessage.style.display = 'none';
    }
}, 5000);

