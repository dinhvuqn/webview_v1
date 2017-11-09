@extends('admin.templates.layout')
@section('title', 'Trang quản trị')
@section('controller','Dịch vụ')
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
            <form role="form" name="dichvu" method="post" action="{!! route('dichvu.update',$data['id']) !!}">
              <input type="hidden" name="_token" value="{!! csrf_token() !!}" >
              <input name="_method" type="hidden" value="PUT">
              <div class="box-body">
                <div class="form-group {{ $errors->has('txtnamedv') ? ' has-error' : '' }}" >
                  <label for="txtnamedv">Tên</label>
                  <input value="{{ old('txtnamedv', isset($data) ? $data['name'] : null) }}" type="text" name="txtnamedv" class="form-control">
                </div>

                <div class="form-group {{ $errors->has('txtmotadv') ? ' has-error' : '' }}" ">
                  <label>Mô tả</label>
                  <textarea class="form-control" name="txtmotadv" rows="3" placeholder="mô tả">{{ old('txtmotadv',isset($data) ? $data['mota'] : null) }}</textarea>
                </div>

                <div class="form-group {{ $errors->has('txtgiatien') ? ' has-error' : '' }}">
                  <label for="txtgiatien">Giá tiền</label>
                  <input value="{{ old('txtgiatien',isset($data) ? $data['giatien'] : null) }}" type="text" name="txtgiatien" class="form-control">
                </div>
                <div class="form-group{{ $errors->has('optionloaidv') ? ' has-error' : '' }}">
                        <label for="optionloaidv">Loại dịch vụ</label>
                    <select class="form-control" name="optionloaidv">
                      <?php                 
                                    cate_parent($data_loaidv,0,"",$data["id_loaidv"]); 
                              ?>
                    </select>
                      @if ($errors->has('optionloaidv'))
                        <span class="help-block">
                          <strong>{{ $errors->first('optionloaidv') }}</strong>
                          </span>
                      @endif
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