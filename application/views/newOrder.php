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
				<li class="active">New Order</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Order <small>New</small></h1>
			<!-- end page-header -->
			
			<div class="row">
				<form class="form-horizontal" method="post" novalidate action="<?php echo base_url('index.php/Main/addOrder'); ?>">
			    <div class="col-md-12">
			    	<?php
  					$res = $this->uri->segment(3);
					if($res=='success')
					{
					?>
					<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Order Successfull!!</div>
					<?php	
					}
					?>

			        <!-- begin panel -->
                    <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
                        <div class="panel-heading">
                            <h4 class="panel-title">Customer Details</h4>
                        </div>
                        <div class="panel-body">
                        
                        		<div class="form-group">
                                	<div class="col-md-12">
                                		<div class="col-md-6">
                                			<label class="pull-right" >
                                			<input id="radioReturning" onclick="checkRadio()" type="radio" checked value="returning" name="guestType" class="pull-right" />
	                                     		<b>Returning Guest&nbsp;&nbsp; </b>
	                                     	</label>
	                                    </div>
	                                    <div class="col-md-6">
	                                    	<label class="pull-left">
	                                        <input id="radioNew" type="radio" onclick="checkRadio()"  value="new" name="guestType"/>&nbsp;&nbsp;<b>New Customer</b>
	                                        </label>
	                                    </div>
                                    </div>
								</div>
                                <div class="form-group" id="mob">
                                	
                                    <label class="col-md-2 col-md-offset-2 control-label">Mobile Number</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" placeholder="Mobile Number" autocomplete="off" name="mobileNumber" id="mobileNumber" />
                                    </div>
                                    <div class="col-md-4">
                                        <button onclick="checkMobile(); return false;" class="btn btn-sm btn-success pull-left">Check</button>
                                    </div>
								</div>

							 	<div class="col-md-12" id="returning">
							 	<hr>
							 		<div class="table-responsive">
							 			<table class="table">
							 				<thead>
							 					<tr>
							 						<th>Customer Name</th>
							 						<th>Mobile Number</th>
							 						<th>Email</th>
							 						<th>Age</th>
							 						<th>Address</th>
							 						<th>&nbsp;</th>
							 					</tr>
							 				</thead>
							 				<tbody id="custResult">
							 					<tr>
							 						<td colspan="6">No Result</td>
							 					</tr>
							 					
							 				</tbody>
							 			</table>
							 		</div>
							 	</div>

								<div class="col-md-12" id="newCustomer" style="display: none;">
								<hr>
								<div class="col-md-6">
									<div class="form-group">
	                                    <label class="col-md-4 control-label">Full Name</label>
	                                    <div class="col-md-8">
	                                        <input type="text" class="form-control" id="fullName" placeholder="Full Name" autocomplete="off" name="fullName"/>
	                                    </div>
	                                </div>
                                </div>	
								<div class="col-md-6">
									<div class="form-group">
	                                    <label class="col-md-4 control-label">Mobile Number</label>
	                                    <div class="col-md-8">
	                                        <input type="text" class="form-control" id="mobNumb" onblur="checkMobileExists(this.value);" placeholder="Mobile Number" autocomplete="off" name="mobileNumber"/>
	                                    </div>
	                                </div>
                                </div>
                                <div class="col-md-6">
									<div class="form-group">
	                                    <label class="col-md-4 control-label">Email</label>
	                                    <div class="col-md-8">
	                                        <input type="text" id="email" class="form-control" placeholder="Email" autocomplete="off" name="email"/>
	                                    </div>
	                                </div>
                                </div>	
								<div class="col-md-6">
									<div class="form-group">
	                                    <label class="col-md-4 control-label">Address</label>
	                                    <div class="col-md-8">
	                                        <input type="text" class="form-control" id="address" placeholder="Address" autocomplete="off" name="address"/>
	                                    </div>
	                                </div>
                                </div>	
								</div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
			        <!-- begin panel -->
                    <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
                        <div class="panel-heading">
                            <h4 class="panel-title">Add items</h4>
                        </div>
                        <div class="panel-body">
                        	    <div class="form-group">
                                	
                                    <div class="col-md-4">
                                        <input type="text" id="autocomp" class="form-control" placeholder="Item Name" onblur="checkPrice();" autocomplete="off" />
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" id="productQuantity" placeholder="Quantity" onblur="getAmount()" autocomplete="off" />
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" readonly="" class="form-control" id="priceProduct" placeholder="Price" autocomplete="off" />
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" readonly="" class="form-control" id="productAmount" placeholder="Amount" autocomplete="off" />
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" onclick="addMe(); return false;" class="btn btn-sm btn-success pull-left">Add</button>
                                    </div>
								</div>

							 	<div class="col-md-12" id="cust">
							 	<hr>
							 		<div class="table-responsive">
							 			<table class="table">
							 				<thead>
							 					<tr>
							 						<th>Item</th>
							 						<th>Quantity</th>
							 						<th>Price</th>
							 						<th>Amount</th>
							 						<th>Delete</th>
							 					</tr>
							 				</thead>
							 				<tbody id="pr">
							 					
							 				</tbody>
							 				<tfoot style="font-weight: bold;">
							 					<tr>
							 						<td colspan="3" style="text-align: right;">Total</td>
							 						<td id="total">0</td>
							 						<td>&nbsp;</td>
							 					</tr>
							 				</tfoot>
							 			</table>
							 		</div>
							 	</div>
						</div>
                    </div>
                    <!-- end panel -->
                </div>
                <input type="hidden" id="selectedGuest" name="selectedGuest" />

                 <div class="col-md-4">
			        <!-- begin panel -->
                    <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
                        <div class="panel-heading">
                            <h4 class="panel-title">Payment Type</h4>
                        </div>
                        <div class="panel-body">
                        	    <div class="form-group">
                        	    	<div class="col-md-12 text-center" style="padding-top: 10px;">
                                       <label class="col-md-6 control-label">Delivery Date</label>
	                                    <div class="col-md-6">
	                                        <input type="text" class="form-control" value="<?= date('m/d/Y'); ?>"placeholder="Delivery Date" id="deliveryDate" autocomplete="off" name="deliveryDate"/>
	                                    </div>
                                    </div>
                                	<div class="col-md-12 text-center" style="font-size: 24px;padding-bottom: 20px;padding-top: 20px;">
                                       Total: <span id="totaltwo">0</span>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="radio" value="cash" checked="" name="paymentType"/>&nbsp;&nbsp;<b>Cash</b>
                                    </div>
                                    <div class="col-md-6">
                                     	<input type="radio" value="bank" name="paymentType"/>&nbsp;&nbsp;<b>Bank Transfer</b>
                                    </div>
                                    <div class="col-md-4" style="margin-top: 30px;">
                                        <button onclick="return checkFinal(); " class="btn btn-sm btn-success pull-right">Submit</button>
                                    </div>
								</div>
						</div>
                    </div>
                </div>
                </form>
                <!-- form end -->
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

	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	
	<script>
		 $( function() {
		    $( "#deliveryDate" ).datepicker({
			        minDate: 0
			    });
		  } );
		$(document).ready(function() {
			App.init();
			TableManageDefault.init();
		});
	</script>
	<script type="text/javascript">
	$( function() {
    var availableTags = [
    <?PHP
    	foreach ($products as $value) {
    		echo "'".$value->itemName."',";
    	}
    ?>	
	];
    $( "#autocomp" ).autocomplete({
      source: availableTags
    });
  });

  function checkPrice()	
  {
  	var product = $( "#autocomp" ).val();
  	if(product != "")
  	{
	  	$.ajax({
	        url: "<?= base_url('index.php/Main/ajaxPrice'); ?>",
	        type: "post",
	        data: {product: product},
	        success: function (response) {
	        	if(response == 'no')
	        	{
	        		alert("This is not a valid product");
	        	}
	        	else
	        	{
	        		$('#priceProduct').val(response);
	        	}
	        }
		});
  	}
  }

    function checkMobile()
    {
		var mobileNumber = $('#mobileNumber').val();
    	$.ajax({
	        url: "<?= base_url('index.php/Main/checkMobile'); ?>",
	        type: "post",
	        data: {mobileNumber: mobileNumber},
	        success: function (response) {
	        	if(response == 'no')	
	        	{
		        	alert("No Result");
	        	}
	        	else
	        	{
	        		$('#newCustomer').hide();
		        	$('#returning').show();
		        	$('#custResult').html(response);	
	        	}
	        }
    	});
    	return false;	
    }

    function checkRadio()
    {
    	if($('#radioReturning').is(":checked"))
    	{
    		$('#returning').show();
    		$('#mob').show();
    		$('#newCustomer').hide();
    	}
    	else if($('#radioNew').is(":checked"))
    	{
			$('#returning').hide();
    		$('#mob').hide();
    		$('#newCustomer').show();
    	}
    } 

    function addMe()
    {
    	
    	var productname = $('#autocomp').val();
    	var priceProduct = $('#priceProduct').val();
    	var productQuantity = $('#productQuantity').val();
    	var productAmount = $('#productAmount').val();

    	if(priceProduct != '')
    	{
    		if(productAmount == '' || productAmount == 'NaN')
	    	{
	    		alert("Please enter quantity.");
	    	}
	    	else
	    	{
			var amount = parseInt(priceProduct)*parseInt(productQuantity);
			
			var result = '<tr><td>'+productname+'<input class="productname" type="hidden" name="productName[]" value="'+productname+'" /></td><td>'+productQuantity+'<input class="productQuantity" type="hidden" name="productQuantity[]" value="'+productQuantity+'" /></td><td>'+priceProduct+'<input class="priceProduct" type="hidden" name="priceProduct[]" value="'+priceProduct+'" /></<td><td>'+amount+'<input type="hidden" class="amount" name="amount[]" value="'+amount+'" /></<td><td><img width="20" onclick="$(this).closest(\'tr\').remove();myTotal();" src="/assets/img/delete.png"></td></tr>';
	    		$('#pr').append(result);

				myTotal();	
	    

		    	$('#autocomp').val('');
		    	$('#priceProduct').val('');
		    	$('#productQuantity').val('');
		    	$('#productAmount').val('');
		    }
    	}
    	else
    	{
    		alert("Please select the product!");
    	}
    }

    function myTotal()
    {
    	var total = 0;	
    	$('.amount').each(function(){
    		var get = $(this).val();
    		total = parseInt(total) + parseInt(get);
    	});
    	$('#total').html(total);
    	$('#totaltwo').html(total);
    }

    function getAmount()
    {
    	var priceProduct = $('#priceProduct').val();
    	var productQuantity = $('#productQuantity').val();
		//pr
		if(productQuantity != '' || priceProduct != '')
		{
	    	var result = parseInt(priceProduct)*parseInt(productQuantity);	
	    	$('#productAmount').val(result);
   	 	}
	}

	function checkMobileExists()
	{
		var get = $('#mobNumb').val();
		if(get != "")
		{
			$.ajax({
		        url: "<?= base_url('index.php/Main/checkMobileExists'); ?>",
		        type: "post",
		        data: {mobileNumber: get},
		        success: function (response) {
		        	if(response == 'no')	
		        	{
		        		$('#mobNumb').css('border-color', '#ccd0d4');
		        		return true;
		        	}
			        else
			        {
			        	$('#mobNumb').css('border-color', 'red');
			        	alert("Mobile number already exists!!");
			        	return false;
			        }
		        }
	    	});
		}
	}

	function checkFinal()
	{
		var total = $('#total').html();

		if($('#radioReturning').is(":checked"))
    	{
    		var selectedGuest = $('#selectedGuest').val();
    		if(selectedGuest == '')
    		{
    			alert("You have not selected the customer.");
    			return false;
    		}
    		else
    		{
    			if(total == '0')
    			{
    				alert("Please select product.");
    				return false;
    			}
    			else
    			{
    				return true;
    			}
    		}
    	}
    	else if($('#radioNew').is(":checked"))
    	{
    		var fullName = $('#fullName').val();
			var mobNumb = $('#mobNumb').val();
			var email = $('#email').val();
			var address = $('#address').val();

			if(fullName == '' || mobNumb == '' || email == '' || address == '')
			{
				alert("Please enter customer details");
				return false;
			}
			else
			{
				if(total == '0')
    			{
    				alert("Please select product.");
    				return false;
    			}
    			else
    			{
    				$.ajax({
				        url: "<?= base_url('index.php/Main/checkMobileExists'); ?>",
				        type: "post",
				        data: {mobileNumber: mobNumb},
				        success: function (response) {
				        	if(response == 'yes')	
				        	{
				        		$('#mobNumb').css('border-color', 'red');
					        	alert("Mobile number already exists!!");
					        	return false;
				        	}
					        else
					        {
					        	$('#mobNumb').css('border-color', '#ccd0d4');
				        		return true;
					        }
				        }
			    	});
    			}
			}
		}
	}

	function setMobileNo(get)
	{
		$('#selectedGuest').val(get);
		alert("you have selected the customer");
	}
    </script>


</body>
</html>