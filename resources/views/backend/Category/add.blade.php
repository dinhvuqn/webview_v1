@extends('backend.master')
@section('controller','Danh mục')
@section('action','Thêm mới danh mục')
@section('link','Danh mục')
@section('content')
<section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
            
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Thêm mới danh mục</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                @include('blocks.error')
                <form role="form" name="category" class="form-horizontal" method="post" action="{!! route('danhmuc.store') !!}">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                  <div class="box-body">
                      <div class="form-group{{ $errors->has('txttendanhmuc') ? ' has-error' : '' }}">
                        <label for="exampleInputEmail1" class="col-md-2">Tên Danh mục:</label>
                        <div class="col-md-12"> 
                            <input type="text" class="form-control" name="txttendanhmuc" onKeyUp="javascript:dodacheck(category.txttendanhmuc);"  placeholder="Tên Danh mục..." value="{{ old('txttendanhmuc') }}">
                            @if ($errors->has('txttendanhmuc'))
                              <span class="help-block">
                              <strong>{{ $errors->first('txttendanhmuc') }}</strong>
                              </span>
                            @endif
                        </div>
                      </div>
                      <div class="form-group">
                          <input id="checkbox_visible" name="checkbox_visible" type="checkbox" value="1" checked="checked"> 
                          
                          <label for="exampleInputEmail1" class="col-md-2" >Trạng thái:</label>
                      </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button class="btn btn-primary" type="submit" ><i class="fa fa-save"></i> Lưu</button>
                    <button type="reset" class="btn btn-default">Làm lại</button>
                  </div>
                </form>
              </div><!-- /.box -->

            </div><!--/.col (left) -->
            <!-- right column -->
          </div>   <!-- /.row -->
          

        </section>
    
@stop