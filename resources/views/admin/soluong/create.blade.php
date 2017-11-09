@extends('admin.templates.layout')
@section('title', 'Trang quản trị')
@section('controller','Số lượng')
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
            <form role="form" name="soluong" method="post" action="{!! route('soluong.store') !!}">
              <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
              <div class="box-body">
                <div class="form-group {{ $errors->has('txtgiatri') ? ' has-error' : '' }}" >
                  <label for="txtgiatri">Giá trị</label>
                  <input value="{{ old('txtgiatri') }}" type="text" name="txtgiatri" class="form-control">
                </div>
                <div class="form-group{{ $errors->has('optionkieudv') ? ' has-error' : '' }}">
                        <label for="optionkieudv">Loại dịch vụ</label>
                    <select class="form-control" name="optionkieudv">
                      @foreach($data_kieudv as $item) 
                        <option value="{!! $item->id !!}"> {!! $item->name !!}</option>
                      @endforeach
                    <!-- End Option -->
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