<aside id="menu">
		<div id="navigation">
			<div class="profile-picture">
				<a href="youtube">
					<img src="{!! url('public/webview/assets/images/favicon.ico') !!}" class="img-circle m-b" alt="logo" style="width: 50px;">
				</a>
				<div class="stats-label text-color">
						                <span class="font-extra-bold">demo </span>
	                	                <hr style="margin: 5px;" />
	                <div class="btn-group" style="margin-top: 10px;">
						<button class="btn btn-xs btn-danger btn-check-balance" id="balance" style="font-size: 15px;">0</button>
						<button class="btn btn-xs btn-warning btn-check-balance" id="bonus" style="font-size: 15px;">0</button>
					</div>
	            </div>
			</div>

			<ul class="nav" id="side-menu">
				<li>
					<a href="{!! url('/account/profile') !!}"> <span class="nav-label"><i class="fa fa-user"></i> Account</span></a>
				</li>
				<li>
					<a href="{!! url('/account') !!}"> <span class="nav-label"><i class="fa fa-youtube"></i> Buy View</span></a>
				</li>
				<!-- <li>
					<a href="../tool"> <span class="nav-label">Youtube Tool</span></a>
				</li> -->
				<li>
					<a href="faq"> <span class="nav-label"><i class="fa fa-file-text-o"></i> FAQ</span></a>
				</li>
							</ul>
		</div>
	</aside>	<!-- Main Wrapper -->