<!DOCTYPE html>
<html class="loading" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="user-id" content="{{ auth()->user()->id ?? '' }}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
          content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords"
          content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title>Admin Panel | @lang('site.home')</title>
    <link rel="apple-touch-icon" href="{{asset('assets/admin/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/admin/images/ico/favicon.ico')}}">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
        rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
          rel="stylesheet">

    @if (app()->getLocale() == 'ar')
        <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css-rtl/plugins/animate/animate.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css-rtl/vendors.css')}}">
        <link rel="stylesheet" type="text/css"
              href="{{asset('assets/admin/css-rtl/core/menu/menu-types/vertical-menu.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css-rtl/pages/chat-application.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css-rtl/app.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css-rtl/custom-rtl.css')}}">
        <link rel="stylesheet" type="text/css"
              href="{{asset('assets/admin/css-rtl/core/menu/menu-types/vertical-menu.css')}}">
        <link rel="stylesheet" type="text/css"
              href="{{asset('assets/admin/css-rtl/core/colors/palette-gradient.css')}}">
        <link rel="stylesheet" type="text/css"
              href="{{asset('assets/admin/css-rtl/core/colors/palette-gradient.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css-rtl/pages/timeline.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css-rtl/style-rtl.css')}}">
    @else
        <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/plugins/animate/animate.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/vendors.css')}}">
        <link rel="stylesheet" type="text/css"
              href="{{asset('assets/admin/css/core/menu/menu-types/vertical-menu.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/pages/chat-application.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/app.css')}}">
        {{--        <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/custom-rtl.css')}}">--}}
        <link rel="stylesheet" type="text/css"
              href="{{asset('assets/admin/css/core/menu/menu-types/vertical-menu.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/core/colors/palette-gradient.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/core/colors/palette-gradient.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/pages/timeline.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/style.css')}}">
    @endif

<!-- BEGIN VENDOR CSS-->

    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/vendors/css/weather-icons/climacons.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/fonts/meteocons/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/vendors/css/charts/morris.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/vendors/css/charts/chartist.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/vendors/css/forms/selects/select2.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('assets/admin/vendors/css/charts/chartist-plugin-tooltip.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('assets/admin/vendors/css/forms/toggle/bootstrap-switch.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/vendors/css/forms/toggle/switchery.min.css')}}">

    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->

    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/fonts/simple-line-icons/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/vendors/css/cryptocoins/cryptocoins.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/vendors/css/extensions/datedropper.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/vendors/css/extensions/timedropper.min.css')}}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <!-- END Custom CSS-->
    <!-- @notify_css -->
    @yield('style')
    <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Cairo', sans-serif;
        }

    </style>
    {{--<!-- jQuery 3 -->--}}
    <script src="{{ asset('assets/admin/js/core/libraries/jquery.min.js') }}"></script>


</head>
<body
    class="vertical-layout vertical-menu 2-columns  @if(Request::is('admin/users/tickets/reply*')) chat-application @endif menu-expanded fixed-navbar"
    data-open="click" data-menu="vertical-menu" data-col="2-columns">

<div id="app">

    <a id="button"></a>

    <app-main></app-main>

</div>


{{--@include('admin.includes.alerts.success')--}}
@include('sweetalert::alert')
@include('partials._session')
<!-- ////////////////////////////////////////////////////////////////////////////-->
@include('layouts.admin._footer')

<!-- @notify_js -->
<!-- @notify_render -->

<script src="{{ asset('js/app.js') }}"></script>
<!-- BEGIN VENDOR JS-->
<script src="{{asset('assets/admin/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<script src="{{asset('assets/admin/vendors/js/tables/datatable/datatables.min.js')}}"
        type="text/javascript"></script>
<script src="{{asset('assets/admin/vendors/js/tables/datatable/dataTables.buttons.min.js')}}"
        type="text/javascript"></script>

<script src="{{asset('assets/admin/vendors/js/forms/toggle/bootstrap-switch.min.js')}}"
        type="text/javascript"></script>
<script src="{{asset('assets/admin/vendors/js/forms/toggle/bootstrap-checkbox.min.js')}}"
        type="text/javascript"></script>
<script src="{{asset('assets/admin/vendors/js/forms/toggle/switchery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/js/scripts/forms/switch.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/vendors/js/forms/select/select2.full.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/js/scripts/forms/select/form-select2.js')}}" type="text/javascript"></script>

<!-- BEGIN PAGE VENDOR JS-->
<script src="{{asset('assets/admin/vendors/js/charts/chart.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/vendors/js/charts/echarts/echarts.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/admin/vendors/js/extensions/datedropper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/vendors/js/extensions/timedropper.min.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/admin/vendors/js/forms/icheck/icheck.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/js/scripts/pages/chat-application.js')}}" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN MODERN JS-->
<script src="{{asset('assets/admin/js/core/app-menu.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/admin/js/core/app.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/js/scripts/customizer.js')}}" type="text/javascript"></script>
<!-- END MODERN JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{asset('assets/admin/js/scripts/pages/dashboard-crypto.js')}}" type="text/javascript"></script>


<script src="{{asset('assets/admin/js/scripts/tables/datatables/datatable-basic.js')}}"
        type="text/javascript"></script>
<script src="{{asset('assets/admin/js/scripts/extensions/date-time-dropper.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->

<script src="{{asset('assets/admin/js/scripts/forms/checkbox-radio.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/admin/js/scripts/modal/components-modal.js')}}" type="text/javascript"></script>

<script src="{{ asset('assets/admin/js/scripts/image_preview.js') }}"></script>
<!-- <script src="{{ asset('assets/admin/js/scripts/googlemap.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKZAuxH9xTzD2DLY2nKSPKrgRi2_y0ejs&libraries=places&callback=initAutocomplete&language=ar&region=EG
         async defer"></script> -->

<script>
    // Enable pusher logging - don't include this in production
    /* Pusher.logToConsole = true;

    var pusher = new Pusher('5e9e7017fcbc89f676e8', {
      cluster: 'mt1'
    });  */


    var btn = $('#button');

    $(window).scroll(function () {
        if ($(window).scrollTop() > 100) {
            btn.addClass('show');
        } else {
            btn.removeClass('show');
        }
    });

    btn.on('click', function (e) {
        e.preventDefault();
        $('html, body').animate({scrollTop: 0}, '300');
    });


    // delete
    //     $('.delete').click(function (e) {
    //         var that = $(this);
    //         e.preventDefault();
    //         swal({
    //             title: "Are you sure?",
    //             text: "You want to delete " + name + "  !",
    //             type: "question",
    //             showCancelButton: true,
    //             confirmButtonColor: "#ff4961",
    //             confirmButtonText: "Yes, delete it!",
    //             closeOnConfirm: false
    //         }).then((isok) => {
    //             if (isok) {
    //                 that.closest('form').submit();
    //             } else {
    //                 swal("Your imaginary file is safe!", {icon: "error",});
    //
    //             }
    //         });
    //     });//end of delete
    // delete
    //     $('.active').click(function (e) {
    //         var that = $(this);
    //         e.preventDefault();
    //         swal({
    //             title: "Are you sure?",
    //             text: "You want to delete " + name + "  !",
    //             type: "question",
    //             showCancelButton: true,
    //             confirmButtonColor: "#ff4961",
    //             confirmButtonText: "Yes, delete it!",
    //             closeOnConfirm: false
    //         }).then((isok) => {
    //             if (isok) {
    //                 that.closest('form').submit();
    //             } else {
    //                 swal("Your imaginary file is safe!", {icon: "error",});
    //
    //             }
    //         });
    //     });//end of delete

    setTimeout(() => {
        jQuery('.alert').remove();
    }, 5000);
    $('#meridians1').timeDropper({
        meridians: true,
        setCurrentTime: false
    });
    $('#meridians2').timeDropper({
        meridians: true, setCurrentTime: false
    });
    $('#meridians3').timeDropper({
        meridians: true,
        setCurrentTime: false
    });
    $('#meridians4').timeDropper({
        meridians: true,
        setCurrentTime: false
    });
    $('#meridians5').timeDropper({
        meridians: true, setCurrentTime: false
    });
    $('#meridians6').timeDropper({
        meridians: true, setCurrentTime: false
    });
    $('#meridians7').timeDropper({
        meridians: true, setCurrentTime: false
    });
    $('#meridians8').timeDropper({
        meridians: true, setCurrentTime: false
    });
    $('#meridians9').timeDropper({
        meridians: true, setCurrentTime: false
    });
    $('#meridians10').timeDropper({
        meridians: true, setCurrentTime: false
    });
    $('#meridians11').timeDropper({
        meridians: true, setCurrentTime: false
    });
    $('#meridians12').timeDropper({
        meridians: true, setCurrentTime: false
    });
    $('#meridians13').timeDropper({
        meridians: true, setCurrentTime: false
    });
    $('#meridians14').timeDropper({
        meridians: true, setCurrentTime: false
    });


</script>
{{--<script src="//{{ Request::getHost() }}:6001/socket.io/socket.io.js"></script>--}}

{{--<script type="text/javascript">--}}
{{--    window.Echo.join(`notefication`)--}}
{{--        .here((users) => {--}}
{{--            onlineuserslength = users.length;--}}
{{--            console.log(users);--}}
{{--            if (users.length > 1) {--}}

{{--            }--}}
{{--            let userId = $('meta[name=user-id]').attr('content');--}}
{{--            users.forEach(function (user) {--}}
{{--                if (user.id == userId) {--}}
{{--                    return;--}}
{{--                }--}}
{{--                $('#online-'+ user.id).css('color' , 'green');--}}
{{--            });--}}
{{--            // console.log(users);--}}
{{--        })--}}
{{--        .joining((user) => {--}}
{{--            console.log(user);--}}
{{--            onlineuserslength++;--}}
{{--            $('#online-'+ user.id).css('color' , 'green');--}}
{{--        })--}}
{{--        .leaving((user) => {--}}
{{--            onlineuserslength--;--}}
{{--            if (onlineuserslength == 1) {--}}
{{--                $('.msg-title1').css('display', 'block');--}}
{{--            }--}}
{{--            $('#online-'+ user.id).css('color' , '#e3342f');--}}
{{--        });--}}
{{--   --}}
{{--</script>--}}

@yield('script')
</body>
</html>

