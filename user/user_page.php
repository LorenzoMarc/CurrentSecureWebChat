
<?php
require "session_login.php";

include("../config.php");

//$username = $_POST['$username'];
//$email = $_POST['$email'];

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
        <a href="https://localhost/SecureWebPage-master/index.php" class="brand-logo">SecureWebChat</a>
         <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <li><a href="#profilo">Profilo</a></li>
          <li><a href="#chat">Chat</a></li>
          <li><a href="logout_page.php">Logout</a></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
          <li><a href="#profilo">Profilo</a></li>
          <li><a href="#chat">Chat</a></li>
          <li><a href="logout_page.php">Logout</a></li>
      </ul>
      </div>
    </nav>
  </div>


<!-- INTRO -->
  <div>
  
      <div class="container">
        <?php
        echo "<h3 class=\"center black-text\">Benvenuto " . $_COOKIE['username'] . "</h3>";
        ?>
        <div class="row center">
          <form action="../chat/chat_page.php" method="POST" id="chat-form" name="chat-form" class="validate" target="_blank">            
         
            <button class="btn-large waves-effect waves-light red lighten-1" type="submit" name="chat">Avvia una chat!</button>
          </form>
        </div>
      </div>
   
  </div>




 <!--Scheda Profilo -->
  <div id="profile" class="container">
    <div class="section">
      <div class="col-profilo">
        <div class="row">
          <div class="col s12 l6 offset-l3 ">
            
            <div class="profile">
              <img src="../img/background1.jpg" alt="Profile Image" class="profile_image">
              <?php
                echo "<div class=\"profile_name\">".$_COOKIE['username']."</div>";
              ?>
              <div class="profile_details"><i class="material-icons">chat</i> mie chat</div>
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
  <script src="../js/materialize.js"></script>
  <script src="../js/init.js"></script>

  </body>
</html>
