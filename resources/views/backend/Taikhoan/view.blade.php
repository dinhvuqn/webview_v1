@extends('backend.master')
@section('controller','Tài khoản')

@section('content')
<div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Thông tin tài khoản</a></li>         
            </ul>
            <div class="tab-content">

            <div class="active tab-pane" id="activity">

              @include('blocks.error')
                <form class="form-horizontal">
               
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name:  </label>
                    <label style="text-align:left ; font-weight:500" for="inputName" class="col-sm-2 control-label" id="inputName">{!! $user->name !!}</label>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email:  </label>
                    <label style="text-align:left; font-weight:500" for="inputEmail" class="col-sm-2 control-label" id="inputEmail">{!! $user->email !!}</label>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Chức vụ:  </label>
                    <label style="text-align:left; font-weight:500" for="inputEmail" class="col-sm-2 control-label" id="inputEmail">
                       {!! $user->ten_role !!}
                    </label>
                  </div>  
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Trạng thái:  </label>
                    <label style="text-align:left; font-weight:500" for="inputEmail" class="col-sm-2 control-label" id="inputEmail">
                      <?php 
                      if($user->status==1)  {echo " Kích hoạt"; }else {echo "Chưa kích hoạt";}
                      ?>
                        
                      </label>
                  </div>     
                 
              
                </form>
              </div>
              
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
    @stop