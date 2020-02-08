@include('admin.partials.header')
<div class="loader-bg">
    <div class="loader-bar"></div>
</div>
<!-- [ Pre-loader ] end -->
<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">
        @include('admin.partials.topbar')
        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">
                @include('admin.partials.sidebar')

                <div class="pcoded-content">
                    <div class="page-header">
                        <div class="page-block">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <div class="page-header-title">
                                        <h4 class="m-b-10">@yield('header_title')</h4>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                <div class="pcoded-inner-content">
                    <div class="main-body">
                        <div class="page-wrapper">
                            <div class="page-body">
                                <div class="row">

                                @if (Session::has('message'))
                                    <div class="note note-info">
                                        <p>{{ Session::get('message') }}</p>
                                    </div>
                                @endif

                                @yield('content')
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <!-- [ style Customizer ] start -->

                <!-- [ style Customizer ] end -->
            </div>
        </div>
    </div>
</div>
<div class="scroll-to-top"
     style="display: none;">
    <i class="fa fa-arrow-up"></i>
</div>
@include('admin.partials.javascripts')

@yield('javascript')
@include('admin.partials.footer')


