@extends('backend.master')
@section('controller','Bài viết')
@section('action','Thêm bài viết')
@section('link','Bài viết')
@section('content')
<section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
            
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Thêm mới bài viết</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" name="baiviet" class="form-horizontal" method="post" action="{!! route('baiviet.store') !!}" enctype="multipart/form-data" >
                <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                  <div class="box-body">
                                       
                      <div class="form-group{{ $errors->has('option_loaidanhmuc') ? ' has-error' : '' }}">
                        <label for="exampleInputEmail1" class="col-md-2">Loại danh mục:</label>
                        <div class="col-md-12"> 
                            <select class="form-control" name="option_loaidanhmuc">
                              <option value="">---- Mời bạn chọn ----</option>

                              @foreach($data_danhmuc as $data)
                                <option value = "{!! $data->id !!}">
                                {!! $data->tendanhmuc !!}
                                </option>
                              @endforeach()
                           
                            </select>
                            @if ($errors->has('option_loaidanhmuc'))
                              <span class="help-block">
                              <strong>{{ $errors->first('option_loaidanhmuc') }}</strong>
                              </span>
                            @endif
                        </div>
                      </div>

                      <div class="form-group{{ $errors->has('txttieude') ? ' has-error' : '' }}">
                        <label  class="col-md-2">Tiêu đề : </label>
                        <div class="col-md-12"> 
                            <input type="text" class="form-control" name="txttieude"  placeholder="Tiêu đề" value="{{ old('txttieude') }}">
                            @if ($errors->has('txttieude'))
                              <span class="help-block">
                              <strong>{{ $errors->first('txttieude') }}</strong>
                              </span>
                            @endif
                        </div>
                      </div>

                      <div class="form-group{{ $errors->has('txtmotangan') ? ' has-error' : '' }}">
                        <label class="col-md-2">Mô tả ngắn</label>
                        <div class="col-md-12"> 
                            <textarea class="form-control" name="txtmotangan">{{ old('txtmotangan') }}</textarea>
                            @if ($errors->has('txtmotangan'))
                              <span class="help-block">
                              <strong>{{ $errors->first('txtmotangan') }}</strong>
                              </span>
                            @endif
                            <script type="text/javascript">
                              ckeditor('txtmotangan');
                            </script>
                        </div>
                      </div>

                      <div class="form-group{{ $errors->has('txtnoidung') ? ' has-error' : '' }}">
                        <label class="col-md-2">Nội dung</label>
                        <div class="col-md-12"> 
                            <textarea class="form-control" name="txtnoidung">{{ old('txtnoidung') }}</textarea>
                            @if ($errors->has('txtnoidung'))
                              <span class="help-block">
                              <strong>{{ $errors->first('txtnoidung') }}</strong>
                              </span>
                            @endif
                            <script type="text/javascript">
                              ckeditor('txtnoidung');
                            </script>
                        </div>
                      </div>

                      <div class="form-group{{ $errors->has('img') ? ' has-error' : '' }}">
                        <label  class="col-md-2">Hình ảnh : </label>
                        <div class="col-md-12"> 
                            <input type="file" class="form-control" name="img">
                            @if ($errors->has('img'))
                              <span class="help-block">
                              <strong>{{ $errors->first('img') }}</strong>
                              </span>
                            @endif
                        </div>
                      </div>
                      
                      <div class="form-group">
                          <input id="checkbox_status" name="checkbox_status" type="checkbox" value="1" checked="checked"> 
                          
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