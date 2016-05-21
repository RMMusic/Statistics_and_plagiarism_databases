@extends('layouts.app')
@section('custom-style')
    <link rel="stylesheet" href="{{ asset ("/bower_components/AdminLTE/plugins/iCheck/all.css") }}">
@stop

{{-- Content --}}
@section('content')
    <div class="bottom-menu-header">
        <h4>
            Учасники
            <div class="pull-right">
                <div class="pull-right">
                    <a href="/lists/participant/create"
                       class="btn btn-sm  btn-primary"><span class="glyphicon glyphicon-plus-sign"></span> Додати</a>
                </div>
            </div>
        </h4>
    </div>

    <table id="table2" class="table table-bordered table-hover dataTable"
           data-global-search="false"
           data-paging="true"
           data-info="true"
           data-length-change="false"
           data-ajax="/lists/participant/data"
           data-page-length="25">
        <thead>
        <tr>
            <th data-sortable="true" data-filterable="text">Ім'я</th>
            <th data-sortable="true" data-filterable="text">Пошта</th>
            <th data-sortable="true" data-filterable="text">Телефон</th>
            <th>Змінити</th>
        </tr>
        </thead>
        <tbody></tbody>
    </table>
@stop

{{-- Scripts --}}
@section('custom-scripts')
    <script src="{{ asset('js/dataTablesSelect.js') }}"></script>
    <script>
        $('#table2').dataTableHelper();
    </script>
@stop