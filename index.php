
<?php
require 'user/pwd_generator_class.php';

?>

<!DOCTYPE html>
<html lang="it">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>SecureWebChat</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="icon" type="image/png" href="LogoUniud.png" sizes="32x32">
 <!-- GOOGLE FONTS  -->
  <link href="https://fonts.googleapis.com/css?family=Raleway|Satisfy" rel="stylesheet">

<!-- FONT AWESOME  -->
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">

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
    <div class="parallax"><img src="img/background1.jpg" alt="Unsplashed background img 1"></div>
  </div>


<!-- SERVIZIO -->
  <div id="servizio" class="container">
    <div class="section">
      <div class="col-servizio">

        <!--   Icon Section   -->
        <div class="row">
          <div class="col s12 m4">
            <div class="icon-block">
              <h2 class="center red-text text-lighten-1"><i class="material-icons">https</i></h2>
              <h5 class="center">Connessione sicura HTTPS</h5>
            </div>
          </div>

          <div class="col s12 m4">
            <div class="icon-block">
              <h2 class="center red-text text-lighten-1"><i class="material-icons">message</i></h2>
              <h5 class="center">Chatta con chi vuoi tu</h5>
             </div>
          </div>

          <div class="col s12 m4">
            <div class="icon-block">
              <h2 class="center red-text text-lighten-1"><i class="material-icons">share</i></h2>
              <h5 class="center">Invita i tuoi amici</h5>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>


<!-- REGISTRAZIONE -->
  <div id="registrazione" class="parallax-container valign-wrapper">
    <div class="section-registrazione no-pad-bot">
      <div class="container">
        <div class="row center">
          <i class="material-icons registrazione-icon">email</i>
          <h3 class=" col s12 light">Registrati al servizio</h3>
          <h5 class=" col s12 light">Scrivi ora ai tuoi amici!</h5>

          <div class="row">
            <div class="input-field col s12 l6 offset-l3">
            	<form action="database_inserisci_utente.php" method="POST" id="subscribe-form" name="subscribe-form" class="validate" target="_blank"> 
	                <input id="username" type="text" name = "username" required class="validate center white black-text" placeholder="Scegli il tuo username">
                   
                   <div id="message_user">
                    <p>Lo username deve contenere:</p>
                    <p id="username_length" class="invalid">Minimo <b>4 caratteri</b></p>
                  </div>

	                <input id="password" type="password"  name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" maxlength="72" class="validate center white black-text" placeholder="Scegli la tua password" required>
                 
                  <div id="message">
                    <p>La password deve contenere:</p>
                    <p id="letter" class="invalid">Una lettera <b>minuscola</b></p>
                    <p id="capital" class="invalid">Una lettera <b>maiuscola</b></p>
                    <p id="number" class="invalid">Un <b>numero</b></p>
                    <p id="length" class="invalid">Minimo <b>8 caratteri</b></p>
                  </div>

                  <input id="password_2" type="password"  name="password_2" class="validate center white black-text" placeholder="Ripeti la tua password" maxlength="72" required>
	                <input id="email" type="email" value="" name="email" class="validate center white black-text" placeholder="Inserisci la tua email" required>
	                
	                <button class="btn btn-registrazione waves-effect waves-light red lighten-1" type="submit" value="submit" name="action">Voglio registrarmi</button>                 
              </form>

               
                
              <form action="pwd_generator_result.php" name='form' target="_blank">
                <p align="center">
                  <input type='submit' value='suggerisci password sicura' name='submit' class="btn btn-theme"/><br><br><br><br>
                </p>
              </form>
            </div>
           </div>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="img/background3.jpg" alt="Immagine mancante"></div>
  </div>


<!-- Accesso -->
  <div id="accedi" class="container">
    <div class="section">

      <div class="row">
        <div class="col s12 center">
          <i class="material-icons invita-icon red-text text-lighten-1">share</i>
          <h3>Invita i tuoi amici alla tua chat</h3>
         <h5 class="invita-subtitle col s12 light">Accedi e invita alla tua chat room
          <br>
          Invia il link ai tuoi amici e inizia a chattare</h5>
          <div classe="row">
	          <div class="input-field col s12 l6 offset-l3">
		          <form action="user/login.php" method="POST" id="login-form" name="login-form" class="validate" target="_blank"> 
			                <input id="username" type="text" name = "username" class="center white black-text" placeholder="Inserisci il tuo username">
			                <input id="password" type="password"  name="password" class="center white black-text" placeholder="Inserisci la tua password">
			                <input type="hidden" name="login" value="login"/>
		          			<button class="col l6 offset-l3 btn btn-invita waves-effect waves-light red lighten-1" type="submit" name="login">Accedi</button>
		      		</form>
		      </div>
		   </div>
        </div>
      </div>

    </div>
  </div>



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
