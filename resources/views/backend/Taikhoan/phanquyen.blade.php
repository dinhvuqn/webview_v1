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
                <div class="box-header with-border">
                  
                </div><!-- /.box-header -->
                <!-- form start -->

                <form style="text-align: center" role="form" id="formphanquyen" class="form-inline" method="post" action="{!! route('admin.taikhoan.postphanquyen',$user->id) !!}" >
                <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                  <div class="box-body">

                    
                     <div class="form-group">
                        <label for="exampleInputEmail1"  class="col-md-12">Tên người dùng</label>
                        
                            <lable>{!! $user->name !!}</lable>             
                      </div>


                      <div class="form-group">
                        <label for="exampleInputEmail1" class="col-md-12" >Mối quan hệ</label>
                        
                            <select class="form-control" name="optionrole" id="optionrole">
                              <option value="">Mời bạn chọn</option>
                              @foreach($role as $item)
                              <option value="{!! $item['id'] !!}"> {!! $item['ten_role'] !!}</option>
                              @endforeach
                            </select>      
                                           
                      </div>
                      <div class="validation"></div> 
                  
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
  $('#formphanquyen').validate({
      rules: {
        optionrole: "required"
      },
      messages: {
        optionrole: "Vui lòng Chọn quyền người dùng"
      }
    });
});
</script>  
    