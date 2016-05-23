@extends('layouts.app')
@section('custom-style')
    {{--<link href="{{ asset("/bower_components/AdminLTE/plugins/select2/select2.min.css")}}" rel="stylesheet" type="text/css"/>--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css"/>
@endsection
{{-- Content --}}
@section('content')
    <div class="bottom-menu-header">
        <h3>
            Статистика
        </h3>
    </div>

    @if (isset($thisWork))
    {!! Form::model($thisWork, array('url' => URL::to('lists/statistics') . '/' . $thisWork->id . '/edit', 'method' => 'PUT', 'class' => 'bf', 'files'=> true)) !!}
    @else
    {!! Form::open(array('url' => URL::to('lists/statistics/store'), 'method' => 'UPDATE', 'class' => 'bf', 'files'=> false)) !!}
    @endif
            <!-- Tabs Content -->
    <div class="tab-content row">
        <!-- General tab -->
        <div class="col-xs-12 tab-pane active" id="tab-general">
            @if (!isset($thisWork))
                <div class="form-group">
                    {!! Form::label('participants', 'Ім\'я', array('class' => 'control-label')) !!}
                    <div class="input-group">
                        <div class="input-group-addon {{ $errors->has('participants') ? 'has-error' : '' }}">
                            <i class="required-fields fa fa-user-md"></i>
                        </div>
                        <select name="participant_id" class="form-control participant-select2">
                            <option>Введіть ім'я</option>
                        </select>
                    </div>
                </div>
            @else
                <div>
                    <h3>
                        {{$participant}}
                    </h3>
                </div>
            @endif

            <div class="form-group  {{ $errors->has('work_them') ? 'has-error' : '' }}">
                {!! Form::label('work_them', 'Тема', array('class' => 'control-label')) !!}
                <div class="input-group">
                    <div class="input-group-addon {{ $errors->has('work_them') ? 'has-error' : '' }}">
                        <i class="fa fa-file-text"></i>
                    </div>
                    {!! Form::text('work_them', null, array('class' => 'form-control')) !!}
                    <span class="help-block">{{ $errors->first('work_them', ':message') }}</span>
                </div>
            </div>

            @if (!isset($thisWork))
                <div class="form-group">
                    {!! Form::label('start_date', 'Дата початку', array('class' => 'control-label')) !!}
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="required-fields fa fa-calendar"></i>
                        </div>
                        {!! Form::date('start_date', \Carbon\Carbon::now(), array('class' => 'form-control','data-inputmask'=>'\'alias\': \'mm/dd/yyyy\'','data-mask'=>'')) !!}
                    </div>
                </div>
            @endif
                
            <div class="form-group">
                {!! Form::label('work_type_id', 'Вид роботи', array('class' => 'control-label')) !!}
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-ambulance"></i>
                    </div>
                    {!! Form::select('work_type_id', $workType->lists('name', 'id'), 1,array('class' => 'form-control')) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('work_status_id', 'Результат', array('class' => 'control-label')) !!}
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-thumbs-up"></i>
                    </div>
                    {!! Form::select('work_status_id', $workStatus->lists('name', 'id'), 1,array('class' => 'form-control')) !!}
                </div>
            </div>

            <div class="form-group  {{ $errors->has('end_date') ? 'has-error' : '' }}">
                {!! Form::label('end_date', 'Дата закінчення', array('class' => 'control-label')) !!}
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    {!! Form::date('end_date', \Carbon\Carbon::now(), array('class' => 'form-control','data-inputmask'=>'\'alias\': \'mm/dd/yyyy\'','data-mask'=>'')) !!}
                    <span class="help-block">{{ $errors->first('end_date', ':message') }}</span>
                </div>
            </div>

            <div class="form-group  {{ $errors->has('comment') ? 'has-error' : '' }}">
                {!! Form::label('comment', 'Коментарі', array('class' => 'control-label')) !!}
                <div class="input-group">
                    <div class="input-group-addon {{ $errors->has('name') ? 'has-error' : '' }}">
                        <i class="fa fa-comment"></i>
                    </div>
                    {!! Form::text('comment', null, array('class' => 'form-control')) !!}
                    <span class="help-block">{{ $errors->first('comment', ':message') }}</span>
                </div>
            </div>

        </div>

        <div><h3><span class="required-fields">*</span> Обовязкові поля</h3></div>

        <input type="hidden" name="job_type_id" value="{{$jobTypeId}}">

        <div class="form-group">
            <div class="col-md-12">
                <button type="reset" class="btn btn-sm btn-default">
                    <span class="glyphicon glyphicon-remove-circle"></span> Очистити
                </button>
                <button type="submit" class="btn btn-sm btn-success">
                    <span class="glyphicon glyphicon-ok-circle"></span>
                    @if	(isset($thisWork))
                        Зберегти
                    @else
                        Створити
                    @endif
                </button>
            </div>
        </div>
        {!! Form::close() !!}
        @stop
    </div>

@section('custom-scripts')

    {{--<script src="{{ asset ("/bower_components/AdminLTE/plugins/select2/select2.min.js") }}"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>

    <script>
        $( document ).ready(function() {

            function formatRepo (repo) {
                var markup = repo.name;
                return markup;
            }

            function formatRepoSelection (repo) {
                return repo.name;
            }


            $(".participant-select2").select2({
                ajax: {
                    url: "/participantSearch",
                    type: 'POST',
                    dataType: 'json',
                    delay: 1000,
                    data: function (params) {
                        return {
                            q: params.term, // search term
                            page: params.page,
                            _token: "{{ csrf_token() }}"
                        };
                    },
                    processResults: function (data, params) {
                        // parse the results into the format expected by Select2
                        // since we are using custom formatting functions we do not need to
                        // alter the remote JSON data, except to indicate that infinite
                        // scrolling can be used
                        params.page = params.page || 1;

                        return {
                            results: data,
                            pagination: {
                                more: (params.page * 30) < data.total_count
                            }
                        };
                    },
                    cache: true
                },
                escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
                minimumInputLength: 3,
                templateResult: formatRepo, // omitted for brevity, see the source of this page
                templateSelection: formatRepoSelection, // omitted for brevity, see the source of this page
            });
        })
    </script>

@stop
