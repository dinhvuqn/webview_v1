@extends('admin.templates.layout')
@section('title', 'Trang quản trị')
@section('controller','Tài khoản')
@section('action','Thêm mới')
@section('link_action','/admin')
@section('content')


    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Thêm mới</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            @include('blocks.error')
            <form role="form" name="user" method="post" action="{!! route('user.store') !!}">
              <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
              <div class="box-body">
                <div class="form-group {{ $errors->has('nameuser') ? ' has-error' : '' }}" >
                  <label for="nameuser">Tên</label>
                  <input value="{{ old('nameuser') }}" type="text" name="nameuser" class="form-control">
                </div>
                <div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
                  <label for="username">Username</label>
                  <input value="{{ old('username') }}" type="text" name="username" class="form-control">
                </div>
                <div class="form-group {{ $errors->has('matkhau') ? ' has-error' : '' }}">
                  <label for="matkhau">Mật khẩu</label>
                  <input type="password" name="matkhau" class="form-control">
                </div>
                <!-- <div class="form-group {{ $errors->has('password_comfirmation') ? ' has-error' : '' }}">
                  <label for="password_comfirmation">Nhập lại mật khẩu</label>
                  <input type="text" name="password_comfirmation" class="form-control">
                </div> -->
                <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                  <label for="phone">Số điện thoại</label>
                  <input value="{{ old('phone') }}" type="text" name="phone" class="form-control">
                </div>
                <div class="form-group{{ $errors->has('optionrole') ? ' has-error' : '' }}">
                        <label for="optionrole">Quyền</label>
                    <select class="form-control" name="optionrole">
                      @foreach($roles as $item) 
                        <option value="{!! $item->id !!}"> {!! $item->name !!}</option>
                      @endforeach
                    <!-- End Option -->
                    </select>
                      @if ($errors->has('optionrole'))
                        <span class="help-block">
                          <strong>{{ $errors->first('optionrole') }}</strong>
                          </span>
                      @endif
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Thêm</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  @stop