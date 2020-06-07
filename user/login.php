
<?php
session_start();
include("../config.php");
include('../database/function.php');
//$username = $_POST['username'];
//$password = $_POST['password'];
  //require "session_loginChat.php";
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
  <link rel="icon" type="image/png" href="LogoUniud.png" sizes="32x32">
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
          <li><a href="#servizio">Servizio</a></li>
          <li><a href="#registrazione">Registrati</a></li>
          <li><a href="#accedi">Accedi</a></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
          <li><a href="#servizio">Servizio</a></li>
          <li><a href="#registrazione">Registrati</a></li>
          <li><a href="#accedi">Accedi</a></li>
      </ul>
      </div>
    </nav>
  </div>


<!-- INTRO -->
  <div id="index-banner" class="parallax-container">
    <div class="section-intro no-pad-bot">
      <div class="container">
        <br><br>
        <h1 class="header center white-text">Invita e chatta in maniera sicura.</h1>
        <div class="row center">
          <h5 class="header-subtitle col s12 light">Registrati e invita i tuoi amici</h5>
        </div>
        <div class="row center">
          <a href="#servizio" id="" class="btn-large waves-effect waves-light red lighten-1">Scopri come funziona</a>
        </div>
        <br><br>

      </div>
    </div>
    <div class="parallax"><img src="../img/background1.jpg" alt="Unsplashed background img 1"></div>
  </div>

  <!-- Risultati chiamata -->
  <section id="content">
   <div class="container">
      <h1>Account utente</h1>
      <h2>Pagina personale</h2>
<?php
      //controllo campi completati
    if($username != "" && $password != ""){
      
      //richiamo la funzione inserisci_utente();
      check_users($username, $password);
      
    }
    else{
    echo '<div class="alert alert-danger">
        <strong>Compila tutti i campi, grazie.</strong>
        </div>';
        header( "refresh:3;url=../index.php" );
    }
?>


     <a href="logout_page.php" class="btn btn-theme">Effettua Logout</a>;
    </div>
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
  <script src="../js/materialize.js"></script>
  <script src="../js/init.js"></script>

  </body>
</html>
