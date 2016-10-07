@extends('layouts.app')

@section('custom-style')
    <style>
        html{
            /*background:linear-gradient(to bottom, rgba(51, 122, 183, 0.8), rgba(170, 221, 255, 0.7), rgba(170, 221, 255, 0.6), rgba(239, 232, 115, 0.71), rgba(228, 251, 69, 0.94))!important;*/
            background: url(/img/background.png);
            background-color: #3c8dbc
        }
        body, .wrapper,.login-page{
            background: none!important;
            background-color: none!important;
        }
    </style>
@endsection

@section('content')
<div class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="login-box-body_edited">
            <p class="login-box-msg">Science work databases "TSMU"</p>

            <form action="{{ url('/login') }}" method="post">

                {!! csrf_field() !!}

                <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

</div>

@endsection

@section('custom-scripts')
    <script src="{{ asset("bower_components/AdminLTE//plugins/iCheck/icheck.min.js") }}"></script>
    <script>

        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
@endsection