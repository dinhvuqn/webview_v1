@extends('admin.templates.layout')
@section('title', 'Trang quản trị')
@section('controller','Số lượng')
@section('action','Danh sách')
@section('link_action','/admin')
@section('content')


    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Số lượng {!! $kieudv->name; !!}</h3>
              <div class="box-action pull-right">
                        <ul class="header-action">
                          <li><a href="{!! route('soluong.create') !!}"><i class="fa fa-plus-square"></i>Thêm mới</a></li>
                          <li><a href="{!! route('soluong.index') !!}"><i class="fa fa-plus-square"></i>Xem tất cả</a></li>
                        </ul>
                    </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">

                <tr>
                  <th style="width: 10px">Stt</th>
                  <th>Giá trị</th>
                  <th>Kiểu dịch vụ</th>
                  <th>Chỉnh sửa</th>
                  <th>Xóa</th>
                </tr>
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
                  <td><span class="label label-success">{!! $item->giatri; !!}</span></td>
                  <td>{!! $kieudv->name; !!}</td>
                  <td>
                      <a href="{!! route('soluong.edit', $item->id) !!}">
                        <i class="fa fa-edit"></i> Sửa
                      </a>
                  </td>
                  <td>
                    <form method="POST" action="{!! route('soluong.destroy',$item->id) !!}" accept-charset="UTF-8">
                      <input name="_token" type="hidden" value="{{ csrf_token()}}">
                      <input name="_method" type="hidden" value="DELETE">
                      <button onclick="return xacnhanxoa('Bạn Có Chắc Muốn Xóa Không')" type="submit" id="delete" class="fa fa-trash-o"></button>
                    </form>   
                  </td>
                </tr>
                @endforeach
              </table>
            </div>
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->
      
    </section>
    <!-- /.content -->
  @stop