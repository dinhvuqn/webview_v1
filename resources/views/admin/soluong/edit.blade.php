@extends('admin.templates.layout')
@section('title', 'Trang quản trị')
@section('controller','Số lượng')
@section('action','Chỉnh sữa')
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
            <form role="form" name="soluong" method="post" action="{!! route('soluong.update',$data['id']) !!}">
              <input type="hidden" name="_token" value="{!! csrf_token() !!}" >
                <input name="_method" type="hidden" value="PUT">
              <div class="box-body">
                <div class="form-group {{ $errors->has('txtgiatri') ? ' has-error' : '' }}" >
                  <label for="txtgiatri">Giá trí</label>
                  <input value="{!! old('txtgiatri' , isset($data) ? $data['giatri'] : null) !!}" type="text" name="txtgiatri" class="form-control">
                </div>
                <div class="form-group{{ $errors->has('optionkieudv') ? ' has-error' : '' }}">
                        <label for="optionkieudv">Kiểu dịch vụ</label>
                    <select class="form-control" name="optionkieudv">
                      <?php                 
                                    cate_parent($data_kieudv,0,"",$data["id_kieudv"]); 
                              ?>
                    </select>
                      @if ($errors->has('optionkieudv'))
                        <span class="help-block">
                          <strong>{{ $errors->first('optionkieudv') }}</strong>
                          </span>
                      @endif
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