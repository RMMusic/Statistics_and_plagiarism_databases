@extends('layouts.app')
{{-- Content --}}
@section('content')
    <div class="bottom-menu-header">
        <h3>
            Статистика
            <div class="pull-right">
                <div class="pull-right">

                </div>
            </div>
        </h3>
    </div>

    @if (isset($services))
    {!! Form::model($services, array('url' => URL::to('lists/statistics') . '/' . $services->id, 'method' => 'PUT', 'class' => 'bf', 'files'=> true)) !!}
    @else
    {!! Form::open(array('url' => URL::to('lists/statistics'), 'method' => 'UPDATE', 'class' => 'bf', 'files'=> false)) !!}
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

            <div class="form-group  {{ $errors->has('start_date') ? 'has-error' : '' }}">
                {!! Form::label('start_date', 'Дата початку', array('class' => 'control-label')) !!}
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    {!! Form::date('start_date', \Carbon\Carbon::now(), array('class' => 'form-control','data-inputmask'=>'\'alias\': \'mm/dd/yyyy\'','data-mask'=>'')) !!}
                    <span class="help-block">{{ $errors->first('start_date', ':message') }}</span>
                </div>
            </div>

            <div class="form-group  {{ $errors->has('work_type_id') ? 'has-error' : '' }}">
                {!! Form::label('work_type_id', 'Вид роботи', array('class' => 'control-label')) !!}
                <div class="controls">
                    {!! Form::select('work_type_id', $workType->lists('name', 'id'), 1,array('class' => 'form-control')) !!}
                    <span class="help-block">{{ $errors->first('work_type_id', ':message') }}</span>
                </div>
            </div>

            <div class="form-group  {{ $errors->has('work_type_id') ? 'has-error' : '' }}">
                {!! Form::label('work_type_id', 'Результат', array('class' => 'control-label')) !!}
                <div class="controls">
                    {!! Form::select('work_type_id', $workStatus->lists('name', 'id'), 1,array('class' => 'form-control')) !!}
                    <span class="help-block">{{ $errors->first('work_type_id', ':message') }}</span>
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
                <div class="controls">
                    {!! Form::text('comment', null, array('class' => 'form-control')) !!}
                    <span class="help-block">{{ $errors->first('comment', ':message') }}</span>
                </div>
            </div>

        </div>

        <input type="hidden" name="job-type" value="{{$jobTypeId}}">

        <div class="form-group">
            <div class="col-md-12">
                <button type="reset" class="btn btn-sm btn-default">
                    <span class="glyphicon glyphicon-remove-circle"></span> Очистити
                </button>
                <button type="submit" class="btn btn-sm btn-success">
                    <span class="glyphicon glyphicon-ok-circle"></span>
                    @if	(isset($services))
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
