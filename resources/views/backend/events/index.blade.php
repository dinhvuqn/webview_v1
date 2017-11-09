@extends('backend.master')
@section('controller','Thông báo sự kiện')
@section('action','Danh sách sự kiện')
@section('link','sự kiện')
@section('content')
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-3">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h4 class="box-title">List Sự kiện</h4>

            </div>
            <div class="box-body">
              <!-- the events -->
              <div id="external-events">
              @foreach($events as $item)
                <div class="external-event bg-light-blue ui-draggable ui-draggable-handle" style="position: relative;"><a style="color: #fff;" href="{{ route('event.show',$item->id) }}">{{ $item->name }}</a></div>
              
              @endforeach
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
        <div class="col-md-9">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                <h3 class="box-title">Sự kiện</h3>
                <div class="box-action pull-right">
                        <ul class="header-action">
                          <li><a id="" href="{{ url('/admin/event/list') }}"><i class="fa fa-list-ol"></i> Danh sách</a></li>
                          <li><a href=""><i class="fa fa-refresh"></i>Tải lại</a></li>
                        </ul>
                    </div>
               	</div><!-- /.box-header -->
				<div id="calendar"></div>
			</div>
		</div>
	</div>
</section>
@stop
@section('js')

<script src="{{ url('public/backend/event/fullcalendar/fullcalendar.min.js') }}"></script>
<script src="{{ url('public/backend/event/fullcalendar/lang-all.js') }}"></script>

<script type="text/javascript">
	$(document).ready(function() {
		
		var base_url = '{{url("/")}}';

		$('#calendar').fullCalendar({
      lang: 'vi',
			weekends: true,
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			editable: false,
			eventLimit: true, // allow "more" link when too many events
			events: {
				url: base_url + '/admin/event/api',
				error: function() {
					alert("cannot load json");
				}
			}
		});
	});
</script>
@endsection