@extends('backend.master')
@section('controller','Tài khoản')
@section('action','Danh sách')
@section('link','Tài khoản')
@section('content')
    <!-- Main content -->
    <section class="content">
    <div id="dialog" title="Confirmation">
    </div>
      <div class="row">
        <div class="col-md-3">
          <a  onclick="adduser()" class="btn btn-primary btn-block margin-bottom">Tạo Tài Khoản</a>
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
                <li class="active"><a href="#"><i class="fa fa-inbox"></i> Chưa xác nhận
                  <span id="count1" class="label label pull-right bg-red">{!! $count1 !!}</span></a></li>
                  <li class="active"><a href="#"><i class="fa fa-inbox"></i> Đã xác nhận
                  <span id="count2" class="label label-primary pull-right">{!! $count2 !!}</span></a></li>
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
              <h3 class="box-title">Danh sách Tài Khoản</h3>

              <div class="box-tools pull-right">
             <form method="GET" action=" {!! url('admin/taikhoan/search') !!}" accept-charset="UTF-8" id="form-search">
                  <input type="text" class="form-control input-sm" name="search" id="search" placeholder="Tìm kiếm tài khoản">
                  <span class="glyphicon glyphicon-search form-control-feedback"></span>
                  </form>
                  </div>

              
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <form method="post" onSubmit="if(!confirm('Bạn chắc muốn xóa không?')){return false;}" action="{{ route('taikhoan.delete') }}" name="data_table">
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
                <!-- /.pull-right -->
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                <thead>
                      <tr>
                        <th></th>
                        <th>E-Mail</th>
                        <th>Tên</th> 
                        <th>Vị trí</th>                       
            
                      </tr>
                    </thead>
                  <tbody>
                 @foreach($users as $item)
                  @if($item->status ==0)
                  <tr style="color: #609FC4; font-weight: 700;">
                    <td><input class="checkbox" type="checkbox" name="cb_taikhoan[]"  value="{{ $item->id }}"><!-- </td>;
                    <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                     -->                    
                    <td class="mailbox-name"><a href="{{  route('taikhoan.show',$item->id) }}">{!! $item->email !!}</a></td>
                    <td class="mailbox-subject">
                     {!! $item->name !!}
                    </td>
                    <td class="mailbox-subject"><a href="javascript:void(0)" onclick="return phanquyen({!! $item->id !!})">
                     {!! $item->ten_role !!}</a>
                    </td>
                    <td><a id="check" href="javascript:void(0)" style="color:#00a65a"onclick="return xacnhan({!! $item->id !!})">Kích hoạt</a></td>
                  </tr>
                @else
                  <tr style="color: #467287;">
                    <td><input class="checkbox" type="checkbox" name="cb_taikhoan[]"  value="{{ $item->id }}"><!-- </td>
                    <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                     -->                    
                    <td class="mailbox-name"><a style="color: #467287;" href="{{ route('taikhoan.show',$item->id) }}">{!! $item->email !!}</a></td>
                    <td class="mailbox-subject">
                     {!! $item->name !!}
                    </td>
                    <td class="mailbox-subject"><a href="javascript:void(0)"onclick="return phanquyen({!! $item->id !!})">
                     {!! $item->ten_role !!}</a>
                    </td>
                    <td></td>
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

<div id="formModal" class="modal fade" role="dialog">
    <div class="modal-dialog ">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
             </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>

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

  function xacnhan(id){
    $(document).ready(function(){
       $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
              });
            bootbox.confirm({
                    message: "Bạn có chắc không?",
                    buttons: {
                        confirm: {
                            label: 'Có',
                            className: 'btn-success'
                        },
                        cancel: {
                            label: 'Không',
                            className: 'btn-danger'
                        }
                    },
                    callback: function (result) {
                        if(result) {
                          $.ajax({
              type: "POST",
              url : "taikhoan/xacnhan",
              data: "id="+id,
              dataType: "json",
              success: function(data) {
               
              $("#check").remove();
              $('#count1').html(data['count1']);
              $('#count2').html(data['count2']);
              },
              error: function(data){
                alert(data);
              }
            });
                        }
                    }
                  });

            
        
    });
  }

  $('.refresh').click(function() {
    location.reload()
  });

  function adduser(){
            var root = '{{url("/")}}';
                    $.get(root + '/admin/taikhoan/add', null, function(data, success){
                       var formModal = $('#formModal');
                       formModal.find('.modal-header').find('h4').html('Thêm mới Tài Khoản');
                       formModal.find('.modal-body').html(data);
                       formModal.modal('show');
                    });
                    }
  function phanquyen(id){
            var root = '{{url("/")}}';
                    $.get(root + '/admin/taikhoan/phanquyen/' + id, null, function(data, success){
                       var formModal = $('#formModal');
                       formModal.find('.modal-header').find('h4').html('Phần quyền user');
                       formModal.find('.modal-body').html(data);
                       formModal.modal('show');
                    });
                    }


  $(document).ready(function(){
    $('#taikhoan').on('submit', function() {
      alert('adsadasd');
    });
  
  });
</script>
@stop
