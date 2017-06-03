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
                                        <th>Order Date</th>
                                        <th>Delivery Date</th>
                                        <th>Status</th>
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
                                <td><?php echo date('d-m-Y', strtotime($o->orderDate)); ?></td>
                                <td><?php echo date('d-m-Y', strtotime($o->deliveryDate)); ?></td>
                                <td>
                                	<select onchange="changeStatus(this.value, '<?= $o->orderId ?>');" >
                                		<option <?PHP if($o->orderStatus == 'pending') echo 'selected'; ?> value="pending">Pending</option>
                                		<option <?PHP if($o->orderStatus == 'delivered') echo 'selected'; ?> value="delivered">Delivered</option>
                                	</select>
                                <td>
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
	function changeStatus(status, orderid){
			$.ajax({
		        url: "<?= base_url('index.php/Main/updateStatus'); ?>",
		        type: "post",
		        data: {orderId: orderid, status : status},
		        success: function (response) {
		        	if(response == 'yes')	
		        	{
		        		alert("Status changed!!");	
		        	}
			    }
	    	});
		}
</script>