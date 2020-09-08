<!-- BEGIN: Header-->
<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-shadow navbar-brand-center">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="d-flex justify-content-between logo">
                <a href="{{ route('home') }}"><img
                            src="{{ str_contains(url()->full(), 'evos') ? asset('images/logo/evos.png') : asset('images/logo/evolusom-white.png') }}"
                            height="50"
                            alt=""></a>


                <div class="box-timer align-self-center">
                    <div class="d-flex justify-content-between">
                        (<b>Atualização</b>: A 5 minutos)
                    </div>
                </div>


            </div>
        </div>
    </div>
</nav>
