<!doctype html>
<html lang="en">

<head>
    <!-- meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    {{-- css file --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/partner_registration.css') }}">

    {{-- font awesome link --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>

    {{-- jQuery CDN --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <link rel="icon" href="https://crm.qntmnet.com/QN-CDN/images/favicon.png" type="image/x-icon">
    <title>Quantum Network</title>
</head>

<body>
    <div class="partner_form">
        <section class="container partner_form_container text-light p-2 dummy">

            {{-- form logo --}}
            <div class="container-fluid text-light">
                <div class="text-center">
                    <div class="icon-object text-center" style="border:none !important;">
                        <div class="login-logo">
                            <a href="http://127.0.0.1:8000/partner_registration">
                                <img src="https://crm.qntmnet.com/QN-CDN/images/logo.png?v=08.18.0.234"
                                    class="qntmlogo">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <form class="row g-3 p-4" method="post" action="{{ route('partner.registration') }}">
                @csrf

                {{-- General Information --}}
                <div class="col-md-12">
                    <span class="form-span">General Information</span>
                    <hr class="mt-0 hr">
                </div>

                <div class="col-md-6">
                    <input type="text" class="form-control" name="company_name" value="{{ old('company_name') }}"
                        placeholder="Company Name">
                    <span class="text-danger">{{ $errors->first('company_name') }}</span>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="address" value="{{ old('address') }}"
                        placeholder="Address">
                    <span class="text-danger">{{ $errors->first('address') }}</span>
                </div>

                <div class="col-md-6">
                    {{-- select country --}}
                    <select class="form-select form-control" name="select_country" id="select_country"
                        aria-label="Default select example">
                        <option selected disabled>Select Country</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}" data-country-phonecode="{{ $country->phonecode }}">
                                {{ $country->name }}
                            </option>
                        @endforeach
                    </select>
                    <span class="text-danger">{{ $errors->first('select_country') }}</span>

                </div>
                <div class="col-md-6">
                    {{-- Select State --}}
                    <select class="form-select form-control" name="select_state" id="select_state"
                        aria-label="Default select example">
                        <option selected disabled>Select State</option>
                    </select>
                    <span class="text-danger">{{ $errors->first('select_state') }}</span>
                </div>

                <div class="col-md-6">
                    {{-- Select City --}}
                    <select class="form-select form-control" name="select_city" id="select_city"
                        aria-label="Default select example">
                        <option selected disabled>Select City</option>
                    </select>
                    <span class="text-danger">{{ $errors->first('select_city') }}</span>
                </div>
                <div class="col-md-6">
                    <input type="tel" maxlength="6" class="form-control" name="zip"
                        value="{{ old('zip') }}" placeholder="Zip">
                    <span class="text-danger">{{ $errors->first('zip') }}</span>
                </div>

                <div class="col-md-6">
                    <input type="text" class="form-control" name="website" value="{{ old('website') }}"
                        placeholder="Website">
                    <span class="text-danger">{{ $errors->first('website') }}</span>
                </div>
                <div class="col-md-6">
                    <input type="tel" maxlength="15" class="form-control" value="{{ old('landline') }}"
                        name="landline" placeholder="Landline">
                    <span class="text-danger">{{ $errors->first('landline') }}</span>
                </div>
                {{-- General Information End --}}

                {{-- Contact Information --}}
                <div class="col-md-12">
                    <span class="form-span">Contact Information</span>
                    <hr class="mt-0 hr">
                </div>

                <div class="col-md-6">
                    <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}"
                        placeholder="First Name">
                    <span class="text-danger">{{ $errors->first('first_name') }}</span>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}"
                        placeholder="Last Name">
                    <span class="text-danger">{{ $errors->first('last_name') }}</span>
                </div>

                <div class="col-md-6">
                    <input type="text" class="form-control" name="job_title" value="{{ old('job_title') }}"
                        placeholder="Job Title">
                    <span class="text-danger">{{ $errors->first('job_title') }}</span>
                </div>
                <div class="col-md-6 error_div">
                    <div class="mobile_no form-control">
                        <span class="text-muted" id="countrycode"></span>
                        <input style="border-color: transparent; outline: none;" maxlength="10" name="mobile"
                            type="tel" class="mobile" value="{{ old('mobile') }}" placeholder="Mobile">
                    </div>
                    <span class="text-danger mobile-error">{{ $errors->first('mobile') }}</span>
                </div>


                <div class="col-md-6">
                    <input type="text" maxlength="15" value="{{ old('personal_landline') }}"
                        class="form-control" name="personal_landline" placeholder="Landline">
                    <span class="text-danger">{{ $errors->first('personal_landline') }}</span>
                </div>
                <div class="col-md-6">
                    <input type="mail" class="form-control" value="{{ old('mail') }}" name="mail"
                        placeholder="Email">
                    <span class="text-danger">{{ $errors->first('mail') }}</span>
                </div>

                {{-- Contact Information End --}}

                <div class="captcha_img">
                    <div class="col-12">
                        <span>{!! captcha_img('math') !!}</span>
                        <button type="button" class="reload" id="reload">&#x21bb;</button>
                    </div>
                </div>

                <div class="partner_form_footer">
                    <div class="col-6">
                        <input type="text" class="form-control" name="captcha" placeholder="Enter Captcha">
                        <span class="text-danger">{{ $errors->first('captcha') }}</span>
                    </div>

                    <div class="col-6 submit_btn">
                        <button type="submit" class="btn">Submit</button>
                    </div>
                </div>
            </form>
        </section>
    </div>

    {{-- #################################  js files  ################################## --}}
    <script src="{{ asset('js/partner_registration.js') }}"></script>

    <script type="text/javascript" src="{{ asset('vendor\jsvalidation\js\jsvalidation.js') }}"></script>

    {!! JsValidator::formRequest('App\Http\Requests\PostPartnerRegistrationRequest') !!}
</body>

</html>
