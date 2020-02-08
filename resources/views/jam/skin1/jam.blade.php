<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jam Masjid</title>
    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
    {{--Calender Hijriah--}}
    <link rel='stylesheet' href='{{ asset('/jam/skin1/calendar/css/Calender.css') }}'>
    {{--Background Slide Show--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('/jam/skin1/slideshow/css/demo.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/jam/skin1/slideshow/css/style2.css') }}" />
    {{--Bootstrapp--}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    {{--Custom CSS--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('/jam/skin1/jam/CustomJam.css') }}" />
    {{--Countdown--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('/jam/skin1/countdown/css/style.css') }}" />
    {{--Turn Off--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('/jam/skin1/TurnOff/css/style.css') }}" />
    {{--Image Slider Show On Popup Modal--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('/jam/skin1/BackgroundSlideshow/css/component.css') }}" />
    <script src="{{ asset('/jam/skin1/BackgroundSlideshow/js/modernizr.custom.js') }}"></script>
    {{--News Ticker--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('/jam/skin1/news-ticker/css/style.css') }}" />

</head>
<body id="page">
<ul class="cb-slideshow">
    <li><span></span></li>
    <li><span></span></li>
    <li><span></span></li>
    <li><span></span></li>
    <li><span></span></li>
    <li><span></span></li>
</ul>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4 text-white">
            <div class="card-body" >
                <div id="Date" style="margin-top: -20px;"></div>
                <ul class="jam-top" style="margin: -20px; margin-bottom: -30px;">
                    <li class="jam" id="hours"> </li>
                    <li class="jam" id="point">:</li>
                    <li class="jam" id="min"> </li>
                    <li class="jam" id="point">:</li>
                    <li class="jam" id="sec"> </li>
                </ul>
            </div>
        </div>
        <div class="col-md-8 pt-4 text-white">
            <center>
                <h1 style="font-size: 50px; letter-spacing: 5px; font-family: 'BebasNeueRegular', Arial, Helvetica, sans-serif;" class=" text-uppercase">{{ $jamsetting[0]->namemosque }} </h1>
            </center>
        </div>
        <div class="content" style="display: none">
            <a onclick="show_modal()"> tombol</a>
        </div>
        <div class="col-md-12" style=" border: 1px; ">
            <div class="row" style="margin-right: 0px;">
                <div class="col-md-4 h-100" >
                    <div id="slide-1" class="carousel slide rounded " data-ride="carousel">
                        <div class="carousel-inner carousel-fade rounded" role="listbox">
                            <!-- Slide One - Set the background image for this slide in the line below -->
                            <div class="carousel-item active" style="background-color: rgba(47, 53, 66,0.9)">
                                <div id="calendar" ></div>
                            </div>
                            @foreach($slider1 as $row1)
                                <div class="carousel-item" style="background-image: url('{{ asset('uploads/').'/'.$row1->image }}'); background-size: contain; ">
                         <div class="carousel-caption d-none d-md-block">
                         <h2 class="display-4 "></h2>
                         <p class="lead "></p>
                        </div>
                        </div>
                            @endforeach


                        </div>
                    </div>
                </div>
                <div class="col-md-8 h-100 w-100" style="padding-right: 0px; color: white;">
                    <div id="slide-2" class="carousel slide carousel-fade rounded" data-ride="carousel">
                        <div class="carousel-inner rounded" role="listbox">
                            <!-- Slide One - Set the background image for this slide in the line below -->
                            @foreach($slider2 as $row)
                                @if($row->category === 'video' )
                                    <div class="carousel-item active" style="background-color: rgba(47, 53, 66,0.9); text-align: center;">
                                        <video autoplay loop id="video-background" muted>
                                            <source src="{{ asset('/uploads').'/'.$row->file }}" type="video/mp4">
                                        </video>
                                    </div>
                                @elseif($row->category === 'image')
                                    <div class="carousel-item" style="background-image: url('{{ asset('/uploads').'/'.$row->file }}'); text-align: center;">
                                        {{--<video autoplay loop id="video-background" muted>--}}
                                        {{--<source src="{{ asset('/uploads/adab_menuntut_ilmu.mp4') }}" type="video/mp4">--}}
                                        {{--</video>--}}
                                    </div>
                                @else
                                    <div class="carousel-item" style="background-color: rgba(47, 53, 66,0.9); text-align: center;">
                                        <label class="badge p-1 mt-3" style="color: white;"><h2 class="">{{ $row->title }}</h2></label>
                                        <div class="carousel-caption d-none d-md-block">
                                            {{--<img class="img-responsive" width="170px" src="{{ asset('/images/pray.png') }}">--}}
                                            <h2 class="display-4 ">{{ $row->arab }}</h2>
                                            <p class="lead ">"{{ $row->terjemah }}"</p>
                                            <p class="lead  text-c-blue">"{{ $row->riwayat }}"</p>
                                        </div>
                                    </div>
                            @endif
                        @endforeach
                        <!-- Slide Two - Set the background image for this slide in the line below -->
                            <div class="carousel-item" style="background-color: rgba(47, 53, 66,0.9); text-align: center;">
                                <label class="badge p-1 mt-3"><h2 class="">DOA MOHON PERLINDUNGAN DARI GODAAN SETAN</h2></label>
                                <div class="carousel-caption d-none d-md-block">
                                    <h2 class="display-4 ">أَعُوْذُ بِاللَّهِ مِنَ الشَّيْطَانِ الرَّجِيْمِ</h2>
                                    <p class="lead ">"Aku berlindung kepada Allah dari godaan syaitan yang terkutuk."</p>
                                </div>
                            </div>
                            <!-- Slide Three - Set the background image for this slide in the line below -->
                            <div class="carousel-item" style="background-color: rgba(47, 53, 66,0.9); text-align: center;">
                                <label class="badge p-1 mt-3"><h2 class="">DO'A MEMINTA ILMU YANG BERMANFAAT</h2></label>
                                <div class="carousel-caption d-none d-md-block">
                                    <h2 class="display-4 ">اَللَّهُمَّ إِنِّيْ أَسْأَلُكَ عِلْمًا نَافِعًا، وَرِزْقًا طَيِّبًا، وَعَمَلاً مُتَقَبَّلاً</h2>
                                    <p class="lead ">“Ya Allah, sungguh aku memohon kepada-Mu ilmu yang bermanfaat (bagi diriku dan orang lain), rizki yang halal dan amal yang diterima (di sisi-Mu dan mendapatkan ganjaran yang baik).”</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row rounded fixed-bottom" style="margin: 5px; background-color: rgba(52, 73, 94,0.7);">
        <div id="bg_subuh" class="col-md-2 waktu rounded ">
            <h4><span class="badge d-block badge-success ">SUBUH</span></h4>
            <h1 class="font-weight-bold text-white text-center " id="subuh">00:00</h1>
        </div>
        <div id="bg_syuruq" class="col-md-2 waktu rounded">
            <h4><span class="badge d-block badge-success ">SYURUQ</span> </h4>
            <h1 class="font-weight-bold text-white text-center " id="syuruq">00:00</h1>
        </div>
        <div id="bg_dzuhur" class="col-md-2  waktu rounded ">
            <h4><span class="badge d-block badge-success ">DZUHUR</span> </h4>
            <h1 class="font-weight-bold text-white text-center " id="dzuhur">00:00</h1>
        </div>
        <div id="bg_ashar" class="col-md-2 waktu rounded ">
            <h4> <span class="badge d-block badge-success ">ASHAR</span> </h4>
            <h1 class="font-weight-bold text-white text-center " id="ashar">00:00</h1>
        </div>
        <div id="bg_maghrib" class="col-md-2 waktu rounded ">
            <h4> <span class="badge badge-success d-block ">MAGHRIB</span> </h4>
            <h1 class="font-weight-bold text-white text-center " id="maghrib">00:00</h1>
        </div>
        <div id="bg_isya" class="col-md-2 waktu rounded ">
            <h4><span class="badge  d-block badge-success ">ISYA</span> </h4>
            <h1 class="font-weight-bold text-white text-center " id="isya">00:00</h1>
        </div>
        <div class="row">
            <div class="col-md-12  pt-2">
                <div class="announcements-container border">
                    <div class="container-title" style="font-size: large; font-weight: 800;">Info</div>
                    <ul class="announcements">
                        <li >Ust Dr Musyaffa’ Ad Dariny MA SIFAT SHOLAT NABI ﷺ Pekan 1 dan 3 Minggu kajian subuh di Masjid “ ألإخلاص “ Dukuh Bima</li>
                        <li >Ust Dr Firanda Andirja MA KITABUT – TAUHID Setiap Pekan minggu Ba'da Maghrib di Masjid “ ألإخلاص “ Dukuh Bima</li>
                        <li >Ust Muhammad Shoim Lc Tafsir Alquran Setiap Pekan di Masjid “ ألإخلاص “ Dukuh Bima </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal"  id="modal-container" >
    <div class="modal-background">
        <div class="modal">
            <div class="container-fluid screen">
                <ul id="cbp-bislideshow" class="cbp-bislideshow">
                    <li><img src="{{ asset('/jam/skin1/BackgroundSlideshow/images/1.jpg')}}" alt="image01"/></li>
                    <li><img src="{{ asset('/jam/skin1/BackgroundSlideshow/images/2.jpg')}}" alt="image02"/></li>
                    <li><img src="{{ asset('/jam/skin1/BackgroundSlideshow/images/3.jpg')}}" alt="image03"/></li>
                    <li><img src="{{ asset('/jam/skin1/BackgroundSlideshow/images/4.jpg')}}" alt="image04"/></li>
                    <li><img src="{{ asset('/jam/skin1/BackgroundSlideshow/images/5.jpg')}}" alt="image05"/></li>
                    <li><img src="{{ asset('/jam/skin1/BackgroundSlideshow/images/6.jpg')}}" alt="image06"/></li>
                </ul>
                <div class="row" id="countdowntime">
                    <div class="countdown pt-3 pb-3"  >
                        <h2 class="bg-secondary border ">MENUJU IQOMAH</h2></label>
                        <div class="bloc-time min" data-init-value="0">
                            <div class="figure min min-1">
                                <span class="top">0</span>
                                <span class="top-back">
          <span>0</span>
        </span>
                                <span class="bottom">0</span>
                                <span class="bottom-back">
          <span>0</span>
        </span>
                            </div>

                            <div class="figure min min-2">
                                <span class="top">0</span>
                                <span class="top-back">
          <span>0</span>
        </span>
                                <span class="bottom">0</span>
                                <span class="bottom-back">
          <span>0</span>
        </span>
                            </div>
                        </div>

                        <div class="bloc-time sec" data-init-value="0">

                            <div class="figure sec sec-1">
                                <span class="top">0</span>
                                <span class="top-back">
          <span>0</span>
        </span>
                                <span class="bottom">0</span>
                                <span class="bottom-back">
          <span>0</span>
        </span>
                            </div>

                            <div class="figure sec sec-2">
                                <span class="top">0</span>
                                <span class="top-back">
          <span>0</span>
        </span>
                                <span class="bottom">0</span>
                                <span class="bottom-back">
          <span>0</span>
        </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="padding-bottom: 10px; margin-right: 0px;">
                    <div class="col-md-12 h-100 w-100 pt-1 pb-1" style="padding-right: 0px;" >
                        <div id="slide-3" class="carousel slide carousel-fade rounded" data-ride="carousel">
                            <div class="carousel-inner rounded" style="background-color: rgba(0,0,0,0.6);" role="listbox" id="caraosel-2">
                                <!-- Slide One - Set the background image for this slide in the line below -->

                                <!-- Slide Three - Set the background image for this slide in the line below -->
                                <!-- Slide Two - Set the background image for this slide in the line below -->
                            </div>
                        </div>
                    </div>
                </div>
                <a style="z-index: 19021; background-color: red; display: none;" onclick="hide_modal()"> Hiden</a>
                <button style="z-index: 19021; background-color: red; display: none;" class="on" onclick="toggleSwitcherTV" id="switcher-tv">Turn on/off</button>
                <button style="z-index: 19021; background-color: red; display: none;" class="on" onclick="timer" id="timer">Turn on/off</button>
            </div>
        </div>
    </div>
</div>

</body>
<!-- Required Mudule -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Bootstrapp -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
{{--Setting--}}
<script>
    var time_countdown = {{ $jamsetting[0]->countdown }};
    // var time_countdown = 1;
    var time_dzikir = {{ $jamsetting[0]->dzikir_time * 60000 }};
    var time_slider2 = {{ $jamsetting[0]->slider2 * 60000 }};
    var waktu_adzan = {{ $jamsetting[0]->waktuadzan * 60000}};
    var logitude = {{ $jamsetting[0]->logitude }};
    var latitude = {{ $jamsetting[0]->latitude }};
    var countdown_aktif = 1;
    var turnoff_aktif = 1;
    var timer_turnoff = 1*60000;
</script>

<!-- Hijri Calender -->
<script src='{{ asset('/jam/skin1/hijri-date.js') }}'></script>
<script src='{{ asset('/jam/skin1/Calender.js') }}'></script>
<script src="{{ asset('/jam/skin1/calendar/js/index.js') }}"></script>
{{--Typed Js--}}
<script src="{{ asset('/jam/skin1/typed/typed.js') }}"></script>
{{-- Countdown--}}
<script src="{{ asset('/jam/skin1/countdown/js/index.js') }}"></script>
{{--Turn Off--}}
<script src="{{ asset('/jam/skin1/TurnOff/js/index.js') }}"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js'></script>
{{--Pray Time--}}
<script type="text/javascript" src="{{ asset('/jam/skin1/PrayTimes.js') }}"></script>
{{--GamePad--}}
<script src='https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.15.0/lodash.min.js'></script>
<script type="text/javascript" src="{{ asset('/jam/skin1/gamepad/js/index.js') }}"></script>
{{--Custom JS--}}
<script src="{{ asset('/jam/skin1/jam/CustomJam.js') }}"></script>
{{--Image Slider Show On Popup Modal--}}
<script src="{{ asset('/jam/skin1/BackgroundSlideshow/js/jquery.imagesloaded.min.js') }}"></script>
<script src="{{ asset('/jam/skin1/BackgroundSlideshow/js/cbpBGSlideshow.js') }}"></script>
<script>
    $(function() {
        cbpBGSlideshow.init();
    });
</script>
{{--News Ticker--}}
<script src="{{ asset('/jam/skin1/news-ticker/js/index.js') }}"></script>
</html>
