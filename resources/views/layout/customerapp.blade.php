<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

    <title>innoGas Customer @yield("title")</title>

    <meta name="description" content="Most Powerful &amp; Comprehensive Bootstrap 5 Admin Dashboard built for developers!">
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/logo.svg') }}"/>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}"/>
    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('assets/customer/responsive.bootstrap5.css')}}">

    <!-- Page CSS -->
    <link rel="stylesheet" href="{{asset('assets/customer/page-profile.css')}}">
    <!-- Helpers -->
    <script src="{{asset('assets/customer/helpers.js')}}"></script>
    <style type="text/css">
        .layout-menu-fixed .layout-navbar-full .layout-menu,
        .layout-menu-fixed-offcanvas .layout-navbar-full .layout-menu {
            top: 62px !important;
        }

        .layout-page {
            padding-top: 62px !important;
        }

        .content-wrapper {
            padding-bottom: 54px !important;
        }</style>
    <script src="{{asset('assets/customer/template-customizer.js')}}"></script>
    <style>
        .bx-md {
            font-size: 1.25rem !important;
        }
        #template-customizer {
            font-family: "Open Sans", BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol" !important;
            font-size: inherit !important;
            position: fixed;
            top: 0;
            right: 0;
            height: 100%;
            z-index: 99999999;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            width: 400px;
            -webkit-box-shadow: 0px .3125rem 1.375rem 0px rgba(34, 48, 62, .18);
            box-shadow: 0px .3125rem 1.375rem 0px rgba(34, 48, 62, .18);
            -webkit-transition: all .2s ease-in;
            -o-transition: all .2s ease-in;
            transition: all .2s ease-in;
            -webkit-transform: translateX(420px);
            -ms-transform: translateX(420px);
            transform: translateX(420px)
        }

        .dark-style #template-customizer {
            -webkit-box-shadow: 0px .3125rem 1.375rem 0px rgba(20, 20, 29, .26);
            box-shadow: 0px .3125rem 1.375rem 0px rgba(20, 20, 29, .26)
        }

        #template-customizer h5 {
            position: relative;
            font-size: 11px
        }

        #template-customizer > h5 {
            flex: 0 0 auto
        }

        #template-customizer .disabled {
            color: #d1d2d3 !important
        }

        #template-customizer .form-label {
            font-size: .9375rem;
            font-weight: 500
        }

        #template-customizer .form-check-label {
            font-size: .8125rem
        }

        #template-customizer.template-customizer-open {
            -webkit-transition-delay: .1s;
            -o-transition-delay: .1s;
            transition-delay: .1s;
            -webkit-transform: none !important;
            -ms-transform: none !important;
            transform: none !important
        }

        #template-customizer.template-customizer-open .custom-option.checked {
            color: var(--bs-primary);
            border-width: 2px;
            margin: 0
        }

        #template-customizer .template-customizer-header a:hover {
            color: inherit !important
        }

        #template-customizer .template-customizer-open-btn {
            position: absolute;
            top: 180px;
            left: 0;
            z-index: -1;
            display: block;
            width: 38px;
            height: 38px;
            border-top-left-radius: .375rem;
            border-bottom-left-radius: .375rem;
            background: var(--bs-primary);
            box-shadow: 0px .125rem .25rem 0px rgba(105, 108, 255, .4);
            color: #fff !important;
            text-align: center;
            font-size: 18px !important;
            line-height: 38px;
            opacity: 1;
            -webkit-transition: all .1s linear .2s;
            -o-transition: all .1s linear .2s;
            transition: all .1s linear .2s;
            -webkit-transform: translateX(-58px);
            -ms-transform: translateX(-58px);
            transform: translateX(-58px)
        }

        @media (max-width: 991.98px) {
            #template-customizer .template-customizer-open-btn {
                top: 145px
            }
        }

        .dark-style #template-customizer .template-customizer-open-btn {
            background: var(--bs-primary)
        }

        #template-customizer .template-customizer-open-btn::before {
            content: "";
            width: 22px;
            height: 22px;
            display: block;
            background-size: 100% 100%;
            position: absolute;
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAAAXNSR0IArs4c6QAABClJREFUaEPtmY1RFEEQhbsjUCIQIhAiUCNQIxAiECIQIxAiECIAIpAMhAiECIQI2vquZqnZvp6fhb3SK5mqq6Ju92b69bzXf6is+dI1t1+eAfztG5z1BsxsU0S+ici2iPB3vm5E5EpEDlSVv2dZswFIxv8UkZcNy+5EZGcuEHMCOBeR951uvVDVD53vVl+bE8DvDu8Pxtyo6ta/BsByg1R15Bwzqz5/LJgn34CZwfnPInI4BUB6/1hV0cSjVxcAM4PbcBZjL0XklIPN7Is3fLCkdQPpPYw/VNXj5IhPIvJWRIhSl6p60ULWBGBm30Vk123EwRxCuIzWkkjNrCZywith10ewE1Xdq4GoAjCz/RTXW44Ynt+LyBEfT43kYfbj86J3w5Q32DNcRQDpwF+dkQXDMey8xem0L3TEqB4g3PZWad8agBMRgZPeu96D1/C2Zbh3X0p80Op1xxloztN48bMQQNoc7+eLEuAoPSPiIDY4Ooo+E6ixeNXM+D3GERz2U3CIqMstLJUgJQDe+7eq6mub0NYEkLAKwEHkiBQDCZtddZCZ8d6r7JDwFkoARklHRPZUFVDVZWbwGuNrC4EfdOzFrRABh3Wnqhv+d70AEBLGFROPmeHlnM81G69UdSd6IUuM0GgUVn1uqWmg5EmMfBeEyB7Pe3txBkY+rGT8j0J+WXq/BgDkUCaqLgEAnwcRog0veMIqFAAwCy2wnw+bI2GaGboBgF9k5N0o0rUSGUb4eO0BeO9j/GYhkSHMHMTIqwGARX6p6a+nlPBl8kZuXMD9j6pKfF9aZuaFOdJCEL5D4eYb9wCYVCanrBmGyii/tIq+SLj/HQBCaM5bLzwfPqdQ6FpVHyra4IbuVbXaY7dETC2ESPNNWiIOi69CcdgSMXsh4tNSUiklMgwmC0aNd08Y5WAES6HHehM4gu97wyhBgWpgqXsrASglprDy7CwhehMZOSbK6JMSma+Fio1KltCmlBIj7gfZOGx8ppQSXrhzFnOhJ/31BDkjFHRvOd09x0mRBA9SFgxUgHpQg0q0t5ymPMlL+EnldFTfDA0NAmf+OTQ0X0sRouf7NNkYGhrOYNrxtIaGg83MNzVDSe3LXLhP7O/yrCsCz1zlWTpjWkuZAOBpX3yVnLqI1yLCOKU6qMrmP7SSrUEw54XF4WBIK5FxCMOr3lVsfGqNSmPzBXUnJTIX1jyVBq9wO6UObOpgC5GjO98vFKnTdQMZXxEsWZlDiCZMIxAbNxQOqlpVZtobejBaZNoBnRDzMFpkxvTQOD36BlrcySZuI6p1ACB6LU3wWuf5581+oHfD1vi89bz3nFUC8Nm7ZlP3nKkFbM4bWPt/MSFwklprYItwt6cmvpWJ2IVcQBCz6bLysSCv3SaANCiTsnaNRrNRqMXVVT1/BrAqz/buu/Y38Ad3KC5PARej0QAAAABJRU5ErkJggg==);
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%)
        }

        .customizer-hide #template-customizer .template-customizer-open-btn {
            display: none
        }

        [dir=rtl] #template-customizer .template-customizer-open-btn {
            border-radius: 0;
            border-top-right-radius: .375rem;
            border-bottom-right-radius: .375rem
        }

        [dir=rtl] #template-customizer .template-customizer-open-btn::before {
            margin-left: -2px
        }

        #template-customizer.template-customizer-open .template-customizer-open-btn {
            opacity: 0;
            -webkit-transition-delay: 0s;
            -o-transition-delay: 0s;
            transition-delay: 0s;
            -webkit-transform: none !important;
            -ms-transform: none !important;
            transform: none !important
        }

        #template-customizer .template-customizer-inner {
            position: relative;
            overflow: auto;
            -webkit-box-flex: 0;
            -ms-flex: 0 1 auto;
            flex: 0 1 auto;
            opacity: 1;
            -webkit-transition: opacity .2s;
            -o-transition: opacity .2s;
            transition: opacity .2s
        }

        #template-customizer .template-customizer-inner > div:first-child > hr:first-of-type {
            display: none !important
        }

        #template-customizer .template-customizer-inner > div:first-child > h5:first-of-type {
            padding-top: 0 !important
        }

        #template-customizer .template-customizer-themes-inner {
            position: relative;
            opacity: 1;
            -webkit-transition: opacity .2s;
            -o-transition: opacity .2s;
            transition: opacity .2s
        }

        #template-customizer .template-customizer-theme-item {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            -ms-flex-align: center;
            -webkit-box-flex: 1;
            -ms-flex: 1 1 100%;
            flex: 1 1 100%;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            margin-bottom: 10px;
            padding: 0 24px;
            width: 100%;
            cursor: pointer
        }

        #template-customizer .template-customizer-theme-item input {
            position: absolute;
            z-index: -1;
            opacity: 0
        }

        #template-customizer .template-customizer-theme-item input ~ span {
            opacity: .25;
            -webkit-transition: all .2s;
            -o-transition: all .2s;
            transition: all .2s
        }

        #template-customizer .template-customizer-theme-item .template-customizer-theme-checkmark {
            display: inline-block;
            width: 6px;
            height: 12px;
            border-right: 1px solid;
            border-bottom: 1px solid;
            opacity: 0;
            -webkit-transition: all .2s;
            -o-transition: all .2s;
            transition: all .2s;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg)
        }

        [dir=rtl] #template-customizer .template-customizer-theme-item .template-customizer-theme-checkmark {
            border-right: none;
            border-left: 1px solid;
            -webkit-transform: rotate(-45deg);
            -ms-transform: rotate(-45deg);
            transform: rotate(-45deg)
        }

        #template-customizer .template-customizer-theme-item input:checked:not([disabled]) ~ span, #template-customizer .template-customizer-theme-item:hover input:not([disabled]) ~ span {
            opacity: 1
        }

        #template-customizer .template-customizer-theme-item input:checked:not([disabled]) ~ span .template-customizer-theme-checkmark {
            opacity: 1
        }

        #template-customizer .template-customizer-theme-colors span {
            display: block;
            margin: 0 1px;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            -webkit-box-shadow: 0 0 0 1px rgba(0, 0, 0, .1) inset;
            box-shadow: 0 0 0 1px rgba(0, 0, 0, .1) inset
        }

        #template-customizer.template-customizer-loading .template-customizer-inner, #template-customizer.template-customizer-loading-theme .template-customizer-themes-inner {
            opacity: .2
        }

        #template-customizer.template-customizer-loading .template-customizer-inner::after, #template-customizer.template-customizer-loading-theme .template-customizer-themes-inner::after {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 999;
            display: block
        }

        @media (max-width: 1200px) {
            #template-customizer {
                display: none;
                visibility: hidden !important
            }
        }

        @media (max-width: 575.98px) {
            #template-customizer {
                width: 300px;
                -webkit-transform: translateX(320px);
                -ms-transform: translateX(320px);
                transform: translateX(320px)
            }
        }

        .layout-menu-100vh #template-customizer {
            height: 100vh
        }

        [dir=rtl] #template-customizer {
            right: auto;
            left: 0;
            -webkit-transform: translateX(-420px);
            -ms-transform: translateX(-420px);
            transform: translateX(-420px)
        }

        [dir=rtl] #template-customizer .template-customizer-open-btn {
            right: 0;
            left: auto;
            -webkit-transform: translateX(58px);
            -ms-transform: translateX(58px);
            transform: translateX(58px)
        }

        [dir=rtl] #template-customizer .template-customizer-close-btn {
            right: auto;
            left: 0
        }

        #template-customizer .template-customizer-layouts-options[disabled] {
            opacity: .5;
            pointer-events: none
        }

        [dir=rtl] .template-customizer-t-style_switch_light {
            padding-right: 0 !important
        }</style>
    <script src="{{asset('assets/customer/config.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/customer/core.css')}}" class="template-customizer-core-css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/customer/theme-default.css')}}" class="template-customizer-theme-css">

