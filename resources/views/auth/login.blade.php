
@section('css')

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('ablepro/bower_components/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('ablepro/assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('ablepro/assets/css/pages.css') }}">
    <!-- Notification.css -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('ablepro/assets/pages/notification/notification.css') }}">
    <!-- Animate.css -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('ablepro/bower_components/animate.css/css/animate.css') }}">
@endsection
@section('body')
    themebg-pattern="theme1"
@endsection
@include('admin.partials.header')

<div class="theme-loader">
    <div class="loader-track">
        <div class="preloader-wrapper">
            <div class="spinner-layer spinner-blue">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
            <div class="spinner-layer spinner-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>

            <div class="spinner-layer spinner-yellow">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>

            <div class="spinner-layer spinner-green">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Pre-loader end -->

<section class="login-block">
    <!-- Container-fluid starts -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <!-- Authentication card start -->
                @if (count($errors) > 0)
                    <div class="alert alert-danger" >
                        <strong>{{ trans('quickadmin::auth.whoops') }}</strong> {{ trans('quickadmin::auth.some_problems_with_input') }}
                        <br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="md-float-material"  role="form"
                      method="POST"
                      action="{{ url('login') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="text-center">
                        {{--<img src="" alt="logo.png">--}}
                    </div>
                    <div class="auth-box card">
                        <div class="card-block">
                            <div class="row m-b-20">
                                <div class="col-md-12">
                                    <h3 class="text-center">{{ trans('quickadmin::auth.login-email') }}</h3>
                                </div>
                            </div>
                            <div class="form-group form-primary">
                                <span class="form-bar"></span>
                                <label class="float-label">Your Email Address</label>
                                <input type="email"
                                       class="form-control"
                                       name="email"
                                       value="{{ old('email') }}">

                            </div>
                            <div class="form-group form-primary">
                                <span class="form-bar"></span>
                                <label class="float-label">Password</label>
                                <input type="password"
                                       class="form-control"
                                       name="password">

                            </div>

                            <div class="row m-t-30">
                                <div class="col-md-12">
                                    <button type="submit"
                                            class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20"
                                            style="margin-right: 15px;">
                                        {{ trans('quickadmin::auth.login-btnlogin') }}
                                    </button>
                                </div>
                            </div>
                            <hr/>

                        </div>
                    </div>
                </form>
                <!-- end of form -->
            </div>
            <!-- end of col-sm-12 -->
        </div>
        <!-- end of row -->
    </div>
    <!-- end of container-fluid -->
</section>
@include('admin.partials.footer')
@section('js')
    <script type="text/javascript" src="{{ URL::asset('ablepro/bower_components/i18next/js/i18next.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('ablepro/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('ablepro/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('ablepro/bower_components/jquery-i18next/js/jquery-i18next.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('ablepro/assets/js/common-pages.js') }}"></script>

    <script type="text/javascript" src="{{ URL::asset('ablepro/assets/js/bootstrap-growl.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('ablepro/assets/pages/notification/notification.js') }}"></script>
    <script src="{{ URL::asset('ablepro/files/assets/js/pcoded.min.js') }}"></script>
    <script src="{{ URL::asset('ablepro/files/assets/js/vertical/vertical-layout.min.js') }}"></script>
    <script src="{{ URL::asset('ablepro/files/assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
@endsection
