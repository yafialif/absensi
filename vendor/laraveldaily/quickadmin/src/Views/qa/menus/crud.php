@extends('admin.layouts.master')
@section('content')
<div class="col-sm-6">
    <!-- Nestable card start -->
    <div class="card">
        <div class="card-header">
            <h5>{{ trans('quickadmin::qa.menus-createCrud-create_new_crud') }}</h5>
        </div>
        <div class="card-block">

            <div class="row">
                <div class="col-sm-12 col-sm-offset-2">
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

            {!! Form::open(['class' => 'form']) !!}

            <div class="form-group form-default form-static-label">
                {!! Form::label('parent_id', trans('quickadmin::qa.menus-createCrud-crud_parent'), ['class'=>'float-label col-form-label']) !!}
                <div class="col-sm-12">
                    {!! Form::select('parent_id', $parentsSelect, old('parent_id'), ['class'=>'form-control form-control-primary']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('name', trans('quickadmin::qa.menus-createCrud-crud_name'), ['class'=>'float-label col-form-label']) !!}
                <div class="col-sm-12">
                    {!! Form::text('name', old('name'), ['class'=>'form-control form-control-primary', 'placeholder'=> trans('quickadmin::qa.menus-createCrud-crud_name_placeholder')]) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('title', trans('quickadmin::qa.menus-createCrud-crud_title'), ['class'=>'float-label col-form-label']) !!}
                <div class="col-sm-12">
                    {!! Form::text('title', old('title'), ['class'=>'form-control form-control-primary', 'placeholder'=> trans('quickadmin::qa.menus-createCrud-crud_title_placeholder')]) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('roles', trans('quickadmin::qa.menus-createCrud-roles'), ['class'=>'float-label col-form-label']) !!}
                <div class="col-sm-12">
                    @foreach($roles as $role)
                    <div>
                        <label>
                            {!! Form::checkbox('roles['.$role->id.']',$role->id,old('roles.'.$role->id)) !!}
                            {!! $role->title !!}
                        </label>
                    </div>
                    @endforeach
                </div>
            </div>


            <div class="form-group">
                {!! Form::label('soft', trans('quickadmin::qa.menus-createCrud-soft_delete'), ['class'=>'float-label col-form-label']) !!}
                <div class="col-sm-12">
                    {!! Form::select('soft', [1 => trans('quickadmin::strings.yes'), 0 => trans('quickadmin::strings.no')], old('soft'), ['class' => 'form-control form-control-primary']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('icon', trans('quickadmin::qa.menus-createCrud-icon'), ['class'=>'float-label col-form-label']) !!}
                <div class="col-sm-12">
                    {!! Form::text('icon', old('icon','fa-database'), ['class'=>'form-control form-control-primary', 'placeholder'=> trans('quickadmin::qa.menus-createCrud-icon_placeholder')]) !!}
                </div>
            </div>

            <hr/>
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="card text-white bg-secondary">
        <div class="card-header">Cara Membuat CRUD Baru</div>
        <div class="card-body">
            <h5 class="card-title">Ikuti Tips" Berikut ini</h5>
            <p class="card-text">
            <ol class="">
                <li>isi fild yg ada pada kolom <b>Create new CRUD menu item</b></li>
                <li>pada kolom fild CRUD Name jangan menggunakan spasi karana berfungsi sebagai nama tabael pada database</li>
                <li><b>soft delete</b> berfungsi untuk menghapus data secata tidak permanen</li>
                <li>pada fild<b>Icon</b> kamu bisa menggunakan refrensi class icon berikut:
                    <ul>

                        <li><a href="https://fontawesome.com/">Font Awesome</a> </li>
                        <li><a href="https://materialdesignicons.com/">Material Design</a> </li>
                        <li><a href="http://icofont.com/">Ico Fonts</a> </li>
                        <li><a href="http://typicons.com/">Typicons</a> </li>
                    </ul>
                </li>
                <li>pada Add Fild, Untuk Menggunakan Relationship hanya bisa 1 refrese Relationship</li>
                <li>pada Add Fild, Fild <b>DB name</b> Tidak boleh menggunakan spasi</li>
            </ol>
            </p>
        </div>
    </div>
</div>
<div class="col-sm-12">
    <!-- Nestable card start -->
    <div class="card">
        <div class="card-header">
            <h5>{{ trans('quickadmin::qa.menus-createCrud-add_fields') }}</h5>
        </div>
        <div class="card-block">


            <table class="table">
                <tbody id="generator">
                <tr>
                    <td>{{ trans('quickadmin::qa.menus-createCrud-show_in_list') }}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                @if(old('f_type'))
                @foreach(old('f_type') as $index => $fieldName)
                @include('tpl::menu_field_line', ['index' => $index])
                @endforeach
                @else
                @include('tpl::menu_field_line', ['index' => ''])
                @endif
                </tbody>
            </table>

            <div class="form-group">
                <div class="col-md-12">
                    <button type="button" id="addField" class="btn btn-sm btn-success"><i
                            class="fa fa-plus"></i> {{ trans('quickadmin::qa.menus-createCrud-add_field') }}
                    </button>
                </div>
            </div>

            <hr/>

            <div class="form-group">
                <div class="col-md-12">
                    {!! Form::submit(trans('quickadmin::qa.menus-createCrud-create_crud'), ['class' => 'btn btn-sm btn-primary']) !!}
                </div>
            </div>

            {!! Form::close() !!}

            <div style="display: none;">
                <table>
                    <tbody id="line">
                    @include('tpl::menu_field_line', ['index' => ''])
                    </tbody>
                </table>

                <!-- Select for relationship column-->
                @foreach($models as $key => $model)
                <select name="f_relationship_field[{{ $key }}]" class="form-control form-control-primary relationship-field rf-{{ $key }}">
                    <option value="">{{ trans('quickadmin::qa.menus-createCrud-select_display_field') }}</option>
                    @foreach($model as $key2 => $option)
                    <option value="{{ $option }}"
                            @if($option == old('f_relationship_field.'.$key)) selected @endif>{{ $option }}</option>
                    @endforeach
                </select>
                @endforeach
                <!-- /Select for relationship column-->
            </div>
        </div>
    </div>
</div>


@endsection

@section('javascript')

<script>
    function typeChange(e) {
        var val = $(e).val();
        // Hide all possible outputs
        $(e).parent().parent().find('.value').hide();
        $(e).parent().parent().find('.default_c').hide();
        $(e).parent().parent().find('.relationship').hide();
        $(e).parent().parent().find('.title').show().val('');
        $(e).parent().parent().find('.texteditor').hide();
        $(e).parent().parent().find('.size').hide();
        $(e).parent().parent().find('.dimensions').hide();
        $(e).parent().parent().find('.enum').hide();

        // Show a checbox which enables/disables showing in list
        $(e).parent().parent().parent().find('.show2').show();
        $(e).parent().parent().parent().find('.show_hid').val(1);
        switch (val) {
            case 'radio':
                $(e).parent().parent().find('.value').show();
                break;
            case 'checkbox':
                $(e).parent().parent().find('.default_c').show();
                break;
            case 'relationship':
                $(e).parent().parent().find('.relationship').show();
                $(e).parent().parent().find('.title').hide().val('-');
                break;
            case 'textarea':
                $(e).parent().parent().find('.show2').hide();
                $(e).parent().parent().find('.show_hid').val(0);
                $(e).parent().parent().find('.texteditor').show();
                break;
            case 'file':
                $(e).parent().parent().find('.size').show();
                break;
            case 'enum':
                $(e).parent().parent().find('.enum').show();
                break;
            case 'photo':
                $(e).parent().parent().find('.size').show();
                $(e).parent().parent().find('.dimensions').show();
                break;
        }
    }

    function relationshipChange(e) {
        var val = $(e).val();
        $(e).parent().parent().find('.relationship-field').remove();
        var select = $('.rf-' + val).clone();
        $(e).parent().parent().find('.relationship-holder').html(select);
    }

    $(document).ready(function () {
        $('.type').each(function () {
            typeChange($(this))
        });
        $('.relationship').each(function () {
            relationshipChange($(this))
        });

        $('.show2').change(function () {
            var checked = $(this).is(":checked");
            if (checked) {
                $(this).parent().find('.show_hid').val(1);
            } else {
                $(this).parent().find('.show_hid').val(0);
            }
        });

        // Add new row to the table of fields
        $('#addField').click(function () {
            var line = $('#line').html();
            var table = $('#generator');
            table.append(line);
        });

        // Remove row from the table of fields
        $(document).on('click', '.rem', function () {
            $(this).parent().parent().remove();
        });

        $(document).on('change', '.type', function () {
            typeChange($(this))
        });
        $(document).on('change', '.relationship', function () {
            relationshipChange($(this))
        });
    });

</script>
@stop