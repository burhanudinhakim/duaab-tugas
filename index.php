<?php
$action = $_GET['page'];

?>


<!DOCTYPE HTML>
<!--
	Royale: A responsive HTML5 website template by HTML5Templates.com
	Released for free under the Creative Commons Attribution 3.0 license (html5templates.com/license)
	Visit http://html5templates.com for more great templates or follow us on Twitter @HTML5T
-->
<html>
<head>
<title>Aplikasi BPJS Kesehatan</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<noscript>
<link rel="stylesheet" href="css/5grid/core.css" />
<link rel="stylesheet" href="css/5grid/core-desktop.css" />
<link rel="stylesheet" href="css/5grid/core-1200px.css" />
<link rel="stylesheet" href="css/5grid/core-noscript.css" />
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="css/style-desktop.css" />
</noscript>
<script src="css/5grid/jquery.js"></script>
<script src="css/5grid/init.js?use=mobile,desktop,1000px&amp;mobileUI=1&amp;mobileUI.theme=none"></script>
<!--[if IE 9]><link rel="stylesheet" href="css/style-ie9.css" /><![endif]-->

<script type="text/javascript">
   var xmlHttp = buatObjekXmlHttp();

   function buatObjekXmlHttp()
   {
      var obj = null;
      if (window.ActiveXObject)
         obj = new ActiveXObject("Microsoft.XMLHTTP");   
      else 
         if (window.XMLHttpRequest)
            obj = new XMLHttpRequest();
          
      // Cek isi xmlHttp
      if (obj == null)
         document.write(
            "Browser tidak mendukung XMLHttpRequest");
      return obj;    
   }
           
   function ambilData(sumber_data, id_elemen)
   { 
      if (xmlHttp != null)
      {
         var obj = document.getElementById(id_elemen);
         xmlHttp.open("GET", sumber_data);

         xmlHttp.onreadystatechange = function ()
         {
            if (xmlHttp.readyState == 4 &&
                xmlHttp.status == 200)
            {
               obj.innerHTML = xmlHttp.responseText;
            }
         }  
         
         xmlHttp.send(null);
      }
   }
</script>



</head><body>
<div id="header-wrapper">
	<header id="header" class="5grid-layout">
		<div class="row">
			<div class="12u"> 
				<!-- Logo -->
				<h1>BPJS Kesehatan</a></h1>
				<a href="index.php">Beranda</a> <a href="?page=service">Service</a> <a href="?page=register">Regristrasi</a> <a href="?page=crud">CRUD</a>
			</div>
		</div>
	</header>
</div>
<div id="wrapper">
	<div class="5grid-layout">
		
		<div id="page">
			<div class="row">
				<div class="12u">
				</div>
<!-- -->

<?php
 if (($action)=='') {
 	include('cari.php');
?>

<!-- -->
						<div class="alignleft">
							<br /><br /><br /><br />
						</div>
<?php
}else if (($action)=='register'){
	include('register.php');	
}else if (($action)=='service'){
	?>
	<p><a href="?page=pesertaserv">Daftar Peserta BPJS</a></p>
	<p><a href="?page=benefitserv">Daftar Benefit Peserta BPJS</a></p>
	<?php
}
else if(($action)=='pesertaserv'){
		include('peserta_service.php'); ?>
	<p><a href="?page=service">Kembali</a></p>
		<?php 
}
else if (($action)=='benefitserv'){
	include('benefit_service.php');	 ?>
	<p><a href="?page=service">Kembali</a></p>
		<?php 
}
else if (($action)=='crud'){
	?>
	<p><a href="?page=peserta">Daftar Peserta BPJS</a></p>
	<p><a href="?page=benefit">Daftar Benefit Peserta BPJS</a></p>
	<p><a href="?page=riwayat">Riwayat Pendaftaran</a></p>
	<?php	
}
else if (($action)=='peserta'){
	include('bpjs_client.php');	
}
else if (($action)=='benefit'){
	include('benefit_client.php');	
}
else if (($action)=='riwayat'){
	include('riwayat.php');	
}
else if (($action)=='kami'){
	include('kami.php');	
}                        
?>									
					</section>
			</div>
		</div>

	</div>
</div>
<div class="5grid-layout">
	<div id="copyright">
		<section>
			<p>&copy; Kelompok duaab Prak. SIT<br>KOMSI UGM - 2015</p>
		</section>
	</div>
</div>
</body>
</html>