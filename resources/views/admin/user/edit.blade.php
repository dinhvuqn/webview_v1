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
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Chỉnh sửa</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            @include('blocks.error')
            <form role="form" name="user" method="post" action="{!! route('user.update',$data->id) !!}">
              <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
              <input name="_method" type="hidden" value="PUT">
              <div class="box-body">
                <div class="form-group {{ $errors->has('nameuser') ? ' has-error' : '' }}" >
                  <label for="nameuser">Tên</label>
                  <input value="{{ old('nameuser', isset($data) ? $data['name'] : null) }}" type="text" name="nameuser" class="form-control">
                </div>
                <div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
                  <label for="username">Username</label>
                  <input value="{{ old('username',isset($data) ? $data['username'] : null) }}" type="text" name="username" class="form-control" disabled>
                </div>
                <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                  <label for="phone">Số điện thoại</label>
                  <input value="{{ old('phone', isset($data) ? $data['phone'] : null) }}" type="text" name="phone" class="form-control">
                </div>
                <div class="form-group{{ $errors->has('optionrole') ? ' has-error' : '' }}">
                        <label for="optionrole">Quyền</label>
                    <select class="form-control" name="optionrole">
                      <?php                 
                          cate_parent($data_role,0,"",$data["id_role"]); 
                      ?>
                    </select>
                      @if ($errors->has('optionrole'))
                        <span class="help-block">
                          <strong>{{ $errors->first('optionrole') }}</strong>
                          </span>
                      @endif
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