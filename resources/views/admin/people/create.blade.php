@extends('admin.layouts.master')
@section('css')
    <!-- Select 2 css -->
    <link rel="stylesheet" href="{{ asset('ablepro/bower_components/select2/css/select2.min.css') }}" />
    <!-- Multi Select css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('ablepro/bower_components/bootstrap-multiselect/css/bootstrap-multiselect.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('ablepro/bower_components/multiselect/css/multi-select.css') }}" />

    <!-- Date-time picker css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('ablepro/assets/pages/advance-elements/css/bootstrap-datetimepicker.css') }}">
    <!-- Date-range picker css  -->
    <link rel="stylesheet" type="text/css" href="{{asset('ablepro/bower_components/bootstrap-daterangepicker/css/daterangepicker.css')}}" />
    <!-- Date-Dropper css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('ablepro/bower_components/datedropper/css/datedropper.min.css') }}" />
    <!-- Color Picker css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('ablepro/bower_components/spectrum/css/spectrum.css') }}" />
    <!-- Mini-color css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('ablepro/bower_components/jquery-minicolors/css/jquery.minicolors.css') }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('ablepro/assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ablepro/assets/css/pages.css') }}">
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBduP1s97Ho64jubF_UDywcVNcfi1gu-vM"></script>
    <script>
        // variabel global marker
        var marker;

        function taruhMarker(peta, posisiTitik){

            if( marker ){
                // pindahkan marker
                marker.setPosition(posisiTitik);
            } else {
                // buat marker baru
                marker = new google.maps.Marker({
                    position: posisiTitik,
                    map: peta
                });
            }

            // isi nilai koordinat ke form
            document.getElementById("lat").value = posisiTitik.lat();
            document.getElementById("lng").value = posisiTitik.lng();

        }

        function initialize() {
            var propertiPeta = {
                center:new google.maps.LatLng(-6.288354339405612,107.04643744238274),
                zoom:9,
                mapTypeId:google.maps.MapTypeId.ROADMAP
            };

            var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);

            // even listner ketika peta diklik
            google.maps.event.addListener(peta, 'click', function(event) {
                taruhMarker(this, event.latLng);
            });

        }


        // event jendela di-load
        google.maps.event.addDomListener(window, 'load', initialize);


    </script>

