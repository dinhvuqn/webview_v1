@extends('admin.templates.layout')
@section('title', 'Trang quản trị')
@section('controller','Đơn hàng')
@section('action','Danh sách')
@section('link_action','/admin')
@section('content')


    <!-- Main content -->

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Đơn hàng</h3>
              <div class="box-action pull-right">
                <ul class="header-action">
                  <li>
                    <a href="{!! route('order.create') !!}"><i class="fa fa-plus-square"></i>Thêm mới</a>
                  </li>
                </ul>
            </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <table id="tableorder" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>STT</th>
                  <th>Khách hàng</th>
                  <th>Ngày hoàn thành</th>
                  <th>Thành tiền</th>
                  <th>Ngày tạo</th>
                  <th>Chỉnh sửa</th>
                  <th>Xóa</th>
                </tr>
                </thead>
                <tbody>
                @if($data_count == 0)
                <tr>
                  <td colspan="5">
                    Không có dữ liệu
                  </td>
                </tr>
                @endif
                <?php  $stt=0; ?>
                  @foreach($data as $item)
                <tr>
                  <td>{!! $stt=$stt+1; !!}</td>
                  <td>{!! $item->name; !!}</td>
                  <td>{!! $item->datecomplete; !!}</td>
                  <td>{!! $item->thanhtien; !!}</td>
                  <td>{!! $item->created_at; !!}</td>
                  <td>
                    <a href="{!! route('order.edit', $item->id) !!}">
                        <i class="fa fa-edit"></i> Sửa
                      </a>
                  </td>
                  <td>
                    <form method="POST" action="{!! route('order.destroy',$item->id) !!}" accept-charset="UTF-8">
                      <input name="_token" type="hidden" value="{{ csrf_token()}}">
                      <input name="_method" type="hidden" value="DELETE">
                      <button onclick="return xacnhanxoa('Bạn Có Chắc Muốn Xóa Không')" type="submit" id="delete" class="fa fa-trash-o"></button>
                    </form>  
                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>STT</th>
                  <th>Khách hàng</th>
                  <th>Ngày hoàn thành</th>
                  <th>Thành tiền</th>
                  <th>Ngày tạo</th>
                  <th>Chỉnh sửa</th>
                  <th>Xóa</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <div class="col-md-6">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Tình trạng đơn hàng</h3>
              <div class="box-action pull-right">
                        <ul class="header-action">
                          <li><a id="addAlbum" href="{!! route('status.create') !!}"><i class="fa fa-plus-square"></i>Thêm mới</a></li>
                        </ul>
                    </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">

                <tr>
                  <th style="width: 10px">Stt</th>
                  <th>Tên</th>
                  <th>Mô tả</th>
                  <th>Chỉnh sửa</th>
                  <th>Xóa</th>
                </tr>
                @if($data_status_count == 0)
                <tr>
                  <td colspan="5">
                    Không có dữ liệu
                  </td>
                </tr>
                @endif
                <?php  $stt=0; ?>
                      
                      @foreach($data_status as $item)
                <tr>
                  <td>{!! $stt=$stt+1; !!}</td>
                  <td><span class="label label-success">{!! $item->name; !!}</span></td>
                  <td>{!! $item->noidung; !!}</td>
                  <td>
                      <a href="{!! route('status.edit', $item->id) !!}">
                        <i class="fa fa-edit"></i> Sửa
                      </a>
                  </td>
                  <td>
                    <form method="POST" action="{!! route('status.destroy',$item->id) !!}" accept-charset="UTF-8">
                      <input name="_token" type="hidden" value="{{ csrf_token()}}">
                      <input name="_method" type="hidden" value="DELETE">
                      <button onclick="return xacnhanxoa('Bạn Có Chắc Muốn Xóa Không')" type="submit" id="delete" class="fa fa-trash-o"></button>
                    </form>   
                  </td>
                </tr>
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">&raquo;</a></li>
              </ul>
            </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  @stop