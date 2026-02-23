<!DOCTYPE html>
<html>

<head>
	<title><?php echo $this->report_title; ?></title>
	<?php  
	Html ::  page_js('jquery.min.js');
	Html ::  page_js('qrcode.min.js');
	?>
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/gh/davidshimjs/qrcodejs@gh-pages/qrcode.min.js"></script>-->
	<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
	<style>

		#page-show{
			/* The main container div */
			width:750px;
			margin:0px auto 0;
		}

		div.img {
			height: 165px;
			text-align: center;
		}   

		div.img img {
			display: inline;
		}

		.image { 
			position: relative; 
			width: 100%; /* for IE 6 */
			text-align: center;
		}
		img {
			position: relative;
		}
		
		h1{
			position: absolute;
			top: 20px;
			z-index: 2;
			color: black;
			font-size: 30px;
		}

		p{		
			position: absolute;
			z-index: 2;
			color: black;
		}

		.nama{
			font-family: 'Lobster', Cursive;
			font-size: 60px;
			padding-top: 430px;
			padding-right: 0px;
			padding-bottom: 50px;
			padding-left: 80px;
		}

		.materi{
			font-size: 40px;
			padding-top: 590px;
			padding-right: 30px;
			padding-bottom: 50px;
			padding-left: 80px;
		}

		.no_legal{
			font-size: 17px;
			padding-top: 678px;
			padding-right: 30px;
			padding-bottom: 50px;
			padding-left: 215px;
		}

		.tgl_legal{	
			font-size: 17px;
			padding-top: 700px;
			padding-right: 30px;
			padding-bottom: 50px;
			padding-left: 215px;
		}

		.qr{	
			position: absolute;
			z-index: 1;
			font-size: 17px;
			padding-top: 700px;
			padding-right: 30px;
			padding-bottom: 50px;
			padding-left: 550px;
		}


		@page {
			margin: 0px;
			font-family: Arial, Helvetica, sans-serif;
		}

		body,
		
		h6 {
			margin: 0px;
			padding: 0px;
			font-family: Arial, Helvetica, sans-serif;
		}

		small {
			font-size: 12px;
			color: #888;
		}

		.ajax-page-load-indicator {
			display: none;
			visibility: hidden;
		}

		#report-header {
			position: relative;
			border-top: 2px solid #0066cc;
			border-bottom: 5px solid #0066cc;
			background: #fafafa;
			padding: 10px;
		}
		
		#report-header table{
			margin:0;
		}
		
		#report-header .sub-title {
			font-size: small;
			color: #888;
		}

		#report-header img {
			height: 50px;
			width: 50px;
		}

		#report-title {
			background: #fafafa;
			margin-top: 20px;
			margin-bottom: 20px;
			padding: 10px 20px;
			font-size: 24px;
		}
		#report-body{
			padding: 20px;
		}

		#report-footer {
			padding: 10px;
			background: #fafafa;
			border-top: 2px solid #0066cc;
			position: absolute;
			bottom: 0;
			left:0;
			width: 98%;
			overflow: hidden;
			margin: 0 auto;
		}
		
		#report-footer table{
			margin: 0;
			overflow: hidden;
		}

		table,
		.table {
			width: 100%;
			max-width: 100%;
			margin-bottom: 1rem;
			border-collapse: collapse;
		}

		.table th,
		.table td {
			padding: 0.75rem;
			vertical-align: top;
			border-top: 1px solid #eceeef;
		}

		.table thead th {
			vertical-align: bottom;
			border-bottom: 2px solid #eceeef;
		}

		.table tbody+tbody {
			border-top: 2px solid #eceeef;
		}

		.table .table {
			background-color: #fff;
		}

		.table-sm th,
		.table-sm td {
			padding: 0.3rem;
		}

		.table-bordered {
			border: 1px solid #eceeef;
		}

		.table-bordered th,
		.table-bordered td {
			border: 1px solid #eceeef;
		}

		.table-bordered thead th,
		.table-bordered thead td {
			border-bottom-width: 2px;
		}

		.table-striped tbody tr:nth-of-type(odd) {
			background-color: rgba(0, 0, 0, 0.05);
		}

		.table-hover tbody tr:hover {
			background-color: rgba(0, 0, 0, 0.075);
		}

		.table-active,
		.table-active>th,
		.table-active>td {
			background-color: rgba(0, 0, 0, 0.075);
		}

		.table-hover .table-active:hover {
			background-color: rgba(0, 0, 0, 0.075);
		}

		.table-hover .table-active:hover>td,
		.table-hover .table-active:hover>th {
			background-color: rgba(0, 0, 0, 0.075);
		}

		.table-success,
		.table-success>th,
		.table-success>td {
			background-color: #dff0d8;
		}

		.table-hover .table-success:hover {
			background-color: #d0e9c6;
		}

		.table-hover .table-success:hover>td,
		.table-hover .table-success:hover>th {
			background-color: #d0e9c6;
		}

		.table-info,
		.table-info>th,
		.table-info>td {
			background-color: #d9edf7;
		}

		.table-hover .table-info:hover {
			background-color: #c4e3f3;
		}

		.table-hover .table-info:hover>td,
		.table-hover .table-info:hover>th {
			background-color: #c4e3f3;
		}

		.table-warning,
		.table-warning>th,
		.table-warning>td {
			background-color: #fcf8e3;
		}

		.table-hover .table-warning:hover {
			background-color: #faf2cc;
		}

		.table-hover .table-warning:hover>td,
		.table-hover .table-warning:hover>th {
			background-color: #faf2cc;
		}

		.table-danger,
		.table-danger>th,
		.table-danger>td {
			background-color: #f2dede;
		}

		.table-hover .table-danger:hover {
			background-color: #ebcccc;
		}

		.table-hover .table-danger:hover>td,
		.table-hover .table-danger:hover>th {
			background-color: #ebcccc;
		}

		.thead-inverse th {
			color: #fff;
			background-color: #292b2c;
		}

		.thead-default th {
			color: #464a4c;
			background-color: #eceeef;
		}

		.table-inverse {
			color: #fff;
			background-color: #292b2c;
		}

		.table-inverse th,
		.table-inverse td,
		.table-inverse thead th {
			border-color: #fff;
		}

		.table-inverse.table-bordered {
			border: 0;
		}

		.table-responsive {
			display: block;
			width: 100%;
			overflow-x: auto;
			-ms-overflow-style: -ms-autohiding-scrollbar;
		}

		.table-responsive.table-bordered {
			border: 0;
		}
	</style>
