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
				<li class="active">Todays Order</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Orders <small>Todays Order</small></h1>
			<div class="row">
			    <!-- begin col-12 -->
			    <div class="col-md-12">
			    <!-- begin panel -->
                    <div class="panel panel-inverse">
                        <div class="panel-heading">
                            <h4 class="panel-title">Todays Orders</h4>
                        </div>
                        <div class="panel-body">
                            <table id="data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Customer Name</th>
                                        <th>Mobile No.</th>
                                        <th>Amount</th>
                                        <th>Payment Type</th>
                                        <th>Address</th>
                                         <th>&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php
                                	$i =1;
                                	if($todaysOrder)
                                	{
	                                	foreach ($todaysOrder as $o)
	                                	{
	                                	?>
                            <tr class="">
                                <td><?php echo $i; ?></td>
                                <td><?php echo ucwords($o->customerName); ?></td>
                                <td><?php echo ucwords($o->customerMobile); ?></td>
                                <td><?php echo ucwords($o->totalAmount); ?></td>
                                <td><?php echo ucwords($o->paymentType); ?></td>
                                <td><?php echo ucwords($o->customerAddress); ?></td>
                                <td>
                                <a href="<?PHP echo base_url('index.php/Main/invoice/'.$o->orderId); ?>" class="btn btn-sm btn-primary">Details</a>
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
						            		<td colspan="7">No records</td>
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
		if(get == 'Edit'){
			$('#editbtn'+id).val('Update');
			$('#cname'+id).attr('disabled', false);
			$('#ccode'+id).attr('disabled', false);
		}
		else{
			var category = $('#cname'+id).val();
			if(category.length == 0)
			{
				category = $('#cname'+id).css('border-color','red');
				return false;
			}
			else
			{
				$.ajax({
			         url:"<?php echo base_url() ?>index.php/Main/updatecategory/",
			         type:'POST',
			         data:{id:id,category:category}
			      }).done(function(response){
			      		window.location.href = "<?php echo base_url(); ?>"+"index.php/Main/category/updated";
			      });
			}
		}	
	}

	function deleteme(id)
	{

		var r = confirm("Are you really want to delete this category??");
		    if (r == true) {
		       $.ajax({
		         url:"<?php echo base_url() ?>index.php/Main/deleteCategory/",
		         type:'POST',
		         data:{categoryId:id}
		      }).done(function(response){
		      		window.location.href = "<?php echo base_url(); ?>"+"index.php/Main/category/deleted";
		      });
		    } 
	}
</script>