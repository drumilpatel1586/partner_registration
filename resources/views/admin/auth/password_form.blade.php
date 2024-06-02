@extends('admin.auth.layouts')
@section('content')
<div class="login-box">
    <div class="login-box-body">
        <!-- Admin Portal Login -->
        <div class="panel panel-body login-form">
            <div class="text-center">
                <div class="icon-object text-center" style="border:none !important;">
                    <div class="login-logo">
                        <img src="{{ asset('dist/images/logo.png') }}" class="qntmlogo">
                    </div>
                </div>
            </div>

            @if(request()->has('flash_message'))
            <div id="flash-message" class="alert {{ request()->get('flash_class') }}">
                {{ request()->get('flash_message') }}
            </div>
            @endif

            <div class="d-flex justify-content-center">
                <div class="spinner-border" id="loader" style="display:none;" role="status">
                    <span class="sr-only"></span>
                </div>
                <div class="spinner_overlay" style="display: none;"></div>
            </div>
            <div class="container1">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card1">
                            <div class="card-body">
                                <p class="login-box-msg partner.qntmnet.com" id="CloudLoginP"><i class="fa fa-lock">&nbsp;</i><label style="color:#002855 !important;"> Set Password </label></p>
                                <form class="create_password_reset" method="POST" action="{{ route('set.password') }}" id="password_reset">
                                    @csrf
                                    <div class="step2">
                                        <div class="form-group has-feedback password-input">
                                            <input type="hidden" name="encrypted_token" value="{{ $encrypted_token }}"> <!-- verification token -->
                                            <input type="password" name="Password" id="password" class="form-control" placeholder="Password">
                                            @if ($errors->has('Password'))
                                            <span class="text-danger">{{ $errors->first('Password') }}</span>
                                            @endif
                                            <label class="form-control-feedback eyeicon" style="pointer-events:all;cursor: pointer;">
                                                <span><i class="fa fa-eye" id="eye"></i></span>
                                            </label>
                                            <div class="error-message" style="color: red;"></div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block btn-flat btn-passwordreset">
                                        Submit
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var url = '{{ route("set.password") }}';
    var redirectUrl = '{{ route("user.verify", ["encryptedToken" => $encrypted_token]) }}'
</script>
@endsection
@push('push-style')
<link href="{{ asset('dist/css/customlogin.css') }}" rel="stylesheet">
<style>
    #loader {
        top: 37% !important;
        left: 88% !important;
    }
</style>
@endpush
@push('push-script')
<script src="{{asset('dist/js/pages/password.js')}}"></script>
@endpush