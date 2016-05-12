@extends('layouts.app')
@section('custom-style')
    <link rel="stylesheet" href="{{ asset ("/bower_components/AdminLTE/plugins/iCheck/all.css") }}">
@stop

{{-- Content --}}
@section('content')
    <div class="bottom-menu-header">
        <h3>
            Статистика, список
        </h3>
    </div>

    <table id="table2" class="table table-bordered table-hover dataTable"
           data-global-search="true"
           data-paging="true"
           data-info="true"
           data-length-change="true"
           data-ajax="/lists/statistics/data"
           data-page-length="25">
        <thead>
        <tr>
            <th data-sortable="true" data-filterable="text">Ім'я</th>
            {{--<th data-sortable="true" data-filterable="text">Телефон</th>--}}
            <th data-sortable="true" data-filterable="text">Дата початку</th>
            <th data-sortable="true" data-filterable="select">Вид роботи</th>
            <th data-sortable="true" data-filterable="select">Результат</th>
            <th data-sortable="true" data-filterable="text">Дата закінчення</th>
            <th>Коментарі</th>
            {{--<th >Дія</th>--}}
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