@extends('layouts.NSH.app')

@section('content')

    <livewire:state-master>

@endsection

@push('js')
<script>
    $(document).ready(function() {
        $('#searchButton').click(function() {
            var searchText = $('#searchInput').val().toLowerCase();

            $('tbody tr').each(function() {
                var statename = $(this).find('.state').text().toLowerCase();
                var countryname = $(this).find('td:eq(2)').text().toLowerCase();

                if (statename.includes(searchText) || countryname.includes(searchText)){
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });
</script>
@endpush