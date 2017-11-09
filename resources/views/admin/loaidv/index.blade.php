@extends('admin.templates.layout')
@section('title', 'Trang quản trị')
@section('controller','Dịch vụ')
@section('action','Danh sách')
@section('link_action','/admin')
@section('content')


    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Loại dịch vụ</h3>
              <div class="box-action pull-right">
                        <ul class="header-action">
                          <li><a id="addAlbum" href="{!! route('loaidv.create') !!}"><i class="fa fa-plus-square"></i>Thêm mới</a></li>
                        </ul>
                    </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">

                <tr>
                  <th style="width: 10px">Stt</th>
                  <th>Tên</th>
                  <th>Tên seo</th>
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
                      
                      @foreach($data as $category)
                <tr>
                  <td>{!! $stt=$stt+1; !!}</td>
                  <td><span class="label label-success">{!! $category->name; !!}</span></td>
                  <td>{!! $category->name_seo; !!}</td>
                  <td>
                      <a href="{!! route('loaidv.edit', $category->id) !!}">
                        <i class="fa fa-edit"></i> Sửa
                      </a>
                  </td>
                  <td>
                    <form method="POST" action="{!! route('loaidv.destroy',$category->id) !!}" accept-charset="UTF-8">
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
        <div class="col-md-6">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Kiểu dịch vụ</h3>
              <div class="box-action pull-right">
                        <ul class="header-action">
                          <li><a id="addAlbum" href="{!! route('kieudv.create') !!}"><i class="fa fa-plus-square"></i>Thêm mới</a></li>
                        </ul>
                    </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">

                <tr>
                  <th style="width: 10px">Stt</th>
                  <th>Tên</th>
                  <th>Đơn vị giá</th>
                  <th>Chỉnh sửa</th>
                  <th>Xóa</th>
                </tr>
                @if($kieudv_count == 0)
                <tr>
                  <td colspan="5">
                    Không có dữ liệu
                  </td>
                </tr>
                @endif
                <?php  $stt=0; ?>
                      
                      @foreach($kieudv as $category)
                <tr>
                  <td>{!! $stt=$stt+1; !!}</td>
                  <td><a href="{!! route('soluong.show', $category->id) !!}"><span class="label label-primary">{!! $category->name; !!}</span></a></td>
                  <td>{!! $category->donvigia; !!}</td>
                  <td>
                      <a href="{!! route('kieudv.edit', $category->id) !!}">
                        <i class="fa fa-edit"></i> Sửa
                      </a>
                  </td>
                  <td>
                    <form method="POST" action="{!! route('kieudv.destroy',$category->id) !!}" accept-charset="UTF-8">
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
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Dịch Vụ</h3>
              <div class="box-action pull-right">
                        <ul class="header-action">
                          <li><a id="adddv" href="{!! route('dichvu.create') !!}"><i class="fa fa-plus-square"></i>Thêm mới</a></li>
                        </ul>
                    </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>STT</th>
                  <th>Tên</th>
                  <th>Mô tả</th>
                  <th>Loại dịch vụ</th>
                  <th>Giá tiền</th>
                  <th>Chỉnh Sửa</th>
                  <th>Xóa</th>
                </tr>
                @if($dichvu_count == 0)
                <tr>
                  <td colspan="7">
                    Không có dữ liệu
                  </td>
                </tr>
                @endif
                <?php  $stt=0; ?>
                      
                @foreach($dichvu as $item)
                <tr>
                  <td>{!! $stt=$stt+1; !!}</td>
                  <td>{!! $item->name; !!}</td>
                  <td>{!! $item->mota; !!}</td>
                  <td><span class="label label-success">{!! $item->loaidv; !!}</span></td>
                  <td>{!! $item->giatien; !!}</td>
                  <td>
                      <a href="{!! route('dichvu.edit', $item->id) !!}">
                        <i class="fa fa-edit"></i> Sửa
                      </a>
                  </td>
                  <td>
                    <form method="POST" action="{!! route('dichvu.destroy',$item->id) !!}" accept-charset="UTF-8">
                      <input name="_token" type="hidden" value="{{ csrf_token()}}">
                      <input name="_method" type="hidden" value="DELETE">
                      <button onclick="return xacnhanxoa('Bạn có chắc muốn xóa Không')" type="submit" id="delete" class="fa fa-trash-o"></button>
                    </form> 
                  </td>
                </tr>
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  @stop