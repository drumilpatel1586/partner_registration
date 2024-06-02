
@extends('admin.auth.layouts')
@section('content')
    <div class="login-box">
        <div class="login-box-body">
            <!-- Admin Portal Login -->
                @if(session('success'))
                    <div id="flash-message" class="alert {{ session('class') }}" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                <div id="flash-message" class="alert {{ session('class') }}" role="alert">
                    {{ session('error') }}
                </div>
                @endif

                @if(request()->has('flash_message'))
                <div id="flash-message" class="alert {{ request()->get('flash_class') }}">
                    {{ request()->get('flash_message') }}
                </div>
                @endif
                <div class="panel panel-body login-form">
                    <div class="text-center">
                        <div class="icon-object text-center" style="border:none !important;">
                            <div class="login-logo">
                                    <img src="{{ asset('dist/images/logo.png') }}" class="qntmlogo">
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="spinner-border" id="loader" style="display: none;" role="status">
                            <span class="sr-only"></span>
                        </div>
                        <div class="spinner_overlay" style="display: none;"></div>
                    </div> 
                  
                    <div class="container1">
                      
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card1">               
                                    <div class="card-body">
                                        <p class="login-box-msg partner.qntmnet.com" id="CloudLoginP"><i class="fa fa-lock">&nbsp;</i><label style="color:#002855 !important;"> Quantum Partner Portal Login</label></p>
                                       <form method="POST" action="{{ route('login_check')}}" accept-charset="UTF-8" id="login">                
                                        @csrf
                                        <div class="step1" style="display:block;">
                                            <div class="form-group has-feedback">
                                                <input type="text" name="Email" id="email" class="form-control" placeholder="Username" required="" autofocus> 
                                                <span class="form-control-feedback"><i class="fa fa-envelope"></i></span>
                                                <div class="error-message" style="color: red;"></div>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0 next-btn">
                                            <div class="col-md-12 offset-md-4">
                                                <button type="button" class="btn btn-primary btn-block btn-flat">
                                                    Next
                                                </button>           
                                            </div>
                                        </div>
                                        <div class="step2">
                                            <!-- Step 2 content -->
                                            <div class="form-group has-feedback password-input" style="display: none;">
                                                <input type="password" name="Password" id="password" class="form-control" placeholder="Password">
                                                <label class="form-control-feedback eyeicon" style="pointer-events:all;cursor: pointer;">
                                                    <span><i class="fa fa-eye" id="eye"></i></span>
                                                </label>
                                                <div class="error-message1" style="color: red;"></div>
                                            </div> 
                                        </div>
                                        <div class="form-group row mb-0 reqisterlink">
                                            <div class="col-md-12 offset-md-4">
                                                <div class="clearfix" style="padding:1px !important;"></div>
                                                
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0 login-input" id="loginBtnDiv" style="display: none;">
                                            <div class="col-md-12 offset-md-4">
                                                <button type="submit" class="btn btn-primary btn-block btn-flat">
                                                    Login
                                                </button>
                                                <div class="clearfix" style="padding:5px !important;"></div>
                                                <a class="pull-right" id="forgot-password-link" href="#"><b>Forgot Password?</b></a>
                                            </div>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                                           
                </div>      
        </div>
    </div> 

@endsection  

@push('push-style')
<link href="{{ asset('dist/css/customlogin.css') }}" rel="stylesheet">
<style>
    #loader{
        top: 38% !important;
        left: 88% !important;
    }
</style>

@endpush

@push('push-script')
<script src="{{asset('dist/js/pages/login.js')}}"></script>
@endpush
