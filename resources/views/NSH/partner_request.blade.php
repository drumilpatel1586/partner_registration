@extends('layouts.NSH.app')

@section('content')

    <livewire:n-s-h.partner-req>

@endsection

@push('js')
@if (session()->has('error'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var errorMessage = "{{ session('error') }}";
        if (errorMessage) {
            alert(errorMessage);
        }
    });
</script>
@endif

@if (session()->has('success'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var successMessage = "{{ session('success') }}";
        if (successMessage) {
            alert(successMessage);
        }
    });
</script>
@endif
@endpush