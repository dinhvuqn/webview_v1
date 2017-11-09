@extends('backend.master')
@section('controller','Danh mục')
@section('action','Danh sách danh mục')
@section('link','Sự kiện')
@section('content')
<section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
            
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Sửa {{ $event->name }}</h3>
                    <div class="box-action pull-right">
                        <ul class="header-action">
                          <li><a id="" href="{{ route('event.index') }}"><i class="fa fa fa-calendar"></i> Lịch</a></li>
                          <li><a id="" href="{{ url('/admin/event/list') }}"><i class="fa fa-list-ol"></i> Danh sách</a></li>
                          <li><a href=""><i class="fa fa-refresh"></i>Tải lại</a></li>
                        </ul>
                    </div>
                </div>
                <!-- form start -->
                
                <form id="editEvent" role="form" class="form-horizontal" method="post" action="{!! route('event.update',$event->id) !!}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input name="_method" type="hidden" value="PUT">
                  <div class="box-body">
                      <div class="form-group @if($errors->has('name')) has-error has-feedback @endif">
                        <label for="name" class="col-md-2">Tên</label>
                        <div class="col-md-12"> 
                          <input type="text" class="form-control" id="name" name="name" placeholder="Tên" value="{!! $event->name !!}">
                          @if ($errors->has('name'))
                            <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                            </span>
                          @endif
                        </div>
                      </div>
                      <div class="form-group @if($errors->has('title')) has-error has-feedback @endif">
                        <label for="title" class="col-md-2">Tiêu đề</label>
                        <div class="col-md-12"> 
                            <input type="text" class="form-control" id="title" name="title" placeholder="Tiêu đề" value="{!! $event->title !!}">
                            @if ($errors->has('title'))
                            <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                            </span>
                          @endif
                        </div>
                      </div>
                      <div class="form-group @if($errors->has('time')) has-error @endif">
                        <label for="title" class="col-md-2">Thời gian</label>
                        <div class="col-md-12"> 
                            <div class="input-group">
                              <input type="text" class="form-control" name="time" value="{{ $event->start_time . ' - ' . $event->end_time }}" placeholder="Select your time">
                              <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                              @if ($errors->has('time'))
                                <span class="help-block">
                                <strong>{{ $errors->first('time') }}</strong>
                                </span>
                              @endif
                            </div>
                        </div>
                      </div>
                      <div class="form-group @if($errors->has('content')) has-error @endif">
                        <label class="col-md-2">Nội dung</label>
                        <div class="col-md-12"> 
                            <textarea class="form-control" name="content">{{ $event->content }}</textarea>
                            @if ($errors->has('content'))
                            <span class="help-block">
                            <strong>{{ $errors->first('content') }}</strong>
                            </span>
                          @endif
                            <script type="text/javascript">
                              ckeditor('content');
                            </script>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="checkbox_visible" class="col-md-2">Trạng thái:</label>
                        <input id="checkbox_visible" name="checkbox_visible" type="checkbox" value="1" checked="">
                      </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Lưu</button>
                    <button type="reset" class="btn btn-default">Làm lại</button>
                  </div>
                </form>
              </div><!-- /.box -->

            </div><!--/.col (left) -->
            <!-- right column -->
          </div>   <!-- /.row -->

       </section>
<script type="text/javascript">
$(function () {
 $('input[name="time"]').daterangepicker({
 "minDate": moment('<?php echo date('Y-m-d G')?>'),
 "timePicker": true,
 "timePicker24Hour": true,
 "timePickerIncrement": 15,
 "autoApply": true,
 "locale": {
 "format": "DD/MM/YYYY HH:mm:ss",
 "separator": " - ",
 "applyLabel": "Chọn",
        "cancelLabel": "Hủy",
        "fromLabel": "Đến",
        "toLabel": "Từ",
        "customRangeLabel": "Custom",
        "daysOfWeek": [
            "CN",
            "T 2",
            "T 3",
            "T 4",
            "T 5",
            "T 6",
            "T 7"
        ],
        "monthNames": [
            "Tháng 1",
            "Tháng 2",
            "Tháng 3",
            "Tháng 4",
            "Tháng 5",
            "Tháng 6",
            "Tháng 7",
            "Tháng 8",
            "Tháng 9",
            "Tháng 10",
            "Tháng 11",
            "Tháng 12"
        ],
        "firstDay": 1
 }
 });
});
</script>
@stop