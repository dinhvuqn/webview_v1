@extends('admin.templates.layout')
@section('title', 'Trang quản trị')
@section('controller','Kiểu dịch vụ')
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
            <form role="form" name="kieudv" method="post" action="{!! route('kieudv.store') !!}">
              <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
              <div class="box-body">
                <div class="form-group {{ $errors->has('txtname') ? ' has-error' : '' }}" >
                  <label for="txtname">Tên</label>
                  <input value="{{ old('txtname') }}" type="text" name="txtname" class="form-control">
                </div>
                <div class="form-group {{ $errors->has('txtdonvigia') ? ' has-error' : '' }}">
                  <label for="txtdonvigia">Đơn vị giá</label>
                  <input value="{{ old('txtdonvigia') }}" type="text" name="txtdonvigia" class="form-control">
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