</head>

<body data-new-gr-c-s-check-loaded="14.1213.0" data-gr-ext-installed="" cz-shortcut-listen="true">

<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Layout container -->
        <div class="layout-page">
            <!-- Navbar -->
            <!-- / Navbar -->
            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->
                <div class="container-xxl flex-grow-1 container-p-y">
                    <!-- Header -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card mb-6">
                                <div class="user-profile-header-banner">
                                    <img src="{{asset('assets/customer/profile-banner.png')}}" alt="Banner image"
                                         class="rounded-top">
                                </div>
                                <div
                                    class="user-profile-header d-flex flex-column flex-lg-row text-sm-start text-center mb-8">
                                    <div class="flex-shrink-0 mt-1 mx-sm-0 mx-auto">
                                        <img src="{{asset('assets/customer/1.png')}}" alt="user image"
                                             class="d-block h-auto ms-0 ms-sm-6 rounded-3 user-profile-img">
                                    </div>
                                    <div class="flex-grow-1 mt-3 mt-lg-5">
                                        <div
                                            class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-5 flex-md-row flex-column gap-4">
                                            <div class="user-profile-info">
                                                <h4 class="mb-2 mt-lg-7">{{session()->get('name')}}</h4>
                                                <ul class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-4 mt-4">
                                                    <li class="list-inline-item">
                                                        <i class="bx bx-wallet me-2 align-top"></i><span class="fw-medium">{{session()->get('current_balance')}} /-</span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <a href="{{url('customer-logout')}}" class="btn btn-primary mb-1">
                                                <i class="bx bx-user-check bx-sm me-2"></i>Logout
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Header -->

                    <!-- Navbar pills -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="nav-align-top">
                                <ul class="nav nav-pills flex-column flex-sm-row mb-6">
                                    <li class="nav-item"><a class="nav-link {{Request::is('customer-home') ?'active':''}}" href="{{ url('customer-home') }}"><i class="bx bx-user bx-sm me-1_5"></i> Home</a></li>
                                    <li class="nav-item"><a class="nav-link {{Request::is('customer-usage-history') ?'active':''}}" href="{{ url('customer-usage-history') }}"><i class="bx bx-user bx-sm me-1_5"></i> Usage History</a></li>
                                    <li class="nav-item"><a class="nav-link {{Request::is('customer-payment-history') ?'active':''}}" href="{{ url('customer-payment-history') }}"><i class="bx bx-group bx-sm me-1_5"></i> Payment History</a></li>
                                    <li class="nav-item"><a class="nav-link {{Request::is('customer-profile') ?'active':''}}" href="{{ url('customer-profile') }}"><i class="bx bx-grid-alt bx-sm me-1_5"></i> Profile</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--/ Navbar pills -->

                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-5">
                            <!-- About User -->
                            <div class="card mb-6">
                                <div class="card-body">
                                    <small class="card-text text-uppercase text-muted small">About</small>
                                    <ul class="list-unstyled my-3 py-1">
                                        <li class="d-flex align-items-center mb-4"><i class="bx bx-user"></i><span
                                                class="fw-medium mx-2">Name:</span> <span>{{session()->get('name')}}</span></li>
                                        <li class="d-flex align-items-center mb-4"><i class="bx bx-check"></i><span
                                                class="fw-medium mx-2">User Id:</span> <span>{{session()->get('cust_code')}}</span></li>
                                        <li class="d-flex align-items-center mb-4"><i class="bx bx-crown"></i><span
                                                class="fw-medium mx-2">Meter No:</span> <span>{{session()->get('meterno')}}</span></li>
                                    </ul>
                                    <small class="card-text text-uppercase text-muted small">Contacts</small>
                                    <ul class="list-unstyled my-3 py-1">
                                        <li class="d-flex align-items-center mb-4"><i class="bx bx-phone"></i><span
                                                class="fw-medium mx-2">Contact:</span> <span>{{session()->get('phone')}}</span></li>
                                        <li class="d-flex align-items-center mb-4"><i class="bx bx-envelope"></i><span
                                                class="fw-medium mx-2">Email:</span> <span>j{{session()->get('email')}}</span>
                                        <li class="d-flex align-items-center mb-4"><i class="bx bx-map align-top"></i><span
                                                class="fw-medium mx-2">Address:</span> <span>j{{session()->get('address')}}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!--/ About User -->
                        </div>
                        @yield('customerbody')
                    </div>
                </div>
                <!-- / Content -->
                <!-- Footer -->
                <footer class="content-footer footer bg-footer-theme">
                    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                        <div class="mb-2 mb-md-0">Copyright ©<script>document.write(new Date().getFullYear());</script>, Development by <a href="https://srl.com.bd" target="_blank" class="footer-link fw-bolder">System Resources Limited</a></div>
                    </div>
                </footer>                <!-- / Footer -->
                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>
    <!-- Overlay -->
</div>
<!-- / Layout wrapper -->

<!-- Core JS -->
<script src="{{asset('assets/customer/jquery.js')}}"></script>
<script src="{{asset('assets/customer/bootstrap.js')}}"></script>
<!-- endbuild -->
<!-- Vendors JS -->
<!-- Main JS -->
<script src="{{asset('assets/customer/main.js')}}"></script>
<!-- Page JS -->
<script src="{{asset('assets/customer/app-user-view-account.js')}}"></script>
@yield('script')
</body>
</html>
