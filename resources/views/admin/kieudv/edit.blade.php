@extends('admin.templates.layout')
@section('title', 'Trang quản trị')
@section('controller','Kiểu dịch vụ')
@section('action','Chỉnh sửa')
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
              <h3 class="box-title">Chỉnh sửa</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            @include('blocks.error')
            <form role="form" name="kieudv" method="post" action="{!! route('kieudv.update',$data['id']) !!}">
              <input type="hidden" name="_token" value="{!! csrf_token() !!}" >
                <input name="_method" type="hidden" value="PUT">
              <div class="box-body">
                <div class="form-group {{ $errors->has('txtname') ? ' has-error' : '' }}" >
                  <label for="txtname">Tên</label>
                  <input value="{!! old('txtname' , isset($data) ? $data['name'] : null) !!}" type="text" name="txtname" class="form-control">
                </div>
                <div class="form-group {{ $errors->has('txtdonvigia') ? ' has-error' : '' }}">
                  <label for="txtdonvigia">Đơn vị giá</label>
                  <input value="{!! old('txtdonvigia' , isset($data) ? $data['donvigia'] : null) !!}" type="text" name="txtdonvigia" class="form-control">
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
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