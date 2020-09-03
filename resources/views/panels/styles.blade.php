<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/vendors.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/ui/prism.min.css')) }}">
{{-- Vendor Styles --}}
@yield('vendor-style')
{{-- Theme Styles --}}
<link rel="stylesheet" href="{{ asset(mix('css/bootstrap.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/bootstrap-extended.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/colors.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/components.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/themes/dark-layout.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/themes/semi-dark-layout.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/core/menu/menu-types/horizontal-menu.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/core/menu/menu-types/vertical-menu.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/core/colors/palette-gradient.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/pages/dashboard-analytics.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/custom-laravel.css')) }}">
{{-- Page Styles --}}

@yield('page-style')
{{-- Laravel Style --}}


