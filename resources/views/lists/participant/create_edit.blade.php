@extends('layouts.app')
{{-- Content --}}
@section('content')
    <div class="bottom-menu-header">
        <h3>
            Додати нового науковця
        </h3>
    </div>

    @if (isset($participant))
        {!! Form::model($participant, array('url' => URL::to('/lists/participant') . '/' . $participant->id . '/edit', 'method' => 'PUT', 'class' => 'bf', 'files'=> true)) !!}
    @else
        {!! Form::open(array('url' => URL::to('lists/participant/store'), 'method' => 'UPDATE', 'class' => 'bf', 'files'=> false)) !!}
    @endif
    <!-- Tabs Content -->
    <div class="tab-content row">
        <!-- General tab -->
        <div class="col-xs-12 tab-pane active" id="tab-general">

            <div class="form-group  {{ $errors->has('name') ? 'has-error' : '' }}">
                {!! Form::label('name', 'Ім\'я', array('class' => 'control-label')) !!}
                <div class="input-group">
                    <div class="input-group-addon {{ $errors->has('name') ? 'has-error' : '' }}">
                        <i class="required-fields fa fa-user"></i>
                    </div>
                    {!! Form::text('name', null, array('class' => 'form-control', 'placeholder = "Ім\'я"', 'required')) !!}
                    <span class="help-block">{{ $errors->first('name', ':message') }}</span>
                </div>
            </div>

            <div class="form-group  {{ $errors->has('email') ? 'has-error' : '' }}">
                {!! Form::label('email', '@ Пошта', array('class' => 'control-label')) !!}
                <div class="input-group">
                    <div class="input-group-addon {{ $errors->has('phone') ? 'has-error' : '' }}">
                        <i class="fa fa-envelope"></i>
                    </div>
                    {!! Form::text('email', null, array('class' => 'form-control', 'placeholder = "@"')) !!}
                    <span class="help-block">{{ $errors->first('email', ':message') }}</span>
                </div>
            </div>

            <div class="form-group  {{ $errors->has('phone') ? 'has-error' : '' }}">
                {!! Form::label('phone', 'Телефон', array('class' => 'control-label')) !!}
                <div class="input-group">
                    <div class="input-group-addon {{ $errors->has('phone') ? 'has-error' : '' }}">
                        <i class="fa fa-phone"></i>
                    </div>
                    {!! Form::text('phone', null, array('class' => 'form-control', 'placeholder = "Номер телефону"')) !!}
                </div>
                <span class="help-block">{{ $errors->first('phone', ':message') }}</span>
            </div>

            <div><h3><span class="required-fields">*</span> Обовязкові поля</h3></div>

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
    </div>