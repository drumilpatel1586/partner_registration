$(document).ready(function () {
    /*Country Dropdown Change Event*/
    $('#country-dropdown').on('change', function () {
         var idCountry = this.value;
         $("#state-dropdown").html('');
         $.ajax({
         url: fetchStatesUrl,
         type: "POST",
         data: {
              country_id: idCountry,
              _token: csrfToken 
         },
         dataType: 'json',
         success: function (result) {
              $('#state-dropdown').html('<option value="">Select State</option>');
              $.each(result.states, function (key, value) {
                   $("#state-dropdown").append('<option value="' + value
                        .id + '">' + value.name + '</option>');
              });
              $('#city-dropdown').html('<option value="">Select City </option>');
         }
         });
    });

    /*State Dropdown Change Event*/
    $('#state-dropdown').on('change', function () {
         var idState = this.value;
         $("#city-dropdown").html('');
         $.ajax({
         url: fetchCitiesUrl,
         type: "POST",
         data: {
              state_id: idState,
              _token: csrfToken 
         },
         dataType: 'json',
         success: function (res) {
              $('#city-dropdown').html('<option value="">Select City</option>');
              $.each(res.cities, function (key, value) {
                   $("#city-dropdown").append('<option value="' + value
                        .id + '">' + value.name + '</option>');
              });
         }
         });
    });

    $(".create_partner").validate({
          rules: {
              Name: {
                  required: true,
                  maxlength: 20,
              },
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
              JobTitle: {
                  required: true,
                  maxlength: 50
              },
              Address: {
                  required: true,
                  maxlength: 50
              },
              Country: {
                  required: true,
                  maxlength: 40
              },
              city: {
                  required: true,
                  maxlength: 40
              },
              state: {
                  required: true,
                  maxlength: 40
              },
              Website: {
                  required: true,
              },
              Zip: {
                  required: true,
                  minlength: 6,
                  maxlength: 6
              },
              Landline: {
                  required: true,
                  minlength: 10,
                  maxlength: 10
              },
              LandlinePersonal: {
                  required: true,
                  minlength: 10,
                  maxlength: 10
              },
              captcha: {
                  required: true,
              },
          },
          messages: {
              Name: {
                  required: "Company name is required",
                  maxlength: "Company name cannot be more than 20 characters"
              },
              FirstName: {
                  required: "First name is required",
                  maxlength: "First name cannot be more than 20 characters"
              },
              LastName: {
                  required: "Last name is required",
                  maxlength: "Last name cannot be more than 20 characters"
              },
              JobTitle: {
                  required: "Job title is required",
                  maxlength: "Job title cannot be more than 20 characters"
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
              Address: {
                  required: "Address is required",
                  maxlength: "Address cannot not be more than 50 characters"
              },
              Country: {
                  required: "Country is required",
                  maxlength: "Country cannot be more than 40 characters"
              },
              city: {
                  required: "City is required",
                  maxlength: "City cannot be more than 40 characters"
              },
              state: {
                  required: "State is required",
                  maxlength: "State cannot be more than 40 characters"
              },
              zipcode: {
                  required: "Zipcode is required",
                  minlength: "Zipcode must be of 6 digits",
                  maxlength: "Zipcode cannot be more than 6 digits"
              } ,
              Website: {
                  required: "Website is required",
                  minlength: "Website must be of 6 digits",
                  maxlength: "Website cannot be more than 6 digits"
              } ,
              Zip: {
                  required: "Zipcode is required",
                  minlength: "Zipcode must be of 6 digits",
                  maxlength: "Zipcode cannot be more than 6 digits"
              } ,
              Landline: {
                  required: "Landline is required",
                  minlength: "Landline must be of 10 digits",
                  maxlength: "Landline cannot be more than 10 digits"
              } ,
              LandlinePersonal: {
                  required: "Landline is required",
                  minlength: "Landline must be of 10 digits",
                  maxlength: "Landline cannot be more than 10 digits"
              } ,
              captcha: {
                  required: "captcha is required",
              } ,
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

    //create registration
    $('.submitregistration').click(function(e) {   
        e.preventDefault();
        $("#partner_company_information").valid();
        if($("#partner_company_information").valid()){
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
                            var data = $('#partner_company_information').serialize();
                            var url = '/create_registration';
                            var redirectUrl = '/partner_registration';

                            $.ajax({
                                url: url,
                                method: 'POST',
                                data: data,
                                success: function(response) {
                                    if (response.status === 'success') {
                                        $('.spinner-border').show();
                                        $('.spinner_overlay').show();
                                        window.location.href = redirectUrl + '?flash_message=' + encodeURIComponent(response.message) + '&flash_class=' + encodeURIComponent(response.class); 
                                    }
                                    else if (response.status ==='captcha'){
                                        $('.error-message2').text('Please enter a valid Captcha').show();
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



});

$(".btn-refresh").click(function(){
    $.ajax({
         type:'GET',
         url:'/refresh_captcha',
         success:function(data){
        //  $("#span").html(data.captcha);
         $("#span").html('<span>' + data.captcha  +  '</span>');
         
         }
    });
});

setTimeout(function() {
    var flashMessage = document.getElementById('flash-message');
    if (flashMessage) { 
        flashMessage.style.display = 'none';
    }
}, 5000);