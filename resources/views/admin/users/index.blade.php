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
                <h5>{{ trans('quickadmin::admin.users-index-users_list') }}</h5>
            </div>
            <div class="card-block">
                <div id="nestable-menu" class="m-b-10">
                    {!! link_to_route('users.create', trans('quickadmin::admin.users-index-add_new'), [], ['class' => 'btn btn-primary waves-effect waves-light m-b-10 m-r-20']) !!}
                </div>


                    @if($users->count() > 0)


                        <div class="table-responsive dt-responsive">
                            <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                                <thead>
                                <tr>
                                    <th>{{ trans('quickadmin::admin.users-index-name') }}</th>
                                    <th>&nbsp;</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>
                                            {!! link_to_route('users.edit', trans('quickadmin::admin.users-index-edit'), [$user->id], ['class' => 'btn btn-sm btn-info']) !!}
                                            {!! Form::open(['style' => 'display: inline-block;', 'method' => 'DELETE', 'onsubmit' => 'return confirm(\'' . trans('quickadmin::admin.users-index-are_you_sure') . '\');',  'route' => array('users.destroy', $user->id)]) !!}
                                            {!! Form::submit(trans('quickadmin::admin.users-index-delete'), array('class' => 'btn btn-sm btn-danger')) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

            </div>
        </div>
    </div>


    @else
        {{ trans('quickadmin::admin.users-index-no_entries_found') }}
    @endif

@endsection

@section('js')

    <!-- data-table js -->
    <script src="ablepro/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="ablepro/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="ablepro/assets/pages/data-table/js/jszip.min.js"></script>
    <script src="ablepro/assets/pages/data-table/js/pdfmake.min.js"></script>
    <script src="ablepro/assets/pages/data-table/js/vfs_fonts.js"></script>
    <script src="ablepro/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="ablepro/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="ablepro/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="ablepro/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="ablepro/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
    <!-- Custom js -->
    <script src="ablepro/assets/pages/data-table/js/data-table-custom.js"></script>
@endsection