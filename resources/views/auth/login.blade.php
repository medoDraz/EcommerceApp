<!DOCTYPE html>
<html class="loading" data-textdirection="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
          content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords"
          content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title>@lang('site.sign_in')</title>
    <link rel="icon" href="{{ asset('images/logo.jpg') }}">
    {{--    <link rel="apple-touch-icon" href="{{asset('assets/admin/images/ico/apple-icon-120.png')}}">--}}
    {{--    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/admin/images/ico/favicon.ico')}}">--}}
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
        rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
          rel="stylesheet">


    <!-- BEGIN VENDOR CSS-->
    @if (app()->getLocale() == 'ar')
        <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css-rtl/vendors.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css-rtl/app.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css-rtl/custom-rtl.css')}}">
        <link rel="stylesheet" type="text/css"
              href="{{asset('assets/admin/css-rtl/core/colors/palette-gradient.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css-rtl/pages/login-register.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css-rtl/style-rtl.css')}}">
        <link rel="stylesheet" type="text/css"
              href="{{asset('assets/admin/css-rtl/core/menu/menu-types/vertical-menu.css')}}">
    @else
        <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/vendors.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/app.css')}}">
{{--        <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/custom.css')}}">--}}
        <link rel="stylesheet" type="text/css"
              href="{{asset('assets/admin/css/core/colors/palette-gradient.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/pages/login-register.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/style.css')}}">
        <link rel="stylesheet" type="text/css"
              href="{{asset('assets/admin/css/core/menu/menu-types/vertical-menu.css')}}">
    @endif
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/vendors/css/forms/icheck/icheck.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/vendors/css/forms/icheck/custom.css')}}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->


    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->

    <!-- END Custom CSS-->

    <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Cairo', sans-serif;
        }

    </style>
</head>
<body class="vertical-layout vertical-menu 1-column   menu-expanded blank-page blank-page"
      data-open="click" data-menu="vertical-menu" data-col="1-column">
<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="flexbox-container">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="col-md-4 col-10 box-shadow-2 p-0">
                        <div class="card border-grey border-lighten-3 m-0">
                            <div class="card-header border-0">
                                <div class="card-title text-center">
                                    <div class="logo_container ">
                                        <img src="{{asset('images/logo.jpg')}}" style="width: 375px; height: 135px;"
                                             alt="LOGO"/>
                                        {{--                                        <a href="/">colo<span>shop</span></a>--}}
                                    </div>
                                </div>
                                <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                                    <span style="font-size: 20px">@lang('site.sign_in') </span>
                                </h6>
                            </div>
                            {{--                            @include('admin.includes.alerts.errors')--}}
                            {{--                            @include('admin.includes.alerts.success')--}}
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form-horizontal form-simple" action="{{route('login')}}" method="post"
                                          novalidate>
                                        @csrf

                                        <fieldset class="form-group position-relative has-icon-left mb-0">
                                            <input type="text" name="email"
                                                   class="form-control form-control-lg input-lg"
                                                   value="{{old('email')}}" id="email"
                                                   placeholder="أدخل البريد الالكتروني ">
                                            <div class="form-control-position">
                                                <i class="ft-user"></i>
                                            </div>
                                            @error('email')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror

                                        </fieldset>

                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input type="password" name="password"
                                                   class="form-control form-control-lg input-lg"
                                                   id="user-password"
                                                   placeholder="أدخل كلمة المرور">
                                            <div class="form-control-position">
                                                <i class="la la-key"></i>
                                            </div>
                                            @error('password')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </fieldset>

                                        <div class="form-group row">
                                            <div class="col-md-6 col-12 text-center text-md-left">
                                                <fieldset>
                                                    <input type="checkbox" name="remember_me" id="remember-me"
                                                           class="chk-remember">
                                                    <label for="remember-me">@lang('site.remember_me')</label>
                                                </fieldset>
                                            </div>
                                        </div>

                                        <div class="form-group row col-md-6 col-12 text-center text-md-left">
                                            <a href="#"> @lang('site.forgot_password') ?</a>
                                        </div>

                                        <button type="submit" class="btn btn-info btn-lg btn-block"><i
                                                class="ft-unlock"></i>
                                            @lang('site.sign_in')
                                        </button>
                                    </form>
                                    <div class="form-group row py-2">
                                        <div class="col-md-6 col-6 text-center text-md-left">
                                            <p class="mb-0">
                                                <a href="{{ route('register') }}" class="text-center">Register a new
                                                    membership</a>
                                            </p>

                                        </div>
                                        <div class="col-md-6 col-6 text-center text-md-left"
                                             style="text-align: left !important;">
                                            <p class="mb-0">
                                                <a href="{{ route('get.admin.login') }}" class="text-center">Sign In as
                                                    Admin</a>
                                            </p>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<!-- BEGIN VENDOR JS-->
<script src="{{asset('assets/admin/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="{{asset('assets/admin/vendors/js/forms/icheck/icheck.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/vendors/js/forms/validation/jqBootstrapValidation.js')}}"
        type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN MODERN JS-->
<script src="{{asset('assets/admin/js/core/app-menu.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/js/core/app.js')}}" type="text/javascript"></script>
<!-- END MODERN JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{asset('assets/admin/js/scripts/forms/form-login-register.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->

<script>
</script>
</body>
</html>

