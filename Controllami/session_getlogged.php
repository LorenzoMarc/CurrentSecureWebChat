
<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Lab. Sicurezza <?php echo date("Y"); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="" />
<!-- css -->
<link href="../../css/bootstrap.min.css" rel="stylesheet" />
<link href="../../css/fancybox/jquery.fancybox.css" rel="stylesheet">
<!-- <link href="../../css/jcarousel.css" rel="stylesheet" /> -->
<link href="../../css/flexslider.css" rel="stylesheet" />
<link href="../../css/style.css" rel="stylesheet" />


<!-- Theme skin -->
<link href="../../skins/default.css" rel="stylesheet" />

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>
<body>
<div id="wrapper">
	<!-- start header -->
	<header>
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="../../index.php"><span>Lab Sicurezza</span> <?php echo date("Y"); ?></a>

                </div>


                <!-- MENU -->
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
                        <li><a href="../../index.php">Home</a></li>
                        <li><a href="../../risorse-utili.php">Risorse utili</a></li>
                        <li><a href="../../contact.php">Contatti</a></li>
                    </ul>
                </div>
                <!-- end MENU -->

                
            </div>
        </div>
	</header>
	<!-- end header -->


	<!-- BREADCRUMBS -->
	<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<ul class="breadcrumb">
					<li><a href="../../index.php"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
					<li><a href="lect2.php">Esercitazione 2b</a></li>
					<li class="active">Le sessioni</li>
				</ul>
			</div>
		</div>
	</div>
	</section>



	<!-- CONTENT start -->
	<!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->
	<section id="content">
	<div class="container">
		<h1>Sessions</h1>
		<h2>Verifica Login</h2>

		<div id="myContent" style="text-align:center;">
			<?php
			if(isset($_POST["login"])){

				$varUsername = $_POST["username"];
				$varPassword = $_POST["password"];
				
				if (empty($varUsername) or empty($varPassword)) {
					$_SESSION["Authenticated"] = 0;

					echo '<h4>Compila tutti i campi</h4>' ;
					echo '<a href="http://127.0.0.1/lab-sicurezza/sam-project/lectures/lect-2/session_index.php" class="btn btn-theme">Ritorna al Login</a>';
        		
   		 		}
   		 		else
   		 		{
   		 		
   		 			if(!isset($varUsername) && !isset($varPassword)){
   		 				$_SESSION["Authenticated"] = 0;
   		 				header("Location: session_index.php");
   		 			}else{
   		 				$_SESSION["Authenticated"] = 1;
   		 				
   		 			}
   		 		session_write_close();
   		 		echo '<h4>Ora sei autenticato.<h4>';
   		 		echo '<a href="http://127.0.0.1/lab-sicurezza/sam-project/lectures/lect-2/session_courtesy_page.php" class="btn btn-theme">Continua la navigazione</a>';
   		 			
   		 		}
   		 	}else{
   		 		header("Refresh: 4; url=session_index.php");
   		 	}
   		 	

   		 	if(isset($_GET["logout"])){
   		 		session_destroy();
   		 		header("Refresh: 4; url=session_index.php");
   		 	}
			
			?>
			
		</div>

	</div> <!-- /.container -->
	</section>
	<!-- CONTENT end -->
	<!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->


	<!-- THE FOOTER -->
	<?php
		include('../../footer.php');
	?>
	

</body>
</html>