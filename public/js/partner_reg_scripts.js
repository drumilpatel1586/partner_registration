// {{-- js for captcha --}}
$('#reload').click(function () {
    $.ajax({
        type: 'GET',
        url: 'reloadCaptcha',
        success: function (data) {
            $('.captcha_img span').html(data.captcha);
        }
    })
});

// {{-- js for selected country flag and mobileno. --}}
document.addEventListener("DOMContentLoaded", function () {
    const countrySelect = document.getElementById('select_country');
    const flagImg = document.getElementById('flagContainer');

    countrySelect.addEventListener('change', function () {
        const selectedOption = countrySelect.options[countrySelect.selectedIndex];
        const countryShortname = selectedOption.getAttribute('data-country-shortname');

        if (countryShortname) {
            // Set the src attribute of the flagImg
            flagImg.src = `https://flagsapi.com/${countryShortname}/shiny/32.png`;
        } else {
            // Clear the src attribute if no country is selected
            flagImg.src = '';
        }
    });
});

// {{-- js for country flag and mobileno. --}}
const input = document.querySelector("#phone");
window.intlTelInput(input, {
    utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@22.0.2/build/js/utils.js",
});

// {{-- js for county state and city filter --}}

// Include this JavaScript in your view or in a separate file
$(document).ready(function () {

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
                        $('select[name="select_state"]').append(
                            '<option value="' + value.id + '">' + value
                                .name + '</option>');
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
                        $('select[name="select_city"]').append(
                            '<option value="' + value.id + '">' + value
                                .name + '</option>');
                    });
                }
            });
        } else {
            $('select[name="select_city"]').empty();
        }
    });
});
