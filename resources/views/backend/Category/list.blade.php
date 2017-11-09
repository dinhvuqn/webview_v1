@extends('backend.master')
@section('controller','Danh mục')
@section('action','Danh sách danh mục')
@section('link','Danh mục')
@section('content')
 <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Danh sách </h3>
                    <div class="box-action pull-right">
                        <ul class="header-action">
                            <li><a href="{!! route('danhmuc.create') !!}"><i class="fa fa-plus-square"></i> Thêm mới</a></li>
                            <li><a href=""><i class="fa fa-refresh"></i> Tải lại</a></li>
                        </ul>
                    </div>
                </div>
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>STT</th>
                        <th>Tên danh mục</th>
                        <th>Trạng thái </th>
                        <th>Thao Tác</th>
                      </tr>
                    </thead>
                    <tbody>

                     @if($danhmuc_count == 0)
                    <td>
                    Không có dữ liệu
                    </td>
                    @endif
                    <?php  $stt=0; ?>
                      
                      @foreach($data as $category)
                      
                        <tr>
                            <td> {!! $stt=$stt+1; !!} </td>
                            <td> {!! $category->tendanhmuc;!!} </td>
                            <!-- <td>
                            <input type="checkbox" value="{{$category->id}}" data-size="mini" data-on-text="Hiện" data-off-text="Ẩn" data-on-color="success" data-off-color="danger" name="is_visible" {{$category->status ?'checked':''}} />
                                                      </td> -->
                          <td>
                            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                            <input type="checkbox" value="{{$category->id}}" data-size="mini" data-on-text="Hiện" data-off-text="Ẩn" data-on-color="success" data-off-color="danger" name="is_visible" {{$category->status?'checked':''}} />
                        </td>
                        <td>
                            <a style="float: left;margin-right: 10px;" href="{!! route('danhmuc.edit', $category->id) !!}"><i class="fa fa-edit"></i>
                            </a>                         
                            <form method="POST" action="{!! route('danhmuc.destroy',$category->id) !!}" accept-charset="UTF-8">

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
<script type="text/javascript">
            $("[name='is_visible']").bootstrapSwitch();
            $('input[name="is_visible"]').on('switchChange.bootstrapSwitch', function(event, state) {
              $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
                var is_visible = (state == true)?1:0;
                $.post('danhmuc/active', {id: $(this).val(), is_visible: is_visible}, function(data, success){
                    
                });
                
              });
</script>
<script>
  $(function () {
    $("#example1").DataTable();
  });
</script>
@stop