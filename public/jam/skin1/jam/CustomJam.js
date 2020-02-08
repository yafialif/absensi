$(document).ready(function() {

    $('#slide-1').carousel({
        interval: 20000
    });
    $('#slide-2').carousel({
        interval: time_slider2
    });
    $('#slide-3').carousel({
        interval: 10000
    });

    var praytime = setInterval(DateTime, 1000)
// Create two variable with the names of the months and days in an array
    var monthNames = [ "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember" ];
    var dayNames= ["MINGGU","SENIN","SELASA","RABU","KAMIS","JUMAT","SABTU"]
    function DateTime(){
        // Create a newDate() object
        var newDate = new Date();
// Extract the current date from Date object
        newDate.setDate(newDate.getDate());
// Output the day, date, month and year
        $('#Date').html(dayNames[newDate.getDay()] + " - " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());
        // Create a newDate() object and extract the seconds of the current time on the visitor's
        var seconds = new Date().getSeconds();
        // Add a leading zero to seconds value
        $("#sec").html(( seconds < 10 ? "0" : "" ) + seconds);

        // Create a newDate() object and extract the minutes of the current time on the visitor's
        var minutes = new Date().getMinutes();
        // Add a leading zero to the minutes value
        $("#min").html(( minutes < 10 ? "0" : "" ) + minutes);

        // Create a newDate() object and extract the hours of the current time on the visitor's
        var hours = new Date().getHours();
        // Add a leading zero to the hours value
        $("#hours").html(( hours < 10 ? "0" : "" ) + hours);


        prayTimes.adjust( { fajr:20, dhuhr:1,  maghrib:1, isha: 18} );

        var date = new Date();
        prayTimes.tune( {fajr:2, sunrise: 15, dhuhr:2, asr: 2, maghrib:2, isha: 2} );

        var times = prayTimes.getTimes(date, [latitude, logitude], +7, 0);
        prayTimes.setMethod('Indonesia');

        document.getElementById("subuh").innerHTML = times.fajr;
        document.getElementById("syuruq").innerHTML = times.sunrise;
        document.getElementById("dzuhur").innerHTML = times.dhuhr;
        document.getElementById("ashar").innerHTML = times.asr;
        document.getElementById("maghrib").innerHTML = times.maghrib;
        document.getElementById("isya").innerHTML = times.isha;

        var time = moment().subtract(5,'minutes').format('HH:mm');
        var time2 = moment().format('HH:mm');
        // var time3 = moment().subtract(12,'minutes').format('HH:mm');
        if(time <= times.fajr){
            $("#bg_isya").removeClass("jamactive");
            $("#bg_subuh").addClass("jamactive");
            $("#isya").removeClass("textactive");
            if(time2 >= times.fajr){
                $("#subuh").addClass("textactive");
                // console.log('subuh');
                if(time >= times.fajr){
                    if(countdown_aktif === 1){
                        show_modal();
                    }
                }
            }
        }
        else if(time <= times.sunrise){
            $("#bg_subuh").removeClass("jamactive");
            $("#bg_syuruq").addClass("jamactive");
            $("#subuh").removeClass("textactive");

            if(time2 >= times.sunrise){
                $("#syuruq").addClass("textactive");
                // console.log('syuruq');
            }

        }
        else if(time <= times.dhuhr){
            $("#bg_syuruq").removeClass("jamactive");
            $("#bg_dzuhur").addClass("jamactive");
            $("#syuruq").removeClass("textactive");
            if(time2 >= times.dhuhr){
                $("#dzuhur").addClass("textactive");
                // console.log('dzuhur');
                if(time >= times.dhuhr){
                    if(countdown_aktif === 1){
                        show_modal();
                    }

                }
            }
        }
        else if(time <= times.asr){
            $("#bg_dzuhur").removeClass("jamactive");
            $("#bg_ashar").addClass("jamactive");
            $("#dzuhur").removeClass("textactive");

            if(time2 >= times.asr){
                $("#ashar").addClass("textactive");
                // console.log('ashar');
                if(time >= times.asr){
                    if(countdown_aktif === 1){
                        show_modal();
                    }
                }
            }
        }
        else if(time <= times.maghrib){
            $("#bg_ashar").removeClass("jamactive");
            $("#bg_maghrib").addClass("jamactive");
            $("#ashar").removeClass("textactive");

            if(time2 >= times.maghrib){
                $("#maghrib").addClass("textactive");
                // console.log('maghrib');
                if(time >= times.maghrib){
                    if(countdown_aktif === 1){
                        show_modal();
                    }
                }
            }
        }
        else if(time <= times.isha){
            $("#bg_maghrib").removeClass("jamactive");
            $("#bg_isya").addClass("jamactive");
            $("#maghrib").removeClass("textactive");

            if(time2 >= times.isha){
                $("#isya").addClass("textactive");
                // console.log('isya');
                if(time >= times.isha){
                    if(countdown_aktif === 1){
                        show_modal();
                    }
                }
            }
        }
        else if(time > times.isha){

            $("#bg_isya").removeClass("jamactive");
            $("#bg_subuh").addClass("jamactive");
            $("#isya").removeClass("textactive");
        }



    }
//Remove Calender
    $('.w3-ripple').trigger('click');
    $(".w3-dropdown-click, .w3-button, .w3-display-middle, .w3-display-bottommiddle").remove();
    // getslider1();
    setInterval(function(){
        // getslider1();
    }, 60000);
});

