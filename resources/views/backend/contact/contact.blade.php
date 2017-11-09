@extends('backend.master')
@section('controller','Liên hệ')
@section('action','Danh sách')
@section('link','Liên hệ- góp ý')
@section('content')
    <!-- Main content -->
    <section class="content">
    <div id="dialog" title="Confirmation">
    </div>
      <div class="row">
        <div class="col-md-3">
          <a href="compose.html" class="btn btn-primary btn-block margin-bottom">Soạn</a>

          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Lọc</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="#"><i class="fa fa-inbox"></i> Chưa đọc
                  <span class="label label-primary pull-right">{!! $count1 !!}</span></a></li>
                  <li class="active"><a href="#"><i class="fa fa-inbox"></i> Đã đọc
                  <span class="label label-primary pull-right">{!! $count2 !!}</span></a></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
          
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Inbox</h3>

              <div class="box-tools pull-right">
                <div class="has-feedback">
                  <input type="text" class="form-control input-sm" placeholder="Search Mail">
                  <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <form method="post" onSubmit="if(!confirm('Bạn chắc muốn xóa không?')){return false;}" action="{{ route('contact.delete') }}" name="data_table">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="delete">
            <div class="box-body no-padding">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                </button>
                <div class="btn-group">
                  <button type="submit" class="btn btn-default btn-sm delete"><i class="fa fa-trash-o"></i></button>
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm refresh"><i class="fa fa-refresh"></i></button>
                <div class="pull-right">
                  
                </div>
                <!-- /.pull-right -->
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                  @foreach($contact as $item)
                  @if($item->status ==0)
                  <tr style="color: #609FC4; font-weight: 700;">
                    <td><input class="checkbox" type="checkbox" name="cb_contact[]"  value="{{ $item->id }}"><!-- </td>;
                    <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                     -->                    
                    <td class="mailbox-name"><a href="{{  route('contact.show',$item->id) }}">{!! $item->hovaten !!}</a></td>
                    <td class="mailbox-subject">
                      {!! $item->tieude !!}
                    </td>
                    <td class="mailbox-date">{!! $item->created_at !!}</td>
                  </tr>
                  @else
                  <tr style="color: #467287;">
                    <td><input class="checkbox" type="checkbox" name="cb_contact[]"  value="{{ $item->id }}"><!-- </td>
                    <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                     -->                    
                    <td class="mailbox-name"><a style="color: #467287;" href="{{  route('contact.show',$item->id) }}">{!! $item->hovaten !!}</a></td>
                    <td class="mailbox-subject">
                      {!! $item->tieude !!}
                    </td>
                    <td class="mailbox-date">{!! $item->created_at !!}</td>
                  </tr>
                  @endif
                  @endforeach
                  </tbody>
                </table>

                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                </button>
                <div class="btn-group">
                  <button type="submit" class="btn btn-default btn-sm delete"><i class="fa fa-trash-o"></i></button>
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm refresh"><i class="fa fa-refresh"></i></button>
                <div class="pull-right">
                  {!! $contact->links() !!}
                </div>
                <!-- /.pull-right -->
              </div>
            </div>
            </form>
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
<script>
  $(function () {
    //Enable iCheck plugin for checkboxes
    //iCheck for checkbox and radio inputs
    $('.mailbox-messages input[type="checkbox"]').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });

    //Enable check and uncheck all functionality
    $(".checkbox-toggle").click(function () {
      var clicks = $(this).data('clicks');
      if (clicks) {
        //Uncheck all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
        $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
      } else {
        //Check all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("check");
        $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
      }
      $(this).data("clicks", !clicks);
    });

    //Handle starring for glyphicon and font awesome
  });
  $('.refresh').click(function() {
    location.reload()
  });
</script>
@stop