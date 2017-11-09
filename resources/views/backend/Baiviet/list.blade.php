@extends('backend.master')
@section('controller','Bài viết')
@section('action','Danh sách Bài viết')
@section('link','Bài viết')
@section('content')
 <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Danh sách</h3>
                    <div class="box-action pull-right">
                        <ul class="header-action">
                            <li><a href="{!! route('baiviet.create') !!}"><i class="fa fa-plus-square"></i> Thêm mới</a></li>
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
                        <th>Danh mục</th>
                        <th>Trạng thái </th>
                        <th>Thao Tác</th>
                        <th>Thao Tác</th>
                      </tr>
                    </thead>
                    <tbody>

                      @foreach($data as $dulieu)
                      @if(Auth::user()->role_id == 1)
                        <tr>
                            <td>{!! $dulieu->id!!}</td>
                            <td> {!! $dulieu->tieude!!} </td>
                            <td> {!! $dulieu->tendanhmuc !!}</td>
                            <td>
                            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                            <input type="checkbox" value="{{$dulieu->id}}" data-size="mini" data-on-text="Hiện" data-off-text="Ẩn" data-on-color="success" data-off-color="danger" name="is_visible" {{$dulieu->status?'checked':''}} />
                            </td>
                              <td>
                              <a href="javascript:void(0);" onclick="detailPost({{$dulieu->id}})"><i class="fa fa-search-plus"></i></a></td>
                            <td>
                              <a style="float: left;margin-right: 10px;" href="{!! route('baiviet.edit' , $dulieu->id) !!}"><i class="fa fa-edit"></i></a>                            
                            
                             <form method="POST" action="{!! route('baiviet.destroy',$dulieu->id) !!}" accept-charset="UTF-8">

                              <input name="_token" type="hidden" value="{{ csrf_token()}}">
                              <input name="_method" type="hidden" value="DELETE">
                              
                              <button onclick="return xacnhanxoa('Bạn Có Chắc Muốn Xóa Không')" type="submit" id="delete" class="fa fa-trash-o"></button>
                              </form>                             
                           </td>
                        </tr>
                   
                    @elseif($dulieu->id_user == (Auth::user()->id))
                    <tr>
                            <td>{!! $dulieu->id!!}</td>
                            <td> {!! $dulieu->tieude!!} </td>
                            <td> {!! $dulieu->tendanhmuc !!}
                            </td>
                            <td>
                            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                            <input type="checkbox" value="{{$dulieu->id}}" data-size="mini" data-on-text="Hiện" data-off-text="Ẩn" data-on-color="success" data-off-color="danger" name="is_visible" {{$dulieu->status?'checked':''}} />
                            </td>
                              <td>
                              <a href="javascript:void(0);" onclick="detailPost({{$dulieu->id}})"><i class="fa fa-search-plus"></i></a></td>
                            <td>
                              <a style="float: left;margin-right: 10px;" href="{!! route('baiviet.edit' , $dulieu->id) !!}"><i class="fa fa-edit"></i></a>                            
                            
                             <form method="POST" action="{!! route('baiviet.destroy',$dulieu->id) !!}" accept-charset="UTF-8">

                              <input name="_token" type="hidden" value="{{ csrf_token()}}">
                              <input name="_method" type="hidden" value="DELETE">
                              
                              <button onclick="return xacnhanxoa('Bạn Có Chắc Muốn Xóa Không')" type="submit" id="delete" class="fa fa-trash-o"></button>
                              </form>                             
                           </td>
                        </tr>
                        @endif
                      @endforeach
                    </tbody>
                <tfoot>
                <tr>
                        <th>STT</th>
                        <th>Tiêu đề</th>                     
                        <th>Danh mục</th>
                        <th>Trạng thái </th>
                        <th>Thao Tác</th>
                        <th>Thao Tác</th>
                      </tr>
                </tfoot>
              </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              <!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section>

<div id="detailModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Chi tiet</h4>
            </div>
            <div class="modal-body">
              
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
            $("[name='is_visible']").bootstrapSwitch();
            $('input[name="is_visible"]').on('switchChange.bootstrapSwitch', function(event, state) {
              $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
                var is_visible = (state == true)?1:0;
                $.post('baiviet/active', {id: $(this).val(), is_visible: is_visible}, function(data, success){
                    
                });
                
              });
            function detailPost($id){
                      var root = '{{url("/")}}';

                    $.get(root + '/admin/baiviet/detail/' + $id, null, function(data, success){
                       var detailModal = $('#detailModal');
                       detailModal.find('.modal-body').html(data);
                       detailModal.modal('show');
                     });
                    }
            
</script>
<script>
  $(function () {
    $("#example1").DataTable();
  });
</script>
@stop