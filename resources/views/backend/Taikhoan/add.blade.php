<style type="text/css">
  .error{
    font-style: italic;
    color:red;
  }
</style>
<section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
            
              <!-- general form elements -->
              <div class="box box-primary">
                
                <!-- form start -->
                @include('blocks.error')
                <form role="form" id="taikhoan"  class="form-horizontal" method="post" action="{!! route('taikhoan.store') !!}">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                  <div class="box-body">
                    
                      <div class="row-form "> 
                      <label>Username <span class="text-danger">*</span></label> <input type="text" name="username" class="form-control " >
                      <div class="validation"></div>
                      </div>

                      <div class="row-form "> 
                      <label>E-Mail <span class="text-danger">*</span></label> <input type="text" name="email" class="form-control " > 
                      <div class="validation"></div>
                      </div>
                      <div class="row-form "> 
                      <label>Password <span class="text-danger">*</span></label>
                       <input type="password" id="password" name="password" class="form-control " > 
                       
                      </div>

                      <div class="row-form "> 
                      <label>Confirm Passwork <span class="text-danger">*</span></label> 
                      <input type="password" name="cfpasswork" class="form-control " > 
                      </div>
                      <div class="row-form "> 
                        <label>Chức vụ<span class="text-danger">*</span></label>
                        <div > 
                            <select class="form-control" name="option_role">
                              <option value="">---- Mời bạn chọn ----</option>
                              @foreach($role as $data)
                               <option value="{!! $data['id'] !!}" >{!! $data['ten_role'] !!}</option>
                              @endforeach
                            <!-- Xổ dữ liệu trong bảng Tocho vào option -->

                           
                            <!-- End Option -->
                            </select>
                        </div>
                      </div>

                      
                      <div class="row-form "> 
                      <label>Trạng thái<span class="text-danger">*</span></label>
                       <div class="col-md-12">
                          <input id="checkbox_status" name="checkbox_status" type="checkbox" value="1" checked="checked"> 
                          
                          </div>
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
<script type="text/javascript">
$(document).ready(function(){
  $('#taikhoan').validate({
      rules: {
        username: "required",
        email: {
          required: true,
          email: true
        },
        password: {    
         required: true,
          minlength:6
        },
        cfpasswork: {
          required: true,       
          minlength:6,
          equalTo: "#password"
        },
        option_role: "required"
      },
      messages: {
        username: "Vui lòng nhập họ và tên",
        email: {
          required: "Vui lòng nhập email",
          email: "sai định dạng email"
        },
        password: {
          required: "Vui lòng nhập Mật khẩu",
          
          minlength:"Mật khẩu trên 6 kí tự"
        },
        cfpasswork: {
          required: "Vui lòng nhập Mật khẩu",
         
          minlength:"Mật khẩu trên 6 kí tự",
          equalTo:"Mật khẩu không trùng khớp"

        },
        option_role: "Vui lòng Chọn chức vụ"
      },
    });
});
</script>    
