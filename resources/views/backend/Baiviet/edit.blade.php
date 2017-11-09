@extends('backend.master')
@section('controller','Bài viết')
@section('action',' Cập nhật Bài viết')
@section('content')
<section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
            
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Cập nhật bài viết</h3>
                </div><!-- /.box-header -->
                 <!-- form start -->
                <form role="form" class="form-horizontal" method="post" action="{!! route('baiviet.update',$baiviet['id']) !!}" enctype="multipart/form-data" >
                <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                <input name="_method" type="hidden" value="PUT">
                  <div class="box-body">
                                       
                      <div class="form-group{{ $errors->has('option_loaidanhmuc') ? ' has-error' : '' }}">
                        <label for="exampleInputEmail1" class="col-md-2">Loại danh mục:</label>
                        <div class="col-md-12"> 
                            <select class="form-control" name="option_loaidanhmuc" required>

                              <option value="{!! $baiviet['id_danhmuc'] !!}">---
                              
                                <?php
                                    $loai_danhmuc = DB::table('danhmuctt')->where('id','=',$baiviet['id_danhmuc'])->first();
                                    echo @$loai_danhmuc->tendanhmuc;
                                ?>
                              ---
                              </option>

                              @foreach($danhmuc as $dulieu)
                                <option value = "{!! $dulieu->id !!}">
                                {!! $dulieu->tendanhmuc !!}
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
                            <input type="text" class="form-control" name="txttieude"  " value="{!! old('txttieude', isset($baiviet) ? $baiviet['tieude']: null)  !!}" required>
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
                            <textarea class="form-control" name="txtmotangan">
                              {!!
                                old('txtmotangan', isset($baiviet) ? $baiviet['motangan'] : null) 
                              !!}
                            </textarea>
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
                            <textarea class="form-control" name="txtnoidung">
                              {!!
                                old('txtnoidung', isset($baiviet) ? $baiviet['noidung'] : null) 
                              !!}

                            </textarea>
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

                      <div class="form-group">
                        <label  class="col-md-2">Hình ảnh : </label>
                        <div class="col-md-12"> 
                        <img style = " height: 50px ; width: 50px" src="{!! asset('public/hinhanh/'.$baiviet['img']) !!}" class="hinhanh_current" />
                            <input type="file" class="form-control" name="img">
                        </div>
                      </div>
                      
                      <div class="form-group">
                          <input id="checkbox_status" name="checkbox_status" type="checkbox" value="{!! old('checkbox_status', isset($baiviet) ? $baiviet['status'] : null) !!}" 
                          {!! $baiviet['status'] ? 'checked' : '' !!}> 
                          
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