@extends('admin.layouts.master')

@section('content')
    <div class="col-sm-12">
        <!-- Nestable card start -->
        <div class="card">
            <div class="card-header">
                <h5>{{ trans('quickadmin::admin.users-create-create_user') }}</h5>
            </div>
            <div class="card-block">
    <div class="row">
        <div class="col-md-12 col-sm-offset-2">
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        {!! implode('', $errors->all('
                        <li class="error">:message</li>
                        ')) !!}
                    </ul>
                </div>
            @endif
        </div>
    </div>

    {!! Form::open(['route' => 'users.store', 'class' => 'form-horizontal']) !!}

    <div class="form-group">
        {!! Form::label('name', trans('quickadmin::admin.users-create-name'), ['class'=>'float-label col-form-label']) !!}
        <div class="col-md-12">
            {!! Form::text('name', old('name'), ['class'=>'form-control form-control-primary', 'placeholder'=> trans('quickadmin::admin.users-create-name_placeholder')]) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('email', trans('quickadmin::admin.users-create-email'), ['class'=>'float-label col-form-label']) !!}
        <div class="col-md-12">
            {!! Form::email('email', old('email'), ['class'=>'form-control form-control-primary', 'placeholder'=> trans('quickadmin::admin.users-create-email_placeholder')]) !!}
        </div>
    </div>
                <div class="form-group">
                    {!! Form::label('image', 'Image*', array('class'=>'control-label')) !!}
                    <div class="col-md-12">
                        {!! Form::file('image') !!}
                        {!! Form::hidden('image_w', 4096) !!}
                        {!! Form::hidden('image_h', 4096) !!}

                    </div>
                </div>

    <div class="form-group">
        {!! Form::label('password', trans('quickadmin::admin.users-create-password'), ['class'=>'float-label col-form-label']) !!}
        <div class="col-md-12">
            {!! Form::password('password', ['class'=>'form-control form-control-primary', 'placeholder'=> trans('quickadmin::admin.users-create-password_placeholder')]) !!}
        </div>
    </div>


    <div class="form-group">
        {!! Form::label('role_id', trans('quickadmin::admin.users-create-role'), ['class'=>'float-label col-form-label']) !!}
        <div class="col-md-12">
            {!! Form::select('role_id', $roles, old('role_id'), ['class'=>'form-control form-control-primary']) !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-12 col-sm-offset-2">
            {!! Form::submit(trans('quickadmin::admin.users-create-btncreate'), ['class' => 'btn btn-primary']) !!}
        </div>
    </div>

    {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection


