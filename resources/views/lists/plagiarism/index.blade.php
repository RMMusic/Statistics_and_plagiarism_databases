@extends('layouts.app')
@section('custom-style')
    <link rel="stylesheet" href="{{ asset ("/bower_components/AdminLTE/plugins/iCheck/all.css") }}">
@stop

{{-- Content --}}
@section('content')
    <div class="bottom-menu-header">
        <h3>
            Плагіат
            <div class="pull-right">
                <div class="pull-right">
                    <a href="/lists/plagiarism/create"
                       class="btn btn-sm  btn-primary"><span class="glyphicon glyphicon-plus-sign"></span> Додати</a>
                </div>
            </div>
        </h3>
    </div>

    <table id="table2" class="table table-bordered table-hover dataTable"
           data-global-search="true"
           data-paging="true"
           data-info="true"
           data-length-change="true"
           data-ajax="/lists/plagiarism/data"
           data-page-length="25">
        <thead>
        <tr>
            <th data-sortable="true" data-filterable="text">Ім'я</th>
            <th data-sortable="true" data-filterable="text">Тема</th>
            <th data-sortable="true" data-filterable="text">Дата початку</th>
            <th data-sortable="true" data-filterable="text">% плагіату</th>
            <th data-sortable="true" data-filterable="text">% помилок</th>
            <th data-sortable="true" data-filterable="text">Дата закінчення</th>
            <th>Коментарі</th>
            <th>Дія</th>
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