function getslider1() {
    var settings = {
        "async": true,
        "crossDomain": true,
        "url": "http://192.168.200.48:8000/api/slider1",
        "method": "GET",
        "headers": {
            "startdate": "2019-03-28",
            "enddate": "2019-04-10",
            "cache-control": "no-cache",
            "Postman-Token": "1fa4a46a-dbf2-4517-83da-7249a245516a"
        }
    }
    $.ajax(settings).done(function (response) {

        response.forEach(function (item) {
            var text =
                "<div class=\"carousel-item\" style=\"background-image: url('uploads/"+item.image+"'); background-size: contain; \") >\n" +
                "                                        <div class=\"carousel-caption d-none d-md-block\">\n" +
                "                                            <h2 class=\"display-4 \"></h2>\n" +
                "                                            <p class=\"lead \">\"\"</p>\n" +
                "                                        </div>\n" +
                "                                    </div>";

        });
        document.getElementById("slider-1").innerHTML = text;

    });
}

// Modal
function show_modal() {
    $('#modal-container').removeAttr('class').addClass('one');
    // $('body').addClass('modal-active');
    $('#countdowntime').show();
    doa_adzan();
    timer();

}
function hide_modal(){
    $('#modal-container').addClass('out');

}
//doa adzan slider pertaama setelah popup
function doa_adzan(){
    document.getElementById("caraosel-2").innerHTML = "<div class=\"carousel-item active\" style=\"background-color: rgba(47, 53, 66,0.9); \">\n" +
        "                                    <label class=\"badge p-1 mt-3\"><h2 class=\"\">DOA SETELAH ADZAN</h2></label>\n" +
        "                                    <div class=\"carousel-caption d-none d-md-block\">\n" +
        "                                        <h2 class=\"arab arab-3\">اَللّٰهُمَّ رَبَّ هٰذِهِ الدَّعْوَةِ التَّآمَّةِ، وَالصَّلاَةِ الْقَآئِمَةِ، آتِ مُحَمَّدَانِ الْوَسِيْلَةَ وَالْفَضِيْلَةَ، وَابْعَثْهُ مَقَامًامَحْمُوْدَانِ الَّذِىْ وَعَدْتَهُْ</h2>\n" +
        "                                        <p class=\"terjemah lead \">\"Ya Allah, Rabb pemilik panggilan yang sempurna, dan sholat yang tetap didirikan. Berikanlah derajat di Surga, dan keutamaan kepada Muhammad ﷺ‎. Dan bangkitkanlah beliau sehingga bisa menempati maqam terpuji yang telah engkau janjikan.\"</p>\n" +
        "                                    </div>\n" +
        "                                </div>";
}
//setelah doa adzan
function setelah_adzan(){
    document.getElementById("caraosel-2").innerHTML = "<div class=\"carousel-item active\" style=\"background-color: rgba(47, 53, 66,0.9); text-align: center;\">\n" +
        "                                    <label class=\"badge p-1 mt-3\" style=\"color: white;\"><h2 class=\"\">DOA YANG TIDAK TERTOLAK</h2></label>\n" +
        "                                    <div class=\"carousel-caption d-none d-md-block\">\n" +
        "                                        <h2 class=\"display-4 arab arab-3 \">إِنَّ الدُّعَاءَ لاَ يُرَدُّ بَيْنَ الأَذَانِ وَالإِقَامَةِ فَادْعُوا</h2>\n" +
        "                                        <p class=\"lead \">\"“Sungguh berdo’a antara adzan dan iqomah tidak tertolak, maka pergunakanlah untuk berdo’a.” (HR. Ahmad).\"</p>\n" +
        "                                    </div>\n" +
        "                                </div>\n" +
        "                                <!-- Slide Two - Set the background image for this slide in the line below -->\n" +
        "                                <div class=\"carousel-item\" style=\"background-color: rgba(47, 53, 66,0.9); text-align: center;\">\n" +
        "                                    <label class=\"badge p-1 mt-3\"><h2 class=\"\">SHALAT SUNNAH</h2></label>\n" +
        "                                    <div class=\"carousel-caption d-none d-md-block\">\n" +
        "                                        <h2 class=\"display-4 arab arab-3 \">مَنْ صَلَّى فِي يَوْمٍ ثِنْتَيْ عَشْرَةَ رَكْعَةً سِوَى الْفَرِيضَةِ بَنَى اللهُ لَهُ بَيْتًا فِي الْجَنَّةِ</h2>\n" +
        "                                        <p class=\"lead \">\"“barangsiapa yang shalat sunnah 12 rakaat dalam sehari semalam, Allah akan bangunkan untuknya rumah di surga” (HR. Muslim no. 728).\"</p>\n" +
        "                                    </div>\n" +
        "                                </div>";
}
//lurus rapatkan shaft setelah countdown selesai
function LurusRapat(){
    document.getElementById("caraosel-2").innerHTML = "<div class=\"carousel-item active\" style=\"background-color: rgba(47, 53, 66,0.9)\">\n" +
        "                                        <h1 class=\"arab \" id=\"lurusrapat\"></h1>\n" +
        "<div class=\"carousel-caption\">\n" +
        "<img src=\"/images/shaf_rapat.png\" width=\"50%\" style=\"-webkit-filter: drop-shadow(5px 5px 5px #1e90ff );\n" +

        "  filter: drop-shadow(5px 5px 5px #1e90ff);\" alt=\"Cinque Terre\">"+
        "                                    </div>\n" +
        "                                </div>";
    new TypeIt('#lurusrapat', {
        strings: ["LURUSKANLAH SHAF KARENA LURUSNYA SHAF MERUPAKAN BAGIAN DARI KESEMPURNAAN SHALAT"],
        speed: 20,
        breakLines: true,
        waitUntilVisible: true
    }).go();
}
//doa setelah shalat di popup modal
function DoaSetelahShalat(){
    var waktu = moment().format('HH:mm');
    var fajr = $('#subuh').textContent;
    var sunrise = $('#syuruq').textContent;
    var maghrib = $('#maghrib').textContent;
    var isha = $('#isya').textContent;
    console.log(fajr);
    if(waktu > fajr && waktu < sunrise){
        document.getElementById("caraosel-2").innerHTML = " <div class=\"carousel-item active pt-3 pb-3 \" style=\"background-color: rgba(47, 53, 66,0.9); text-align: center; height: 100vh;\">\n" +
            "                                    <label class=\"badge p-2 mt-3\"><h2 class=\"\">DZIKIR SETELAH SHALAT</h2></label>\n" +
            " <h2 class=\"dzikir \">{3x} أَسْتَغْفِرُ اللهَِ</h2>\n" +
            "                                    <h2 class=\"dzikir \">اَللَّهُمَّ أَنْتَ السَّلاَمُ، وَمِنْكَ السَّلاَمُ، تَبَارَكْتَ يَا ذَا الْجَلاَلِ وَاْلإِكْرَامِ </h2>\n" +
            "                                    <h2 class=\"dzikir \">لاَ إِلَـهَ إِلاَّ اللهُ وَحْدَهُ لاَ شَرِيْكَ لَهُ، لَهُ الْمُلْكُ وَلَهُ الْحَمْدُ وَهُوَ عَلَى كُلِّ شَيْءٍ قَدِيْرُ، اَللَّهُمَّ لاَ مَانِعَ لِمَا أَعْطَيْتَ، وَلاَ مُعْطِيَ لِمَا مَنَعْتَ، وَلاَ يَنْفَعُ ذَا الْجَدِّ مِنْكَ الْجَدُِّ </h2>\n" +
            "                                    <h2 class=\"dzikir \">لاَ إِلَـهَ إِلاَّ اللهُ وَحْدَهُ لاَ شَرِيْكَ لَهُ، لَهُ الْمُلْكُ وَلَهُ الْحَمْدُ وَهُوَ عَلَى كُلِّ شَيْءٍ قَدِيْرُ. لاَ حَوْلَ وَلاَ قُوَّةَ إِلاَّ بِاللهِ، لاَ إِلَـهَ إِلاَّ اللهُ، وَلاَ نَعْبُدُ إِلاَّ إِيَّاهُ، لَهُ النِّعْمَةُ وَلَهُ الْفَضْلُ وَلَهُ الثَّنَاءُ الْحَسَنُ، لاَ إِلَـهَ إِلاَّ اللهُ مُخْلِصِيْنَ لَهُ الدِّيْنَ وَلَوْ كَرِهَ الْكَافِرُوْنَ </h2>\n" +
            " <h2 class=\"dzikir \">{33} سُبْحَانَ اللهِ {33} اَلْحَمْدُ لِلَّهِ {33} اللهُ أَكْبَرُ </h2>\n" +
            " <h2 class=\"dzikir \">لاَ إِلَـهَ إِلاَّ اللهُ وَحْدَهُ لاَ شَرِيْكَ لَهُ، لَهُ الْمُلْكُ وَلَهُ الْحَمْدُ وَهُوَ عَلَى كُلِّ شَيْءٍ قَدِيْرُِِ </h2>\n" +
            " <h2 class=\" \">Membaca ayat Kursi</h2>\n" +
            " <h2 class=\" \">Membaca surat Al-Ikhlas [3x], Al-Falaq [3X] dan An-Naas [3x]</h2>\n" +
            " <h2 class=\"dzikir \">اَللَّهُمَّ إِنِّيْ أَسْأَلُكَ عِلْمًا نَافِعًا، وَرِزْقًا طَيِّبًا، وَعَمَلاً مُتَقَبَّلاً </h2>\n" +
            "                            </div>";
    }
    else if(waktu > maghrib && waktu < isha){
        document.getElementById("caraosel-2").innerHTML = " <div class=\"carousel-item active pt-3 pb-3 \" style=\"background-color: rgba(47, 53, 66,0.9); text-align: center; height: 100vh;\">\n" +
            "                                    <label class=\"badge p-2 mt-3\"><h2 class=\"\">DZIKIR SETELAH SHALAT</h2></label>\n" +
            " <h2 class=\"dzikir \">{3x} أَسْتَغْفِرُ اللهَ</h2>\n" +
            "                                    <h2 class=\"dzikir \">اَللَّهُمَّ أَنْتَ السَّلاَمُ، وَمِنْكَ السَّلاَمُ، تَبَارَكْتَ يَا ذَا الْجَلاَلِ وَاْلإِكْرَامِ</h2>\n" +
            "                                    <h2 class=\"dzikir \">لاَ إِلَـهَ إِلاَّ اللهُ وَحْدَهُ لاَ شَرِيْكَ لَهُ، لَهُ الْمُلْكُ وَلَهُ الْحَمْدُ وَهُوَ عَلَى كُلِّ شَيْءٍ قَدِيْرُ، اَللَّهُمَّ لاَ مَانِعَ لِمَا أَعْطَيْتَ، وَلاَ مُعْطِيَ لِمَا مَنَعْتَ، وَلاَ يَنْفَعُ ذَا الْجَدِّ مِنْكَ الْجَدُِّ</h2>\n" +
            "                                    <h2 class=\"dzikir \">لاَ إِلَـهَ إِلاَّ اللهُ وَحْدَهُ لاَ شَرِيْكَ لَهُ، لَهُ الْمُلْكُ وَلَهُ الْحَمْدُ وَهُوَ عَلَى كُلِّ شَيْءٍ قَدِيْرُ. لاَ حَوْلَ وَلاَ قُوَّةَ إِلاَّ بِاللهِ، لاَ إِلَـهَ إِلاَّ اللهُ، وَلاَ نَعْبُدُ إِلاَّ إِيَّاهُ، لَهُ النِّعْمَةُ وَلَهُ الْفَضْلُ وَلَهُ الثَّنَاءُ الْحَسَنُ، لاَ إِلَـهَ إِلاَّ اللهُ مُخْلِصِيْنَ لَهُ الدِّيْنَ وَلَوْ كَرِهَ الْكَافِرُوْنَ</h2>\n" +
            " <h2 class=\"dzikir \">{33} سُبْحَانَ اللهِ {33} اَلْحَمْدُ لِلَّهِ {33} اللهُ أَكْبَرُ *</h2>\n" +
            " <h2 class=\"dzikir \">لاَ إِلَـهَ إِلاَّ اللهُ وَحْدَهُ لاَ شَرِيْكَ لَهُ، لَهُ الْمُلْكُ وَلَهُ الْحَمْدُ وَهُوَ عَلَى كُلِّ شَيْءٍ قَدِيْرُِِ *</h2>\n" +
            " <h2 class=\" \">Membaca ayat Kursi</h2>\n" +
            " <h2 class=\" \">Membaca surat Al-Ikhlas [3x], Al-Falaq [3X] dan An-Naas [3x]</h2>\n" +
            "                            </div>";
    }
    else{
        document.getElementById("caraosel-2").innerHTML = "<div class=\"carousel-item active pt-3 pb-3 \" style=\"background-color: rgba(47, 53, 66,0.9); text-align: center; height: 100vh;\">\n" +
            "                                    <label class=\"badge p-2 mt-3\"><h2 class=\"\">DZIKIR SETELAH SHALAT</h2></label>\n" +
            " <h2 class=\"dzikir \">{3x} أَسْتَغْفِرُ اللهَ</h2>\n" +
            "                                    <h2 class=\"dzikir \">اَللَّهُمَّ أَنْتَ السَّلاَمُ، وَمِنْكَ السَّلاَمُ، تَبَارَكْتَ يَا ذَا الْجَلاَلِ وَاْلإِكْرَامِ </h2>\n" +
            "                                    <h2 class=\"dzikir \">لاَ إِلَـهَ إِلاَّ اللهُ وَحْدَهُ لاَ شَرِيْكَ لَهُ، لَهُ الْمُلْكُ وَلَهُ الْحَمْدُ وَهُوَ عَلَى كُلِّ شَيْءٍ قَدِيْرُ، اَللَّهُمَّ لاَ مَانِعَ لِمَا أَعْطَيْتَ، وَلاَ مُعْطِيَ لِمَا مَنَعْتَ، وَلاَ يَنْفَعُ ذَا الْجَدِّ مِنْكَ الْجَدُِّ </h2>\n" +
            "                                    <h2 class=\"dzikir \">لاَ إِلَـهَ إِلاَّ اللهُ وَحْدَهُ لاَ شَرِيْكَ لَهُ، لَهُ الْمُلْكُ وَلَهُ الْحَمْدُ وَهُوَ عَلَى كُلِّ شَيْءٍ قَدِيْرُ. لاَ حَوْلَ وَلاَ قُوَّةَ إِلاَّ بِاللهِ، لاَ إِلَـهَ إِلاَّ اللهُ، وَلاَ نَعْبُدُ إِلاَّ إِيَّاهُ، لَهُ النِّعْمَةُ وَلَهُ الْفَضْلُ وَلَهُ الثَّنَاءُ الْحَسَنُ، لاَ إِلَـهَ إِلاَّ اللهُ مُخْلِصِيْنَ لَهُ الدِّيْنَ وَلَوْ كَرِهَ الْكَافِرُوْنَ </h2>\n" +
            " <h2 class=\"dzikir \">{33} سُبْحَانَ اللهِ {33} اَلْحَمْدُ لِلَّهِ {33} اللهُ أَكْبَرُ *</h2>\n" +
            " <h2 class=\"dzikir \">لاَ إِلَـهَ إِلاَّ اللهُ وَحْدَهُ لاَ شَرِيْكَ لَهُ، لَهُ الْمُلْكُ وَلَهُ الْحَمْدُ وَهُوَ عَلَى كُلِّ شَيْءٍ قَدِيْرُِِ *</h2>\n" +
            " <h2 class=\" \">Membaca ayat Kursi</h2>\n" +
            " <h2 class=\" \">Membaca surat Al-Ikhlas [1x], Al-Falaq [1X] dan An-Naas [1x] </h2>\n" +
            "                            </div>";
    }


}
//Power Off
$(document).ready(buildTimeline);
var SELECTOR_SCREEN_ELEMENT = '.screen';
var SELECTOR_SWITCHER_TV = '#switcher-tv';
var isTurnedOn = true;
var timeline;
function buildTimeline() {
    timeline = new TimelineMax({
        paused: true
    });
    timeline
        .to(SELECTOR_SCREEN_ELEMENT, .2, {
            width: '100vw',
            height: '2px',
            background: '#ffffff',
            ease: Power2.easeOut
        })
        .to(SELECTOR_SCREEN_ELEMENT, .2, {
            width: '0',
            height: '0',
            background: '#ffffff'
        });
}
var x = document.getElementById("switcher-tv");
function toggleSwitcherTV() {
    if (x.className === "on") {
        timeline.restart();
        document.getElementById("switcher-tv").className = "off";
    }

    if (!isTurnedOn) {
        // timeline.reverse();
        isTurnedOn = !isTurnedOn;

    }
}
$(document).on('click', SELECTOR_SWITCHER_TV, function() {
    toggleSwitcherTV();
});

//Timer Countdown

function timer() {
    var timer = document.getElementById("timer");
    if (timer.className === "on") {
        Countdown.init();
        document.getElementById("timer").className = "off";
        doa_adzan();
        setTimeout(function(){
            setelah_adzan();
        }, 60000);
    }
    else {

    }
}

// Button On
var onButtonDown = function(index){
    console.log(index);
    if((index === 7) || (index === 8)){
        TurnoOn();
    }
}
function TurnoOn() {
    DoaSetelahShalat();
    timeline.reverse();
    document.getElementById("switcher-tv").className = "on";
    document.getElementById("timer").className = "on";
    $('#countdowntime').hide();
    //waktu dzikir setelah shalat
    setTimeout(function(){
        hide_modal();
    }, time_dzikir);
}

