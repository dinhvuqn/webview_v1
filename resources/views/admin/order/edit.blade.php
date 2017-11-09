@extends('admin.templates.layout')
@section('title', 'Trang quản trị')
@section('controller','Đơn hàng')
@section('action','Chỉnh sửa')
@section('link_action','/admin')
@section('content')


    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Chỉnh sửa</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            @include('blocks.error')
            <form role="form" name="order" method="post" action="{!! route('order.update',$data['id']) !!}">
              <input type="hidden" name="_token" value="{!! csrf_token() !!}" >
              <input name="_method" type="hidden" value="PUT">
              <div class="box-body">

                <div class="form-group{{ $errors->has('optionkh') ? ' has-error' : '' }}">
                        <label for="optionkh">Khách hàng</label>
                    <select class="form-control" name="optionkh">
                      <?php                 
                                    user_parent($taikhoan,0,"",$data["id_taikhoan"]); 
                              ?>
                    </select>
                </div>
                  <div class="form-group {{ $errors->has('txtdate') ? ' has-error' : '' }}">
                    <label for="txtdate">Ngày hoàn thành:</label>

                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" value="{{ old('txtdate', isset($data) ? $data['datecomplete'] : null) }}" name="txtdate" class="form-control pull-right" id="datepicker">
                    </div>
                    <!-- /.input group -->
                  </div>
                  <label for="txtdate">Chọn dịch vụ</label>
                  <div class="form-group">
                              <div class="col-md-3">
                                <div class="input-group m-b">
                                  <span class="input-group-addon"><i class="fa fa-list"></i></span>
                                  <select name="optiondv" id="optiondv" class="form-control service_id">
                                    <?php                 
                                      dv_parent($dv,0,"",$data["id_dv"]); 
                                    ?>
                                  </select>
                                </div>
                                <!--<span class="help-block m-b-none">
                                  <i class="fa fa-info-circle"></i> Speed 20k - 30k/day. Timeview 60s. Bonus likes.-->
                                
                              </div>

                              <div class="col-md-4">
                                <div class="input-group m-b">
                                  <span class="input-group-addon"><i class="fa fa-youtube"></i></span>
                                  <input type="text" value="{{ old('txtlink', isset($data) ? $data['link'] : null) }}" name="txtlink" class="form-control order_video" placeholder="Link của bạn">
                                </div>
                                
                                <span class="help-block m-b-none">
                                  <i class="fa fa-info-circle"></i> Vui lòng nhập link của bạn
                                </span>
                              </div>

                              <div class="col-md-2">
                                <div class="input-group m-b">
                                  <span class="input-group-addon"><i class="fa fa-signal"></i></span>
                                  <select name="optionsl" id="optionsl" class="form-control order_want">
                                    <?php                 
                                      sl_parent($sl,0,"",$data["soluong"]); 
                                    ?>
                                  </select>
                                </div>
                                <!--<span class="help-block m-b-none">
                                  <i class="fa fa-usd"></i> 0.8/1000 views
                                </span>-->
                              </div>
                              <div class="col-md-2">
                                <div class="input-group m-b">
                                  <span class="input-group-addon"><i class="fa fa-usd"></i></span>
                                  <input type="text" name="txtthanhtien" class="form-control order_sum text-center" value="{{ isset($data) ? $data['thanhtien'] : null }}" style="font-weight: bold;" disabled="">
                        </div>
                    </div>
                </div>
              </div>

              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
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
  @section('js')
  <script type="text/javascript">
    var root = '{{url("/")}}';
    $(document).ready(function() {
      $('#optiondv').change( function(e) {
      e.preventDefault();
      if($(this).val() !=0 ) {
        var id_dv = $(this).val();
        $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
              });
        $.ajax({
              type: "POST",
              url : root+"/order/searchsl",
              data: "id_dv="+id_dv,
              dataType: "json",
              success: function(data) {
                $('#optionsl').empty();
                  // Parse the returned json data
                var opts = $.parseJSON(data);
                // Use jQuery's each to iterate over the opts value
                $('#optionsl').append('<option value="">chọn số lượng</option>');
                $.each(opts, function(i, d) {
                    // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data
                    $('#optionsl').append('<option value="' + d.id + '">' + d.giatri + '</option>');
                });
              },
              error: function(data) {
                alert('có lỗi xảy ra')
              }
        });
      } else{
        $('#optionsl').empty();
      }
    });

      $('#optionsl').change( function(e) {
      e.preventDefault();
      if($(this).val() !=0 ) {
        var id_sl = $(this).val();
        var id_dv = $('#optiondv').val();
        $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
              });
        $.ajax({
              type: "POST",
              url : root+"/order/thanhtien",
              data: { id_sl: id_sl, id_dv: id_dv },
              success: function(data) {
                $('.order_sum').val(data);
              },
              error: function(data) {
                alert('có lỗi xảy ra')
              }
        });
      } else {
        $('.order_sum').val(0);
      }
    });
    });

  </script>
<script type="text/javascript">
  $(function () {
  //Date picker
    $('#datepicker').datepicker({
      locale: 'no',
      format: 'yyyy-mm-dd',
      autoclose: true
    })
})
</script>
<script src="{!! url('public/admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') !!}"></script>
  @stop