@extends('layouts.NSH.app')

@section('content')

    <livewire:city-master>

@endsection

@push('js')
<script>
    $(document).ready(function() {
        $('#searchButton').click(function() {
            var searchText = $('#searchInput').val().toLowerCase();

            $('tbody tr').each(function() {
                var countryName = $(this).find('td:eq(1)').text().toLowerCase();
                var shortName = $(this).find('td:eq(2)').text().toLowerCase();
                var phoneCode = $(this).find('td:eq(3)').text().toLowerCase();

                if (countryName.includes(searchText) || shortName.includes(searchText) ||
                    phoneCode.includes(searchText)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });
</script>
@endpush