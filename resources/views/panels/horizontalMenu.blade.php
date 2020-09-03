<!-- BEGIN: Header-->
<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-fixed navbar-shadow navbar-brand-center">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="d-flex justify-content-center logo">
                <a href="{{ route('home') }}"><img
                            src="{{ str_contains(url()->full(), 'evos') ? asset('images/logo/evos.png') : asset('images/logo/evolusom.png') }}"
                            height="50"
                            alt=""></a>

{{--                <div class="box-timer align-self-center">--}}
{{--                    <div class="d-flex justify-content-between">--}}
{{--                        <div id="item-timer"></div>--}}
{{--                        <div class="spinner-grow text-danger spinner-timer" role="status">--}}
{{--                            <span class="sr-only">Loading...</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}


            </div>
        </div>
    </div>
</nav>
