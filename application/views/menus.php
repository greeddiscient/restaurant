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
				<li class="active">Menu</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Menus <small>Add/View Menu</small></h1>
			<!-- end page-header -->
			
			<div class="row">
			    <div class="col-md-12">
			        <!-- begin panel -->
                    <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
                        <div class="panel-heading">
                            <h4 class="panel-title">Add Menu</h4>
                        </div>
                        <div class="panel-body">
                        	<?php
		  					$res = $this->uri->segment(3);
							if($res=='added')
							{
							?>
							<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Item Added Successfully</div>
							<?php	
							}
							?>
							<?php echo validation_errors('<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>','</div>'); ?>
                        	<form class="form-horizontal" method="post" action="<?php echo base_url('index.php/Main/additem'); ?>">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Item Name</label>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" placeholder="Item Name" name="itemName"/>
                                    </div>
                                     <label class="col-md-2 control-label">Price</label>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" placeholder="Item Price" name="itemPrice"/>
                                    </div>
									<div class="col-md-2">
                                        <button type="submit" class="btn btn-sm btn-success">Add</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
			</div>
			
			<!-- begin row -->
			<div class="row">
			    <!-- begin col-12 -->
			    <div class="col-md-12">
			    	<?php
  					$res = $this->uri->segment(3);
					if($res=='updated')
					{
					?>
					<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Item Updated Successfully</div>
					<?php	
					}
					if($res=='deleted')
					{
					?>
					<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Item Deleted Successfully</div>
					<?php	
					}
					?>
		        <!-- begin panel -->
                    <div class="panel panel-inverse">
                        <div class="panel-heading">
                            <h4 class="panel-title">All Items</h4>
                        </div>
                        <div class="panel-body">
                            <table id="data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Item Name</th>
                                        <th>Price</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php
                                	$i =1;
                                	if($menus)
                                	{
	                                	foreach ($menus as $c)
	                                	{
	                                	?>
	                                    <tr class="">
	                                        <td><?php echo $i; ?></td>
	                                        <td><input disabled  id="itemname<?php echo $c->itemId;?>" class="form-control" value="<?php echo ucwords($c->itemName); ?>"></td>
	                                        <td><input disabled  id="itemprice<?php echo $c->itemId;?>" class="form-control" value="<?php echo ucwords($c->itemPrice); ?>">
	                                        </td>
	                                        <td>
												<input type="button" id="editbtn<?php echo $c->itemId; ?>" onclick="return update(this.value, <?PHP echo $c->itemId; ?>);" class="btn btn-sm btn-success" value="Edit">
												<button type="button" onclick="return deleteme(<?php echo $c->itemId; ?>); " class="btn btn-sm btn-warning">Delete</button>
											</td>
	                                    </tr>
	                                    <?php
	                                    $i++;
	                                	}
	                                }
	                                else
	                                {
	                                	?>
						            	<tr class="danger text-center">
						            		<td colspan="4">No records</td>
						            	</tr>
						            	<?php
	                                }
	                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-12 -->
            </div>
            <!-- end row -->
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
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
		$(document).ready(function() {
			App.init();
			TableManageDefault.init();
		});
	</script>
 
</body>

</html>
<script type="text/javascript">
function update(get,id){
		if(get == 'Edit')
		{
			$('#editbtn'+id).val('Update');
			$('#itemname'+id).attr('disabled', false);
			$('#itemprice'+id).attr('disabled', false);
			$('#ccode'+id).attr('disabled', false);
		}
		else
		{
			var itemname = $('#itemname'+id).val();
			var itemprice = $('#itemprice'+id).val();
			if(itemname.length == 0 || itemprice.length == 0 )
			{
				$('#itemname'+id).css('border-color','red');
				$('#itemprice'+id).css('border-color','red');
				return false;
			}
			else
			{
				$.ajax({
			         url:"<?php echo base_url() ?>index.php/Main/updatemenu/",
			         type:'POST',
			         data:{id:id,itemname:itemname, itemprice:itemprice}
			      }).done(function(response){
			      		window.location.href = "<?php echo base_url(); ?>"+"index.php/Main/additem/updated";
			      });
			}
		}	
	}

	function deleteme(id)
	{

		var r = confirm("Do you really want to delete this item??");
		    if (r == true) {
		       $.ajax({
		         url:"<?php echo base_url() ?>index.php/Main/deleteItem/",
		         type:'POST',
		         data:{itemId:id}
		      }).done(function(response){
		      		window.location.href = "<?php echo base_url(); ?>"+"index.php/Main/menus/deleted";
		      });
		    } 
	}
</script>