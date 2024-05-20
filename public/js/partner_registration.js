// js for captcha
$(document).ready(function () {
    $('#reload').click(function () {
        $.ajax({
            type: 'GET',
            url: 'reloadCaptcha',
            success: function (data) {
                $('.captcha_img span').html(data.captcha);
            }
        });
    });


    // js for county code 
    const countrySelect = document.getElementById('select_country');
    const countryCodeSpan = document.getElementById('countrycode');

    countrySelect.addEventListener('change', function () {
        const selectedOption = countrySelect.options[countrySelect.selectedIndex];
        const countryPhoneCode = selectedOption.getAttribute('data-country-phonecode');
        if (countryPhoneCode) {
            // Set the text content of the countryCodeSpan
            // countryCodeSpan.textContent = countryPhoneCode;
            countryCodeSpan.textContent = `+${countryPhoneCode}`;
        } else {
            // Default value if no country is selected
            countryCodeSpan.textContent = '+91';
        }
    });


    // js for county state and city filter
    $('select[name="select_country"]').change(function () {
        var country_id = $(this).val();
        if (country_id) {
            $.ajax({
                url: '/states/' + country_id,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $('select[name="select_state"]').empty();
                    $.each(data, function (key, value) {
                        $('select[name="select_state"]').append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            });
        } else {
            $('select[name="select_state"]').empty();
        }
    });

    $('select[name="select_state"]').change(function () {
        var state_id = $(this).val();
        if (state_id) {
            $.ajax({
                url: '/cities/' + state_id,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $('select[name="select_city"]').empty();
                    $.each(data, function (key, value) {
                        $('select[name="select_city"]').append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            });
        } else {
            $('select[name="select_city"]').empty();
        }
    });

});
