<!-- begin #sidebar -->
		<div id="sidebar" class="sidebar">
			<!-- begin sidebar scrollbar -->
			<div data-scrollbar="true" data-height="100%">
				<!-- begin sidebar user -->
				<ul class="nav">
					<li class="nav-profile">
						<div class="image">
							<a href="javascript:;"><img src="<?php echo base_url(); ?>assets/img/user-13.jpg" alt="" /></a>
						</div>
						<div class="info">
							Admin
							<small>Manage Admin</small>
						</div>
					</li>
				</ul>
				<!-- end sidebar user -->
				<!-- begin sidebar nav -->
				<ul class="nav">
					<li class="nav-header">Navigation</li>
					<li><a href="<?php echo base_url(); ?>"><i class="fa fa-laptop"></i> <span>Dashboard</span></a></li>
					<li><a href="<?php echo base_url('index.php/Main/newOrder'); ?>"><i class="fa fa-cubes"></i> <span>New Order</span></a></li>	
					<li><a href="<?php echo base_url('index.php/Main/menus'); ?>"><i class="fa fa-cubes"></i> <span>Menu</span></a></li>
					<li><a href="<?php echo base_url('index.php/Main/todaysOrder'); ?>"><i class="fa fa-user"></i> <span>Todays Order</span></a></li>
					<!-- begin sidebar minify button -->
					<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
			        <!-- end sidebar minify button -->
				</ul>
				<!-- end sidebar nav -->
			</div>
			<!-- end sidebar scrollbar -->
		</div>
		<div class="sidebar-bg"></div>
		<!-- end #sidebar -->