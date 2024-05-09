  <script>
        const input = document.querySelector("#phone");
        window.intlTelInput(input, {
          utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@22.0.2/build/js/utils.js",
        });
      </script>
    <script>
        // Include this JavaScript in your view or in a separate file
        $(document).ready(function() {

            $('select[name="select_country"]').change(function() {
                var country_id = $(this).val();
                if (country_id) {
                    $.ajax({
                        url: '/states/' + country_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="select_state"]').empty();
                            $.each(data, function(key, value) {
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

            $('select[name="select_state"]').change(function() {
                var state_id = $(this).val();
                if (state_id) {
                    $.ajax({
                        url: '/cities/' + state_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="select_city"]').empty();
                            $.each(data, function(key, value) {
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
    </script>