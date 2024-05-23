$(document).ready(function() {

	$('#status').on('change',function (e,data) {    
	  if($(this).is(':checked')) {
	    $(this).val('1');
	  } else {
	    $(this).val('0');
	  }
	});

	var input = document.querySelector("#mob");
  var country_code = document.querySelector("#contact_countrycode");

  var telephoneInput = window.intlTelInput(input,{
    initialCountry:"in",
  });

  
  // set it's initial country code value in hidden input
  country_code.value = telephoneInput.getSelectedCountryData().dialCode;
  
  input.addEventListener('countrychange', function(e) {
    country_code.value = telephoneInput.getSelectedCountryData().dialCode;
  });




  //Validation Country Code With Mobile Number
  var errorMsg = document.querySelector("#error-msg"),
      validMsg = document.querySelector("#valid-msg");

  // Error messages based on the code returned from getValidationError
  var errorMap = [ "Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];
    
  var reset = function() {
    input.classList.remove("error");
    errorMsg.innerHTML = "";
    errorMsg.classList.add("hide");
    validMsg.classList.add("hide");
  };

  // Validate on blur event
  $(input).on('keyup keypress blur change', function() {
      reset();

      if(input.value.trim()){
          if(telephoneInput.isValidNumber()){
              //validMsg.classList.remove("hide");
          }else{
              input.classList.add("error");
              var errorCode = telephoneInput.getValidationError();
              console.log("errorCode : "+errorCode);
              if(errorCode > 0){
                errorMsg.innerHTML = errorMap[errorCode];
                errorMsg.classList.remove("hide");
              }              
          }
      }
      
  });

  // Reset on keyup/change event
  input.addEventListener('keyup keypress blur change', reset);
  input.addEventListener('keyup keypress blur change', reset);
  
  $("#Country").on('change',function(){
    var telephoneInput = window.intlTelInput(input,{
      initialCountry:$(this).val(),
    });

    country_code.value = telephoneInput.getSelectedCountryData().dialCode;
  });
 
  $("#Zip").on('keyup keypress blur change', function() {
    var z = $(this).val();
    if(isNaN(z)==true || z.length >6 ){
      $(this).val("");
    }
  });
    
});
