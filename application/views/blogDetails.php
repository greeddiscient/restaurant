<?php include"includes/header.php"; ?>
	<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
	<link href="<?php echo base_url(); ?>assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css" rel="stylesheet" />
	<!-- ================== END PAGE LEVEL STYLE ================== -->
</head>
<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade in"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="page-container fade page-sidebar-fixed page-header-fixed">
		<?php include"includes/topbar.php"; ?>
		
		<?php include"includes/sidebar.php"; ?>
		
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li><a href="javascript:;">Add</a></li>
				<li class="active">Blog</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Blog <small>Add/View Blog</small></h1>
			<!-- end page-header -->
			
			<div class="row">
			    <div class="col-md-12">
			        <!-- begin panel -->
                    <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
                        <div class="panel-heading">
                            <h4 class="panel-title">Add Blog</h4>
                        </div>
                        <div class="panel-body">
                        	<?php
                        	if($this->uri->segment(4))
                        	{
		  					if($this->uri->segment(4) == 'updated')
							{
							?>
							<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Blog Added Successfully</div>
							<?php	
							}
							else if($this->uri->segment(4) == 'no_image')
							{
							?>
							<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Please uplaod image correctly!!</div>	
							<?PHP	
							}
							}
							?>
							<?php echo validation_errors('<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>','</div>'); ?>
                        	<form class="form-horizontal" enctype="multipart/form-data" method="post" action="<?php echo base_url('index.php/Main/updateBlog'); ?>">
                        		<?PHP 
                        		foreach ($blogDetails as $value) {
                        		?>
                        		<div class="form-group">
                                    <label class="col-md-2 control-label">Blog Title</label>
                                    <div class="col-md-4">
                                        <input type="text" required class="form-control" placeholder="Blog Title" value="<?= $value->blogTitle ?>" name="blogTitle"/>
                                        <input type="hidden" value="<?= $value->blogId ?>" name="blogId" />
                                    </div>
								</div>
							 	<div class="form-group">
                                    <label class="col-md-2 control-label">Blog Image</label>
                                    <div class="col-md-4">
                                        <input type="file" class="form-control" name="blogImage"/>
                                        <br>
                                        <br>
                                        <img width="200" src="<?= base_url(); ?>assets/upload/<?= $value->blogImage ?>" />
                                    </div>
								</div>
								<div class="form-group">
                                    <label class="col-md-2 control-label">Blog Description</label>
                                    <div class="col-md-8">
                                        <textarea id="aa" required name="blogDesc" rows="25" style="width: 100%;"><?= $value->blogDesc ?></textarea>
                                    </div>
								</div>
                                <div class="form-group">
                                	<div class="clearfix"></div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-sm btn-success pull-right">Update Blog</button>
                                    </div>
                                </div>
                                <?PHP	
                        		}
                        		?>
                            </form>
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
			</div>
		</div>
		<!-- end #content -->
		
       <!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->
	
	<?php include"includes/footer.php"; ?>
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="<?php echo base_url(); ?>assets/plugins/DataTables/media/js/jquery.dataTables.js"></script>
	<script src="<?php echo base_url(); ?>assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/table-manage-default.demo.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/apps.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/ckeditor.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
		$(document).ready(function() {
			App.init();
			TableManageDefault.init();
		});
	</script>
	<script type="text/javascript">
		CKEDITOR.replace( 'tst' );
    </script>
</body>
</html>