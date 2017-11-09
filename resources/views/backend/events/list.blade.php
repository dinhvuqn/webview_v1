@extends('backend.master')
@section('controller','Thông báo sự kiện')
@section('action','Danh sự kiện')
@section('link','sự kiện')
@section('content')
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<!-- Include Date Range Picker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
 <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Danh sách</h3>
                    <div class="box-action pull-right">
                        <ul class="header-action">
                          <li><a id="" href="{{ route('event.index') }}"><i class="fa fa fa-calendar"></i> Lịch</a></li>
                          <li><a id="addAlbum" href="javascript:void(0)"><i class="fa fa-plus-square"></i> Thêm mới</a></li>
                          <li><a href=""><i class="fa fa-refresh"></i>Tải lại</a></li>
                        </ul>
                    </div>
                </div>
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Tiêu đề</th>
                        <th>Bắt đầu</th>
                        <th>Kết thúc</th>
                        <th>Trạng thái</th>
                        <th>Thao Tác</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($event as $item)
                        <tr>
                            <td> {!! $item->id !!} </td>
                            <td><a href="{!! route('event.show',$item->id) !!}">{!! $item->title !!}</a></td>
                            <td>{!! $item->start_time !!}</td>
                            <td>{!! $item->end_time !!}</td>
                            <td>
                              <input type="checkbox" value="{{$item->id}}" data-size="mini" data-on-text="Hiện" data-off-text="Ẩn" data-on-color="success" data-off-color="danger" name="is_visible" {{$item->status?'checked':''}} />
                            </td>
                            <td>
                              <a style="float: left;margin-right: 10px;" href="{!! route('event.edit', $item->id) !!}"><i class="fa fa-edit"></i>
                              </a>                         
                              <form method="POST" action="{!! route('event.destroy',$item->id) !!}" accept-charset="UTF-8">

                              <input name="_token" type="hidden" value="{{ csrf_token()}}">
                              <input name="_method" type="hidden" value="DELETE">
                              <button onclick="return xacnhanxoa('Bạn Có Chắc Muốn Xóa Không')" type="submit" id="delete" class="fa fa-trash-o"></button>
                              </form>                        
                            </td>
                        </tr>
                
                      @endforeach
                     
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              <!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section>
           <!-- model content --> 
      <div id="addAlbumModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Thêm mới sự kiện</h4>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-sm-12">
                    <!-- form start -->
                    <form method="POST" action="{!! route('event.store') !!}" accept-charset="UTF-8" id="form-album" enctype="multipart/form-data" class="fv-form fv-form-bootstrap">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                      <label class="required" for="title">Tên</label>
                      <input class="form-control" maxlength="500" id="name" placeholder="Tên" name="name" type="text">
                    </div>
                    <div class="form-group">
                      <label class="required" for="title">Tiêu đề</label>
                      <input class="form-control" maxlength="500" id="title" placeholder="Tiêu đề" name="title" type="text">
                    </div>
                    <div class="form-group ">
                      <label for="time">Thời gian bắt đầu - kết thúc</label>
                      <div class="input-group">
                        <input type="text" class="form-control" name="time" placeholder="Chọn thời gian bắt đầu - kết thúc">
                        <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                      </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2">Nội dung</label>
                            <textarea  class="form-control" name="txtnoidung"></textarea>
                            <script type="text/javascript">
                              ckeditor('txtnoidung');
                            </script>
                      </div>
                    <div class="form-group">
                      <label for="checkbox_visible">Trạng thái</label>
                      <input id="status" checked="checked" name="status" type="checkbox" value="1">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Thêm</button>
                    </div>      
                     </form>
            </div>
        </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
  var root = '{{url("/")}}';
            $("[name='is_visible']").bootstrapSwitch();
            $('input[name="is_visible"]').on('switchChange.bootstrapSwitch', function(event, state) {
              $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
                var is_visible = (state == true)?1:0;
                $.post(root+'/admin/event/active', {id: $(this).val(), is_visible: is_visible}, function(data, success){
                    
                });
                
              });
</script>
<script>
  $(function () {
    $("#example1").DataTable();
  });
  $(document).ready(function() {
    $('#addAlbum').on('click', function() {
      $('#addAlbumModal').modal('show');
    });
    $('#form-album').validate({
      rules: {
        name: "required",
        title: "required",
      },
      messages: {
        name : "Bạn chưa nhập tên",
        title: "Bạn chưa nhập tiêu đề"
      }
    });
  });
</script>
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