</head>

<body>
	<?php
	$host="localhost";
	$user="root";
	$pass="";
	$database="arasitc";

	$db=new mysqli($host,$user,$pass,$database);
	if (mysqli_connect_errno()) {
		trigger_error('koneksi ke database gagal:'.mysqli_connect_error(),E_USER_ERROR);

	}

	?>




	<?php 
	$data = $this->view_data;
	$sql= "SELECT* FROM sertifikat WHERE id='".$data['id']."'";
	$query=mysqli_query($db,$sql);
	$ambildata = mysqli_fetch_array($query); 
	$tglnew=date_create($ambildata['tgl_sertifikat']);
	?>

	<div id="page-show">
		<div class="image">
			<p></p>
			<p class="nama"><?php echo($ambildata['nama_sertifikat']); ?></p>
			<p class="materi"><?php echo($ambildata['materi_sertifikat']); ?></p>
			<p class="tgl_legal"><?php echo(date_format($tglnew,'d-m-Y')); ?></p>
			
			<?php 
			
			$nama_sertifikat = $ambildata['nama_sertifikat'];
			$materi_sertifikat = $ambildata['materi_sertifikat'];
			?>
			<div id="anu" class="qr" style="width:100px; height:100px; margin-top:15px;"></div>
			<img width="100%" height="100%" src="<?php print_link("assets/images/sertif_non.jpg") ?>" >
			<!-- <input id="text" type="text" value="isi disini" style="width:80%" /><br /> -->
			
		</div>
	</div>
	<div id="report-body" style="display: none;">
		<?php
		$this->render_body();
		?>
	</div>





	

	<script type="text/javascript">
		var qrcode = new QRCode(document.getElementById("anu"), {
			width : 100,
			height : 100
		});

		function makeCode () {	
			var elText = '<?php echo "$nama_sertifikat || $materi_sertifikat || Silahkan cek dengan login ke data.arasitc.com"; ?>';

			qrcode.makeCode(elText);
		}

		makeCode();
	</script>






	<?php 
	if($this->force_print){
		?>
		<script>
			window.print();
		</script>
		<?php
	}
	?>
</body>

</html>