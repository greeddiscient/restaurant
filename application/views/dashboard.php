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
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Dashboard </h1>
			<!-- end page-header -->
			
			<div class="row">
			    <div class="col-md-6">
			        <div id="barchart_values" style="width: 900px; height: 300px;"></div>

                </div>
                <div class="col-md-6">
			        
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
	<script src="<?php echo base_url(); ?>assets/plugins/parsley/dist/parsley.js"></script>
	<script src="<?php echo base_url(); ?>assets/plugins/DataTables/media/js/jquery.dataTables.js"></script>
	<script src="<?php echo base_url(); ?>assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/table-manage-default.demo.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/apps.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Sales", { role: "style" } ],
        ["<?= $firstChart['days'][7] ?>", <?= $firstChart['sales'][7] ?>, "#b87333"],
        ["<?= $firstChart['days'][6] ?>", <?= $firstChart['sales'][6] ?>, "#b87333"],
        ["<?= $firstChart['days'][5] ?>", <?= $firstChart['sales'][5] ?>, "#b87333"],
        ["<?= $firstChart['days'][4] ?>", <?= $firstChart['sales'][4] ?>, "silver"],
        ["<?= $firstChart['days'][3] ?>", <?= $firstChart['sales'][3] ?>, "gold"],
        ["<?= $firstChart['days'][2] ?>", <?= $firstChart['sales'][2] ?>, "color: #e5e4e2"],
         ["<?= $firstChart['days'][1] ?>", <?= $firstChart['sales'][1] ?>, "color: red"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Last 7 days sale",
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
      chart.draw(view, options);
  }
  </script>
	<script>
		$(document).ready(function() {
			App.init();
			TableManageDefault.init();
		});
	</script>
