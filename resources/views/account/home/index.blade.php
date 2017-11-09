@extends('account.templates.layout')
@section('title', 'Tài khoản')

@section('content')
<div id="wrapper">
		<div class="content">
			<div class="row">
				<div class="col-md-12">
					<div class="alert text-center" style="background: #e74c3c; color: white; font-size: 14px;">TỈ LỆ TRỪ VIEWS LÀ <strong>10%</strong> SAU 2 NGÀY. CHỈ 30% SỐ ĐƠN HÀNG GẶP TRƯỜNG HỢP NÀY. CÁC ĐƠN HÀNG THỜI GIAN NÀY MÌNH SẼ KHÔNG <strong>BẢO HÀNH</strong>. CÁC BẠN <strong>CÂN NHẮC</strong> KHI ORDER.</div>
				</div>
			</div>
			<!-- <div class="row" style="margin-bottom: 13px;">	
				<div class="col-md-12">
					<div style="padding: 10px; background: #e74c3c; color: white; font-size: 13px;"><ul><li>Do số đơn hàng tăng quá nhiều 1DG phải bật chế độ xếp hàng đợi cho các đơn hàng mới để tránh quá tải. Rất mong các bạn thông cảm cho sự bất tiện này. </li>
<li>Các đơn hàng ở trạng thái "Pending" nếu muốn hoàn tiền các bạn có thể bấm vào "Cancel". </li>
<li>1DG đang cố gắng nâng cấp nhanh nhất có thể để phục vụ các bạn tốt hơn. Cảm ơn các bạn đã tin tưởng và ủng hộ 1DG.ME ♥</li></ul></div>
				</div>
			</div> -->
			<div class="row">
				<div class="col-md-12">
					<div class="hpanel">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#tab-order" data-toggle="tab"><i class="fa fa-youtube-play"></i> Order</a></li>
							<li><a href="#tab-history" data-toggle="tab"><i class="fa fa-list"></i> History</a></li>
							<li><a href="#tab-search" data-toggle="tab"><i class="fa fa-search"></i> Search</a></li>
						</ul>
						<div class="tab-content">
							<div id="tab-order" class="tab-pane active">
								<div class="panel-body">
									<div class="row">
										<div class="col-md-9 col-md-offset-1">
											<div class="hpanel" style="margin-bottom: 0px;">
								            	<div class="panel-heading">
								                	<div class="panel-tools">
								                   	 	<a class="showhide"><i class="fa fa-chevron-up"></i></a>
								                    	<a class="closebox"><i class="fa fa-times"></i></a>
								               	 	</div>
								               		<strong>LIST YOUR SERVICE</strong>
								            	</div>
								            	<div class="panel-body" style="border: none; padding: 0px;">
								            		<div class="table-responsive">
														<table class="table table-bordered table-striped">
															<thead>
																<tr>
																	<th class="text-center">#</th>
																	<th class="text-center">Name</th>
																	<th class="text-center">Description</th>
																	<th class="text-center">$/1000 views</th>
																	<th class="text-center">Limit order</th>
																</tr>
															</thead>
															<tbody><th class="text-center">1</th>
																	<td>SV60 -  Slow View 60</td>
																	<td>Speed 5k -10k/day. Timeview 60s. Bonus likes.</td>
																	<th class="text-center">0.8</th>
																	<th class="text-center">5</th>
																</tr>
																															<tr>
																	<th class="text-center">2</th>
																	<td>SV120 - Slow View 120</td>
																	<td>Speed 5-10k/day. Timeview 120s. Bonus likes, dislike.</td>
																	<th class="text-center">1</th>
																	<th class="text-center">2</th>
																</tr>
																															<tr>
																	<th class="text-center">3</th>
																	<td>NV1 - Normal View 1</td>
																	<td>Speed 10k-20k/day. Timeview 60s. Bonus likes.</td>
																	<th class="text-center">0.8</th>
																	<th class="text-center">5</th>
																</tr>
																															<tr>
																	<th class="text-center">4</th>
																	<td>NV2 - Normal View 2</td>
																	<td>Speed 20k - 30k/day. Timeview 60s. Bonus likes.</td>
																	<th class="text-center">0.8</th>
																	<th class="text-center">5</th>
																</tr>
																															<tr>
																	<th class="text-center">5</th>
																	<td>SGV1 - Suggested Video 1</td>
																	<td>Speed 5k -10k/day. Timeview 60s. Bonus likes, dislikes</td>
																	<th class="text-center">1</th>
																	<th class="text-center">2</th>
																</tr>
																															<tr>
																	<th class="text-center">6</th>
																	<td>SGV2 - Suggested Video 2</td>
																	<td>Speed 5k-10k/day.. Timeview 60s. Bonus likes, dislikes</td>
																	<th class="text-center">1</th>
																	<th class="text-center">5</th>
																</tr>
																															<tr>
																	<th class="text-center">7</th>
																	<td>LTV - Live Stream View</td>
																	<td>Speed 20-30k/day. Timeview 60s. Bonus likes.</td>
																	<th class="text-center">1.2</th>
																	<th class="text-center">5</th>
																</tr>
																															<tr>
																	<th class="text-center">8</th>
																	<td>NV120 - Normal View 120</td>
																	<td>Speed 10-20k/day. Timeview 120s. Bonus likes, dislike.</td>
																	<th class="text-center">1</th>
																	<th class="text-center">2</th>
																</tr>
																														</tbody>
														</table>
													</div>
								            	</div>
								      		</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="btn-group">
												<button type="button" class="btn btn-info" id="btn-add" data-vip="0">
													<i class="fa fa-plus"></i> Add Video
												</button>
											</div>
											<div class="btn-group">
												<button type="button" class="btn btn-warning" id="btn-term">
													<i class="fa fa-file-text-o"></i> Term
												</button>
											</div>
										</div>
									</div>
									<div class="row" style="margin-top: 10px;">
										<div class="col-md-12">
											<div class="row muliple-link">
												<div class="col-md-12 single-link">
													<form class="form-horizontal" role="form">
														<div class="form-group">
															<div class="col-md-3">
																<div class="input-group m-b">
																	<span class="input-group-addon"><i class="fa fa-list"></i></span>
																	<select class="form-control service_id" >
																		<option value="0" data-name="Unknown" data-description="Unknown" data-price="0" data-min="0" data-max="0">Choose service</option>
																		<option value="9" data-name="SV60 -  Slow View 60" data-description="Speed 5k -10k/day. Timeview 60s. Bonus likes." data-price="0.8" data-min="1000" data-max="20000">SV60 -  Slow View 60</option><option value="3" data-name="SV120 - Slow View 120" data-description="Speed 5-10k/day. Timeview 120s. Bonus likes, dislike." data-price="1" data-min="1000" data-max="20000">SV120 - Slow View 120</option><option value="1" data-name="NV1 - Normal View 1" data-description="Speed 10k-20k/day. Timeview 60s. Bonus likes." data-price="0.8" data-min="1000" data-max="50000">NV1 - Normal View 1</option><option value="6" data-name="NV2 - Normal View 2" data-description="Speed 20k - 30k/day. Timeview 60s. Bonus likes." data-price="0.8" data-min="1000" data-max="500000">NV2 - Normal View 2</option><option value="4" data-name="SGV1 - Suggested Video 1" data-description="Speed 5k -10k/day. Timeview 60s. Bonus likes, dislikes" data-price="1" data-min="1000" data-max="50000">SGV1 - Suggested Video 1</option><option value="5" data-name="SGV2 - Suggested Video 2" data-description="Speed 5k-10k/day.. Timeview 60s. Bonus likes, dislikes" data-price="1" data-min="1000" data-max="50000">SGV2 - Suggested Video 2</option><option value="11" data-name="LTV - Live Stream View" data-description="Speed 20-30k/day. Timeview 60s. Bonus likes." data-price="1.2" data-min="1000" data-max="20000">LTV - Live Stream View</option><option value="13" data-name="NV120 - Normal View 120" data-description="Speed 10-20k/day. Timeview 120s. Bonus likes, dislike." data-price="1" data-min="1000" data-max="50000">NV120 - Normal View 120</option>																	</select>
																</div>
																<!--<span class="help-block m-b-none">
																	<i class="fa fa-info-circle"></i> Speed 5k -10k/day. Timeview 60s. Bonus likes.-->
																</span>
															</div>

															<div class="col-md-4">
																<div class="input-group m-b">
																	<span class="input-group-addon"><i class="fa fa-youtube"></i></span>
																	<input type="text" class="form-control order_video" placeholder="Your Youtube Link">
																</div>
																<span class="help-block m-b-none">
																	<i class="fa fa-info-circle"></i> Please input youtube link
																</span>
																<div class="div-schedule" style="display: none;">
																	<div class="input-group m-b">
																		<div class="checkbox checkbox-info">
                                   										 	<input type="checkbox" class="cb-schedule">
									                                    	<label>Schedule run view? (GMT +7)</label>
                              											</div>
																	</div>
																	<div class="row">
																		<div class="col-md-5">
																			<div class="input-group m-b">
																				<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
																				<input type="text" class="form-control hour-schedule">
																			</div>
																			</div>
																		<div class="col-md-7">
																			<div class="input-group m-b">
																				<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
																				<input data-provide="datepicker"  data-date-format="dd/mm/yyyy" type="text" class="form-control date-schedule">
																			</div>
																		</div>
																		<span class="help-block m-b-none">
																			<i class="fa fa-info-circle"></i> Chỉ được chọn trong giờ danh sách. Không được sửa. Phải công khai video trước giờ chạy views, nếu công khai cùng hoặc lớn hơn giờ với giờ chạy views đơn hàng sẽ bị huỷ.
																		</span>
																	</div>
																</div>
																<div class="div-refer" style="display: none; margin-top: 10px;">
																	<div class="input-group m-b">
																		<span class="input-group-addon"><i class="fa fa-youtube"></i></span>
																		<input type="text" class="form-control order_video_refer" placeholder="ID video hoặc Playlist đề xuất">
																	</div>
																	<span class="help-block m-b-none">
																		<i class="fa fa-info-circle"></i> List ID đề xuất(ID1,ID2,ID3). Tối thiểu 1 - Tối đa 15 (Playlist thì tối đa 10). KHÔNG ĐIỀN FULL LINK
																	</span>
																</div>
															</div>

															<div class="col-md-2">
																<div class="input-group m-b">
																	<span class="input-group-addon"><i class="fa fa-signal"></i></span>
																	<select class="form-control order_want">
																		<option value="1000">1,000</option><option value="2000">2,000</option><option value="3000">3,000</option><option value="4000">4,000</option><option value="5000">5,000</option><option value="6000">6,000</option><option value="7000">7,000</option><option value="8000">8,000</option><option value="9000">9,000</option><option value="10000">10,000</option><option value="15000">15,000</option><option value="20000">20,000</option><option value="25000">25,000</option><option value="30000">30,000</option><option value="35000">35,000</option><option value="40000">40,000</option><option value="45000">45,000</option><option value="50000">50,000</option><option value="55000">55,000</option><option value="60000">60,000</option><option value="65000">65,000</option><option value="70000">70,000</option><option value="75000">75,000</option><option value="80000">80,000</option><option value="85000">85,000</option><option value="90000">90,000</option><option value="95000">95,000</option><option value="100000">100,000</option><option value="150000">150,000</option><option value="200000">200,000</option><option value="250000">250,000</option><option value="300000">300,000</option><option value="350000">350,000</option><option value="400000">400,000</option><option value="450000">450,000</option><option value="500000">500,000</option><option value="550000">550,000</option><option value="600000">600,000</option><option value="650000">650,000</option><option value="700000">700,000</option><option value="750000">750,000</option><option value="800000">800,000</option><option value="850000">850,000</option><option value="900000">900,000</option><option value="950000">950,000</option><option value="1000000">1,000,000</option><option value="1500000">1,500,000</option><option value="2000000">2,000,000</option>																	</select>
																</div>
																<!--<span class="help-block m-b-none">
																	<i class="fa fa-usd"></i> 0.8/1000 views
																</span>-->
															</div>

															<div class="col-md-2">
																<div class="input-group m-b">
																	<span class="input-group-addon"><i class="fa fa-usd"></i></span>
																	<input type="text" class="form-control order_sum text-center" value="0" style="font-weight: bold;" disabled>
																</div>
															</div>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>

									<!-- Total -->
									<div class="row" style="margin-top: 10px;">
										<div class="col-md-5 col-md-offset-7">
											<div class="row">
												<div class="col-md-12">
													<form class="form-horizontal" role="form">
														<div class="form-group">
															<div class="col-md-5">
																<div class="btn-group">
																																	<button type="button" class="btn btn-info btn-block" id="btn-submit">
																		<i class="fa fa-check"></i> Order
																	</button>
																																</div>
															</div>
															<div class="col-md-7">
																<div class="input-group m-b">
																	<span class="input-group-addon"><i class="fa fa-usd text-danger"></i></span>
																	<input type="text" class="form-control text-danger text-center" id="ipt-total-money" value="0" style="font-weight: bold;" disabled>
																</div>
															</div>
														</div>
													</form>
												</div>
												<div class="col-md-12">	
													<!-- <label style="margin-top: 15px;">Total Pending Orders: <span id="total_pending_order" class="label label-danger" style="font-size: 100%;"></span></label><br /> -->
													<!-- <label style="margin-top: 15px;">Next Order Running: <span id="last_order_running" class="label label-danger" style="font-size: 100%;"></span></label><br /> -->
													<!--<label style="margin-top: 15px;">Last Time Running: <span id="last_time_running" class="label label-danger" style="font-size: 100%;"></span></label>-->
												</div>
											</div>
										</div>
									</div>
								</div>	
							</div>

							<div id="tab-history" class="tab-pane">
								<div class="panel-body">
									<div class="row">
										<div class="col-md-12" style="margin-bottom: 20px;">
											<span class="label label-default">Pending</span> Đơn hàng đang chờ xử lý.
											- <span class="label label-primary">Running</span> Đơn hàng đang chạy.
											- <span class="label label-info">Updating</span> Đơn hàng đã chạy xong và đang cập nhật views.
											- <span class="label label-success">Completed</span> Đơn hàng đã hoàn thành
											- <span class="label label-warning">Cancelled</span> Đơn hàng đã hoàn tiền
											- <span class="label label-danger">Avoided</span> Đơn hàng ngừng chạy do chặn quốc gia, bản quyền, xoá video, riêng tư ...
										</div>
										<div class="col-md-12">
											<div class="table-responsive">
												<table class="table table-hover table-history">
													<thead>
														<tr>
															<th class="text-center">ID</th>
															<th>Processed</th>
															<th>Updated</th>
															<th class="text-center">Service</th>
															<th class="text-center">Video</th>
															<th class="text-right">Start</th>
															<th class="text-right">Want</th>
															<th class="text-right">Current</th>
															<th></th>
														</tr>
													</thead>
													<tbody>
																										</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>	
							</div>

							<div id="tab-search" class="tab-pane">
								<div class="panel-body">
									<div class="row">
										<div class="col-md-12">
											<form class="form-horizontal">
												<div class="form-group">
													<label class="col-md-2 col-xs-12 control-label">Order ID or Video ID</label>
													<div class="col-md-2 col-xs-8">
														<input class="form-control text-center" type="text" id="ipt-keyword">
													</div>
													<div class="col-md-2 col-xs-4">
														<button class="btn btn-info btn-block" type="button" id="btn-search-order">Search</button>
													</div>
													<label class="col-md-2 col-xs-12 control-label">Choose Date</label>
													<div class="col-md-2 col-xs-8">
														<input class="form-control text-center" type="text" id="date-search">
													</div>
													<div class="col-md-2 col-xs-4">
														<button class="btn btn-info btn-block" type="button" id="btn-search-by-date">Filter</button>
													</div>
												</div>
											</form>
											<hr />
											<div class="table-responsive">
												<table class="table table-hover">
													<thead>
														<tr>
															<th class="text-center">ID</th>
															<th>Processed</th>
															<th>Updated</th>
															<th class="text-center">Service</th>
															<th class="text-center">Video</th>
															<th class="text-right">Start</th>
															<th class="text-right">Want</th>
															<th class="text-right">Current</th>
															<th></th>
														</tr>
													</thead>
													<tbody id="tbody-search"></tbody>
												</table>
											</div>
										</div>
									</div>
								</div>	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@stop