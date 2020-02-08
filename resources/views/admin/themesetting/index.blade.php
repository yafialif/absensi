@extends('admin.layouts.master')
@section('css')
    <!-- Data Table Css -->
    <link rel="stylesheet" type="text/css" href="ablepro/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="ablepro/assets/pages/data-table/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="ablepro/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
    <!-- Style.css -->

@endsection
@section('content')
<div class="col-sm-12">
        <!-- Nestable card start -->
        <div class="card">
            <div class="card-header">
                <h5>{{ trans('quickadmin::templates.templates-view_index-list') }}</h5>
            </div>
            <div class="card-block">
                <div id="nestable-menu" class="m-b-10">
                    {!! link_to_route(config('quickadmin.route').'.themesetting.create', trans('quickadmin::templates.templates-view_index-add_new') , null, array('class' => 'btn btn-success')) !!}
                </div>


                    @if ($themesetting->count())


                        <div class="table-responsive dt-responsive">

            <table class="table table-striped table-bordered nowrap datatable" id="datatable">
                <thead>
                    <tr>
                        <th>
                            {!! Form::checkbox('delete_all',1,false,['class' => 'mass']) !!}
                        </th>
                        <th>Nama User</th>
<th>Navbar Baground</th>
<th>Header Background</th>
<th>Menu Caption</th>
<th>Background Pattern</th>
<th>Active Item Theme</th>
<th>Frame Type</th>
<th>Layout Type</th>
<th>Layout Width</th>
<th>Menu Effect Desktop</th>
<th>Menu Effect Phone</th>
<th>Menu Icon Style</th>
<th>Dropdown Icon Styel</th>
<th>Fixwd Navbar Position</th>
<th>Fixed Header Position</th>
<th>Vertical Sub Menu Item Icon Style</th>
<th>Default Vertical Menu</th>
<th>On Toggle Vertical Menu</th>

                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($themesetting as $row)
                        <tr>
                            <td>
                                {!! Form::checkbox('del-'.$row->id,1,false,['class' => 'single','data-id'=> $row->id]) !!}
                            </td>
                            <td>{{ isset($row->user->name) ? $row->user->name : '' }}</td>
<td>{{ $row->navbarbg }}</td>
<td>{{ $row->headerbg }}</td>
<td>{{ $row->menucaption }}</td>
<td>{{ $row->bgpattern }}</td>
<td>{{ $row->activeitemtheme }}</td>
<td>{{ $row->frametype }}</td>
<td>{{ $row->layout_type }}</td>
<td>{{ $row->layout_width }}</td>
<td>{{ $row->menu_effect_desktop }}</td>
<td>{{ $row->menu_effect_phone }}</td>
<td>{{ $row->menu_icon_style }}</td>
<td>{{ $row->DropDownIconStyle }}</td>
<td>{{ $row->FixedNavbarPosition }}</td>
<td>{{ $row->FixedHeaderPosition }}</td>
<td>{{ $row->VerticalSubMenuItemIconStyle }}</td>
<td>{{ $row->defaultVerticalMenu }}</td>
<td>{{ $row->onToggleVerticalMenu }}</td>

                            <td>
                                {!! link_to_route(config('quickadmin.route').'.themesetting.edit', trans('quickadmin::templates.templates-view_index-edit'), array($row->id), array('class' => 'btn btn-sm btn-info')) !!}
                                {!! Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'onsubmit' => "return confirm('".trans("quickadmin::templates.templates-view_index-are_you_sure")."');",  'route' => array(config('quickadmin.route').'.themesetting.destroy', $row->id))) !!}
                                {!! Form::submit(trans('quickadmin::templates.templates-view_index-delete'), array('class' => 'btn btn-sm btn-danger')) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-xs-12">
                    <button class="btn btn-sm btn-danger" id="delete">
                        {{ trans('quickadmin::templates.templates-view_index-delete_checked') }}
                    </button>
                </div>
            </div>
            {!! Form::open(['route' => config('quickadmin.route').'.themesetting.massDelete', 'method' => 'post', 'id' => 'massDelete']) !!}
                <input type="hidden" id="send" name="toDelete">
            {!! Form::close() !!}
        </div>
	</div>
@else
    {{ trans('quickadmin::templates.templates-view_index-no_entries_found') }}
@endif
 </div>

            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $(document).ready(function () {
            $('#delete').click(function () {
                if (window.confirm('{{ trans('quickadmin::templates.templates-view_index-are_you_sure') }}')) {
                    var send = $('#send');
                    var mass = $('.mass').is(":checked");
                    if (mass == true) {
                        send.val('mass');
                    } else {
                        var toDelete = [];
                        $('.single').each(function () {
                            if ($(this).is(":checked")) {
                                toDelete.push($(this).data('id'));
                            }
                        });
                        send.val(JSON.stringify(toDelete));
                    }
                    $('#massDelete').submit();
                }
            });
        });
    </script>
@stop