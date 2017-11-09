@extends('layouts.app')

@section('content')
<div class="login-box">
  <div class="login-logo">
    <a><b>Trang Quản trị</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Đăng nhập</p>

    <form role="form" method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}
      <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }} has-feedback">
        <input id="username" name="username" type="text" class="form-control" placeholder="Username" value="{{ old('username') }}" autofocus>
        @if ($errors->has('username'))
          <span class="help-block">
          <strong>{{ $errors->first('username') }}</strong>
          </span>
        @endif
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
        <input id="password" name="password" type="password" class="form-control" placeholder="Mật khẩu">
        @if ($errors->has('password'))
          <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
          </span>
        @endif
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Ghi nhớ
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng nhập</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <!-- /.social-auth-links -->

    <a href="{{ route('password.request') }}">Quên mật khẩu</a><br>
    @if (Auth::guest())
    <a href="{{ route('register') }}" class="text-center">Đăng ký tài khoản</a>
    @endif
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@stop


