@extends('admin.templates.layout')
@section('title', 'Trang quản trị')
@section('controller','Dịch vụ')
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
            <form role="form" name="dichvu" method="post" action="{!! route('dichvu.store') !!}">
              <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
              <div class="box-body">
                <div class="form-group {{ $errors->has('txtnamedv') ? ' has-error' : '' }}" >
                  <label for="txtnamedv">Tên</label>
                  <input value="{{ old('txtnamedv') }}" type="text" name="txtnamedv" class="form-control">
                </div>

                <div class="form-group {{ $errors->has('txtmotadv') ? ' has-error' : '' }}" ">
                  <label>Mô tả</label>
                  <textarea class="form-control" name="txtmotadv" rows="3" placeholder="mô tả">{{ old('txtmotadv') }}</textarea>
                </div>

                <div class="form-group {{ $errors->has('txtgiatien') ? ' has-error' : '' }}">
                  <label for="txtgiatien">Giá tiền</label>
                  <input value="{{ old('txtgiatien') }}" type="text" name="txtgiatien" class="form-control">
                </div>
                <div class="form-group{{ $errors->has('optionloaidv') ? ' has-error' : '' }}">
                        <label for="optionloaidv">Loại dịch vụ</label>
                    <select class="form-control" name="optionloaidv">
                      @foreach($data_loaidv as $item) 
                        <option value="{!! $item->id !!}"> {!! $item->name !!}</option>
                      @endforeach
                    <!-- End Option -->
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