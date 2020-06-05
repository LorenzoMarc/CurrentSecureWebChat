
<?php
include("config.php");
include('function.php');
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
    <div class="parallax"><img src="background1.jpg" alt="Unsplashed background img 1"></div>
  </div>

  <!-- Risultati  -->
 <section id="content">
  <div class="container">
    <h1>Operazioni sui database</h1>
    <h3>Inserisci un nuovo utente</h3>


      <!-- form per l'inserimento di dati sul DB  REGISTRAZIONE-->
    <div id="myContent" style="text-align:center;">
      <form action="database_inserisci_utente.php" name='form' method="POST">
        <p align="center">Inserisci username</p> <input type='text' name='username'/><br/><br/>
        <p align="center">Inserisci password</p> <input type='password' name='password'/><br/><br/>
        <p align="center">Inserisci email</p> <input type='email' name='email'/><br/><br/>
      <p align="center"><input type='submit' value='Inserisci utente' class="btn btn-theme"/><br><br><br><br></p>
      </form>

      <div id="myContent" style="text-align:center;">
            <form action="pwd_generator_result.php" name='form'>      
            <p align="center"><input type='submit' value='Genera password sicura' name='submit' class="btn btn-theme"/><br><br><br><br></p>
            </form>
      </div>

    </div>

<h3>Lista degli utenti</h3>
    
  <?php
    //stampo la lista degli utenti
    $users = lista_utenti();  //se la lista degli utenti non è vuota stampo una tabella
    if(!empty($users)){
      echo '<table style="width:100%">
        <tr>
          <th>Id</th>
          <th>Username</th>
          <th>Password</th>
          <th>Email</th>
          <th>Remove</th>
        </tr>';
      foreach ($users as $user) {  //ad ogni iterazione il valore di $users (che è un array) viene assegnato a $user
        echo '<tr>
            <td>' . $user[0] . ' </td>
            <td>' . $user[1] . ' </td>
            <td>' . $user[2] . ' </td>
            <td>' . $user[3] . ' </td>
            <td><a href="database_rimuovi_utente.php?id='.$user[0].'">Rimuovi utente</a></td>
            </tr>' ;
      }
      echo '</table>';
    }
    else{
      echo '<div class="alert alert-warning">
          <strong>Nessun utente presente sul database</strong>
          </div>';
    }
?>

<br />

    <h3>Verifica utente</h3>
    <!-- Verifica utente esistente -->
    <div id="myContent" style="text-align:center;">
      <form action="database_check.php" name='form' method="POST">
        <p align="center">Inserisci username</p> <input type='text' name='username'/><br/><br/>
        <p align="center">Inserisci password</p> <input type='text' name='password'/><br/><br/>
        <p>Cifra password con: </p>
        <label><input type="radio" name="optradio" value="md5" checked="checked"> md5</label> <br />
        <label><input type="radio" name="optradio" value="sha1"> sha1</label> <br />
        <label><input type="radio" name="optradio" value="crypt"> crypt</label> <br />
        <label><input type="radio" name="optradio" value="inchiaro"> in chiaro</label> <br />
        <br />
        <p align="center"><input type='submit' name ='submit' value='Verifica utente' class="btn btn-theme"/><br><br><br><br></p>
      </form>
      
    </div>

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
