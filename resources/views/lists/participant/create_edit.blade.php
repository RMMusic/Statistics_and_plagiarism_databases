@extends('layouts.app')
@section('custom-style')
    {{--<link href="{{ asset("/bower_components/AdminLTE/plugins/select2/select2.min.css")}}" rel="stylesheet" type="text/css"/>--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css"/>
@endsection
{{-- Content --}}
@section('content')
    <div class="bottom-menu-header">
        <h3>
            Додати нового науковця
        </h3>
    </div>

    @if (isset($participant))
        {!! Form::model($participant, array('url' => URL::to('lists/participant') . '/' . $participant->id, 'method' => 'PUT', 'class' => 'bf', 'files'=> false)) !!}
    @else
        {!! Form::open(array('url' => URL::to('lists/participant/store'), 'method' => 'UPDATE', 'class' => 'bf', 'files'=> false)) !!}
    @endif
    <!-- Tabs Content -->
    <div class="tab-content row">
        <!-- General tab -->
        <div class="col-xs-12 tab-pane active" id="tab-general">

            <div class="form-group  {{ $errors->has('name') ? 'has-error' : '' }}">
                {!! Form::label('name', 'Ім\'я', array('class' => 'control-label')) !!}
                <div class="controls">
                    {!! Form::text('name', null, array('class' => 'form-control')) !!}
                    <span class="help-block">{{ $errors->first('name', ':message') }}</span>
                </div>
            </div>

            <div class="form-group  {{ $errors->has('email') ? 'has-error' : '' }}">
                {!! Form::label('email', 'Мило', array('class' => 'control-label')) !!}
                <div class="input-group">
                    <div class="input-group-addon {{ $errors->has('phone') ? 'has-error' : '' }}">
                        <i class="fa fa-github-alt"></i>
                    </div>
                    {!! Form::text('email', null, array('class' => 'form-control')) !!}
                    <span class="help-block">{{ $errors->first('email', ':message') }}</span>
                </div>
            </div>

            <div class="form-group  {{ $errors->has('phone') ? 'has-error' : '' }}">
                {!! Form::label('phone', 'Телефон', array('class' => 'control-label')) !!}
                <div class="input-group">
                    <div class="input-group-addon {{ $errors->has('phone') ? 'has-error' : '' }}">
                        <i class="fa fa-phone"></i>
                    </div>
                    {!! Form::text('phone', null, array('class' => 'form-control','data-inputmask'=>'\'mask\': \'(999) 999-99-99\'','data-mask'=>'')) !!}
                </div>
                <span class="help-block">{{ $errors->first('phone', ':message') }}</span>
            </div>

            <div class="form-group">
            <select class="participant-select2 col-md-12">
                <option value="ivaynberg/select2" selected="selected"></option>
            </select>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <button type="reset" class="btn btn-sm btn-default">
                        <span class="glyphicon glyphicon-remove-circle"></span> Очистити
                    </button>
                    <button type="submit" class="btn btn-sm btn-success">
                        <span class="glyphicon glyphicon-ok-circle"></span>
                        @if	(isset($participant))
                            Зберегти
                        @else
                            Створити
                        @endif
                    </button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
        @stop

        @section('custom-scripts')

        {{--<script src="{{ asset ("/bower_components/AdminLTE/plugins/select2/select2.min.js") }}"></script>--}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>

        <script>
        $( document ).ready(function() {

            function formatRepo (repo) {
                var markup = "<div class='select2-result-repository clearfix'>" +
                        "<div class='select2-result-repository__title'>" + repo.text + "</div></div>";
                return markup;
            }

            function formatRepoSelection (repo) {
                return repo.text;
            }

            $(".participant-select2").select2({
                ajax: {
                    url: "/search",
                    type: 'POST',
                    dataType: 'json',
                    delay: 250,
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
                minimumInputLength: 1,
                templateResult: formatRepo, // omitted for brevity, see the source of this page
                templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
            });
        })
        </script>

@stop