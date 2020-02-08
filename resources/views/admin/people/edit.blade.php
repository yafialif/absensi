@extends('admin.layouts.master')

@section('content')
<div class="col-sm-12">
        <!-- Nestable card start -->
        <div class="card">
            <div class="card-header">
                <h5>{{ trans('quickadmin::templates.templates-view_edit-edit') }}</h5>
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

{!! Form::model($people, array('files' => true, 'class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array(config('quickadmin.route').'.people.update', $people->id))) !!}

<div class="form-group">
    {!! Form::label('pid', 'parent', array('class'=>'control-label')) !!}
    <div class="col-md-12">
        {!! Form::text('pid', old('pid',$people->pid), array('class'=>'form-control form-control-primary')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('nama', 'Nama', array('class'=>'control-label')) !!}
    <div class="col-md-12">
        {!! Form::text('nama', old('nama',$people->nama), array('class'=>'form-control form-control-primary')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('foto', 'Foto', array('class'=>'control-label')) !!}
    <div class="col-md-12">
        {!! Form::file('foto') !!}
        {!! Form::hidden('foto_w', 4096) !!}
        {!! Form::hidden('foto_h', 4096) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('title', 'Title', array('class'=>'control-label')) !!}
    <div class="col-md-12">
        {!! Form::text('title', old('title',$people->title), array('class'=>'form-control form-control-primary')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('kepala_keluarga', 'Kepala Keluarga', array('class'=>'control-label')) !!}
    <div class="col-md-12">
        {!! Form::text('kepala_keluarga', old('kepala_keluarga',$people->kepala_keluarga), array('class'=>'form-control form-control-primary')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('alamat', 'Alamat', array('class'=>'control-label')) !!}
    <div class="col-md-12">
        {!! Form::text('alamat', old('alamat',$people->alamat), array('class'=>'form-control form-control-primary')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('lng', 'Longitude', array('class'=>'control-label')) !!}
    <div class="col-md-12">
        {!! Form::text('lng', old('lng',$people->lng), array('class'=>'form-control form-control-primary')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('lat', 'Latitude', array('class'=>'control-label')) !!}
    <div class="col-md-12">
        {!! Form::text('lat', old('lat',$people->lat), array('class'=>'form-control form-control-primary')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('tgl_lahir', 'Tanggal Lahir', array('class'=>'control-label')) !!}
    <div class="col-md-12">
        {!! Form::text('tgl_lahir', old('tgl_lahir',$people->tgl_lahir), array('class'=>'form-control datepicker form-control-primary')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('tlpn', 'Nmr Tlpn', array('class'=>'control-label')) !!}
    <div class="col-md-12">
        {!! Form::text('tlpn', old('tlpn',$people->tlpn), array('class'=>'form-control form-control-primary')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('jenis_kelamin', 'Jenis Kelamin', array('class'=>'control-label')) !!}
    <div class="col-md-12">
        {!! Form::text('jenis_kelamin', old('jenis_kelamin',$people->jenis_kelamin), array('class'=>'form-control form-control-primary')) !!}
        
    </div>
</div>

<div class="form-group">
    <div class="col-md-12 col-sm-offset-2">
      {!! Form::submit(trans('quickadmin::templates.templates-view_edit-update'), array('class' => 'btn btn-primary')) !!}
      {!! link_to_route(config('quickadmin.route').'.people.index', trans('quickadmin::templates.templates-view_edit-cancel'), null, array('class' => 'btn btn-sm btn-default')) !!}
    </div>
</div>

{!! Form::close() !!}
</div>
</div>
</div>
@endsection