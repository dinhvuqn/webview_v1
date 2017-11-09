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
              <h3 class="box-title">Tài khoản</h3>
              <div class="box-action pull-right">
                <ul class="header-action">
                  <li>
                    <a href="{!! route('user.create') !!}"><i class="fa fa-plus-square"></i>Thêm mới</a>
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
                  <th>Tên</th>
                  <th>Số điện thoại</th>
                  <th>Quyền</th>
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
                  <td>{!! $item->phone; !!}</td>
                  <td>{!! $item->rolename; !!}</td>
                  <td>
                    <a href="{!! route('user.edit', $item->id) !!}">
                        <i class="fa fa-edit"></i> Sửa
                      </a>
                  </td>
                  <td>
                    <form method="POST" action="{!! route('user.destroy',$item->id) !!}" accept-charset="UTF-8">
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
                  <th>Tên</th>
                  <th>Số điện thoại</th>
                  <th>Quyền</th>
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
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  @stop