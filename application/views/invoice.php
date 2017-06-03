<?php include"includes/header.php"; ?>
<?php
foreach($orderDetails as $value){
	$customerName = $value->customerName;
	$customerAddress = $value->customerAddress;
	$customerMobile = $value->customerMobile;

	$orderDate = $value->orderDate;
	$orderId = $value->orderId;
	$totalAmount = $value->totalAmount;
}
?>
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
			<ol class="breadcrumb hidden-print pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li class="active">Invoice</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header hidden-print">Invoice <small>For customers</small></h1>
			<!-- end page-header -->
			
			<!-- begin invoice -->
			<div class="invoice">
                <div class="invoice-company">
                    <span class="pull-right hidden-print">
                    <a href="javascript:;" class="btn btn-sm btn-success m-b-10"><i class="fa fa-download m-r-5"></i> Export as PDF</a>
                    <a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-success m-b-10"><i class="fa fa-print m-r-5"></i> Print</a>
                    </span>
                    Restaurant Name
                </div>
                <div class="invoice-header">
                    <div class="invoice-from">
                        <small>From</small>
                        <address class="m-t-5 m-b-5">
                            <strong>My Restaurant</strong><br />
                            Street Address<br />
                            City, Zip Code<br />
                            Phone: (123) 456-7890<br />
                            Fax: (123) 456-7890
                        </address>
                    </div>
                    <div class="invoice-to">
                        <small>TO</small>
                        <address class="m-t-5 m-b-5">
                            <strong><?= ucwords($customerName) ?></strong><br />
                            <?= ucwords($customerAddress) ?><br />
                            Phone: <?= $customerMobile ?><br />
                        </address>
                    </div>
                    <div class="invoice-date">
                        <small>Invoice</small>
                        <div class="date m-t-5"><?PHP
                         $timestamp = strtotime($orderDate);
						echo $new_date_format = date('d-m-Y' , $timestamp);

                         ?></div>
                        <div class="invoice-detail">
                            #0000<?= $orderId ?>RES<br />
                        </div>
                    </div>
                </div>
                <div class="invoice-content">
                    <div class="table-responsive">
                        <table class="table table-invoice">
                            <thead>
                                <tr>
                                	<th>SR. NO.</th>
                                    <th>PRODUCT NAME</th>
                                    <th>RATE</th>
                                    <th>QUANTITY</th>
                                    <th>AMOUNT</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php
                            		$i =1;
                            		foreach ($orders as $value) {
                            	?>
								<tr>
                                	<td><?= $i; ?></td>
                                    <td><?= $value->itemName ?></td>
                                    <td><?= $value->price ?></td>
                                    <td><?= $value->quantity ?></td>
                                    <td><?= $value->price * $value->quantity ?></td>
                                </tr>
                            	<?PHP		
                            		$i++;
                            		}
                            	?>
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="invoice-price">
                        <div class="invoice-price-left">
                            
                        </div>
                        <div class="invoice-price-right">
                            <small>TOTAL</small> <?= $totalAmount ?>
                        </div>
                    </div>
                </div>
                <div class="invoice-note">
                    * Make all cheques payable to [Your Company Name]<br />
                    * Payment is due within 30 days<br />
                    * If you have any questions concerning this invoice, contact  [Name, Phone Number, Email]
                </div>
                <div class="invoice-footer text-muted">
                    <p class="text-center m-b-5">
                        THANK YOU FOR YOUR BUSINESS
                    </p>
                    <p class="text-center">
                        <span class="m-r-10"><i class="fa fa-globe"></i> www.primowebsoft.com</span>
                        <span class="m-r-10"><i class="fa fa-phone"></i> T: +91-8656823023</span>
                        <span class="m-r-10"><i class="fa fa-envelope"></i> aamir.0019@gmail.com</span>
                    </p>
                </div>
            </div>
			<!-- end invoice -->
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