@endsection
@section('content')
    <div class="col-sm-12">
        <!-- Nestable card start -->
        <div class="card">
            <div class="card-header">
                <h5>{{ trans('quickadmin::templates.templates-view_create-add_new') }}</h5>
            </div>
            <div class="card-block">
                <div class="row">
                    <div class="col-md-12 col-sm-offset-2">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>

                {!! Form::open(array('files' => true, 'route' => config('quickadmin.route').'.people.store', 'id' => 'form-with-validation', 'class' => 'form-horizontal')) !!}

                <div class="form-group">
                    {!! Form::label('pid', 'parent', array('class'=>'control-label')) !!}
                    <div class="col-md-12">
                        <select class="form-control form-control-danger" id="category">
                            <option value="">Please Select</option>
                            <option value="0">Anak Dari</option>
                            <option value="1">Istri atau Suami Dari</option>
                        </select>

                    </div>
                    <div class="col-md-12" id="hiden" style="display: none;">
                        <select name="" id="parent" class="form-control js-example-basic-single col-sm-12">
                            @foreach($data as $raw)
                                <option value="{{ $raw->id }}">{{ $raw->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <input style="display: none;" id="pid" name="pid">
                <input style="display: none;" id="pasutri" name="pasutri">
                <div class="form-group">
                    {!! Form::label('nama', 'Nama', array('class'=>'control-label')) !!}
                    <div class="col-md-12">
                        {!! Form::text('nama', old('nama'), array('class'=>'form-control form-control-primary')) !!}

                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('title', 'Nama Panggilan', array('class'=>'control-label')) !!}
                    <div class="col-md-12">
                        {!! Form::text('title', old('title'), array('class'=>'form-control form-control-primary')) !!}

                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('foto', 'Foto', array('class'=>'control-label')) !!}
                    <div class="col-md-12">
                        {!! Form::file('foto') !!}
                        {!! Form::hidden('foto_w', 4096) !!}
                        {!! Form::hidden('foto_h', 4096) !!}

                    </div>
                </div><div class="form-group">
                    {!! Form::label('alamat', 'Alamat Lengkap', array('class'=>'control-label')) !!}
                    <div class="col-md-12">
                        {!! Form::text('alamat', old('alamat'), array('class'=>'form-control form-control-primary')) !!}

                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                    <button type="button" class="btn btn-success btn-mini" data-toggle="modal" data-target="#exampleModalScrollable">
                        Buka Maps
                    </button>
                    <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalScrollableTitle">Add New</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div id="googleMap" style="width:100%;height:380px;"></div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn-mini btn-success" data-dismiss="modal" aria-label="Close">
                                        Ok
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <input class="form-control date-control" type="text" id="lat" name="lat" value="" placeholder="Latitude" >
                        </div>
                        <div class="col-md-4">
                            <input class="form-control date-control" type="text" id="lng" name="lng" value="" placeholder="Longitude" >
                        </div>
                    </div>
                    </div>
                </div><div class="form-group">
                    {!! Form::label('tgl_lahir', 'Tanggal Lahir', array('class'=>'control-label')) !!}
                    <div class="col-md-12">
                        <input name="tgl_lahir" class="form-control datepicker" type="date">
                    </div>
                </div><div class="form-group">
                    {!! Form::label('tlpn', 'Nmr Tlpn', array('class'=>'control-label')) !!}
                    <div class="col-md-12">
                        {!! Form::text('tlpn', old('tlpn'), array('class'=>'form-control form-control-primary')) !!}

                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('jenis_kelamin', 'Jenis Kelamin', array('class'=>'control-label')) !!}
                    <div class="col-md-12">
                        <select class="form-control form-control-danger" name="jenis_kelamin" id="category">
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('Lian-Lain', 'Lain-Lain', array('class'=>'control-label')) !!}
                    <div class="col-md-12">
                        {!! Form::textarea('lain_lain', old('lain_lain'), array('class'=>'form-control ckeditor form-control-primary')) !!}

                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12 col-sm-offset-2">
                        {!! Form::submit( trans('quickadmin::templates.templates-view_create-create') , array('class' => 'btn btn-sm btn-primary')) !!}
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection
@section('javascript')
    <!-- Select 2 js -->
    <script type="text/javascript" src="{{ asset('ablepro/bower_components/select2/js/select2.full.min.js') }}"></script>
    <!-- Multiselect js -->
    <script type="text/javascript" src="{{ asset('ablepro/bower_components/bootstrap-multiselect/js/bootstrap-multiselect.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('ablepro/bower_components/multiselect/js/jquery.multi-select.js') }}"></script>
    <script type="text/javascript" src="{{ asset('ablepro/assets/js/jquery.quicksearch.js') }}"></script>
    <script type="text/javascript" src="{{ asset('ablepro/assets/pages/advance-elements/select2-custom.js') }}"></script>
    <!-- Bootstrap date-time-picker js -->
    <script type="text/javascript" src="{{ asset('ablepro/assets/pages/advance-elements/moment-with-locales.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('ablepro/bower_components/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('ablepro/assets/pages/advance-elements/bootstrap-datetimepicker.min.js') }}"></script>
    <!-- Date-range picker js -->
    <script type="text/javascript" src="{{ asset('ablepro/bower_components/bootstrap-daterangepicker/js/daterangepicker.js') }}"></script>
    <!-- Date-dropper js -->
    <script type="text/javascript" src="{{ asset('ablepro/bower_components/datedropper/js/datedropper.min.js') }}"></script>
    <!-- Color picker js -->
    <script type="text/javascript" src="{{ asset('ablepro/bower_components/spectrum/js/spectrum.js') }}"></script>
    <script type="text/javascript" src="{{ asset('ablepro/bower_components/jscolor/js/jscolor.js') }}"></script>
    <!-- Mini-color js -->
    <script type="text/javascript" src="{{ asset('ablepro/bower_components/jquery-minicolors/js/jquery.minicolors.min.js') }}"></script>
    <!-- Custom js -->
    <script type="text/javascript" src="{{ asset('ablepro/assets/pages/advance-elements/custom-picker.js') }}"></script>
    <script>
        var kosong = '';
        $("#category").on("change",function() {
            var category = document.getElementById("category").value;
            $('#pid').val(kosong);
            $('#pasutri').val(kosong);
            if(category == 0){
                console.log(category);
                $("#hiden").css('display','block');
            }
            else if( category == 1){
                console.log(category);
                $("#hiden").css('display','block');
            }

        });
        $("#parent").on("change",function() {
            var parent = document.getElementById("parent").value;

            var category = document.getElementById("category").value;
            if(category == 0){
                console.log(category);
                $('#pid').val(parent);
                $('#pasutri').val(kosong);
            }
            else if( category == 1){
                console.log(category);
                $('#pasutri').val(parent);
                $('#pid').val(parent);
            }
        });
    </script>
    @endsection
