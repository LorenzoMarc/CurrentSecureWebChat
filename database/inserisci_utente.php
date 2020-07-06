<?php 
error_reporting (0); // Do not show anything
include("../config.php");
include('function.php');

	$username = $_POST['username'];
	$password = $_POST['password'];
  $password_2 = $_POST['password_2'];
	$email = $_POST['email'];

  $username = htmlspecialchars($username);
  $password = htmlspecialchars($password);
  $password_2 = htmlspecialchars($password_2);
?>


<!DOCTYPE html>
<html lang="it">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>SecureWebChat</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="icon" type="image/png" href="../img/LogoUniud.png" sizes="32x32">
 <!-- GOOGLE FONTS  -->
  <link href="https://fonts.googleapis.com/css?family=Raleway|Satisfy" rel="stylesheet">

<!-- FONT AWESOME  -->
  <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">

</head>
<body>

  <!-- FIXED NAVBAR -->
  <div class="navbar-fixed">
    <nav>
      <div class="nav-wrapper white">
        <a href="#" class="brand-logo">SecureWebChat</a>
         <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <li><a href="../index.php#servizio">Servizio</a></li>
          <li><a href="../index.php#registrazione">Registrati</a></li>
          <li><a href="../index.php#accedi">Accedi</a></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
          <li><a href="../index.php#servizio">Servizio</a></li>
          <li><a href="../index.php#registrazione">Registrati</a></li>
          <li><a href="../index.php#accedi">Accedi</a></li>
      </ul>
      </div>
    </nav>
  </div>

<section id="content">
	<div class="container">
		<h1>Registrazione</h1>
		<h3>Risultato:</h3>
		

	<?php
		//controllo campi completati
  if ($password != $password_2){
    echo '<div class="alert alert-danger">
        <h3><strong>Le due password devono coincidere</strong></h3>
        </div>';
        header( "refresh:4;url=../index.php" );
    }else if(strlen($username)<4){
      echo "<h3>Username troppo corto!</h3>";
      header( "refresh:4;url=../index.php" );
      }
      else if($username!="" && $password!="" && $password_2!="" && $email!=""){
			//richiamo la funzione inserisci_utente();
			inserisci_utente($username, $password, $email);
		}
		else{
		echo '<div class="alert alert-danger">
				<h3><strong>Compila tutti i campi, grazie.</strong></h3>
			  </div>';
			  header( "refresh:4;url=../index.php" );
		}
	?>



	</div> <!-- /.container -->
	</section>



<!-- FOOTER -->
  <footer class="page-footer ">
    <div class="container">
      <div class="row">
        <div class="col l12 s12 center ">
          <h5 class="white-text">Progetto Cybersecurity 2019/2020</h5>
          
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      2020 <a class="brown-text text-lighten-3">Marcon Lorenzo 121450 </a>
       <a href="mailto:marcon.lorenzo@spes.uniud.it" class="social-icon" ><i class="fa fa-envelope" aria-hidden="true"></i></a>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
