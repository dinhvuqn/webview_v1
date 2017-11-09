@extends('backend.master')
@section('link','sự kiện')
@section('content')
<section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ $event->name }}</h3>
                    <div class="box-action pull-right">
                        <ul class="header-action">
							<li><a id="" href="{{ route('event.index') }}"><i class="fa fa fa-calendar"></i> Lịch</a></li>                        
                          	<li><a id="" href="{{ url('/admin/event/list') }}"><i class="fa fa-list-ol"></i> Danh sách</a></li>
                          	<li><a href=""><i class="fa fa-refresh"></i>Tải lại</a></li>
                        </ul>
                    </div>
                </div>
                <div class="box-body">
                  <div class="row">
	<div class="col-lg-12">
		<h2>{{ $event->title }}</h2>
		<hr>
	</div>
</div>

<div class="row">
	<div class="col-lg-6">
		
		<p>Thời gian: <br>
		{{ date($event->start_time) . ' kết thúc ' . date($event->end_time) }}
		</p>
		
		<p>Thời gian: <br>
		{{ $duration }}
		</p>
		
		<p>
			<form action="{!! route('event.destroy',$event->id) !!}" style="display:inline;" method="POST">
				<input type="hidden" name="_method" value="DELETE" />
				{{ csrf_field() }}
				<button class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-trash"></span> Xóa</button>
			</form>
			<a class="btn btn-primary" href="{!! route('event.edit',$event->id) !!}">
				<span class="glyphicon glyphicon-edit"></span> Chỉnh sửa</a> 
			
		</p>
		
	</div>
</div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              <!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section>
@stop

@section('js')
<script src="{{ url('public/backend/event/fullcalendar/fullcalendar.min.js') }}"></script>
<script type="text/javascript">
$(function () {
	$('input[name="time"]').daterangepicker({
		"timePicker": true,
		"timePicker24Hour": true,
		"timePickerIncrement": 15,
		"autoApply": true,
		"locale": {
			"format": "DD/MM/YYYY HH:mm:ss",
			"separator": " - ",
		}
	});
});
</script>
@stop