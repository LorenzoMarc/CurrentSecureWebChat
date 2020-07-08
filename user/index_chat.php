<?php 
error_reporting (0); // Do not show anything
require "session_login.php";
?>

<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Chat</title>
                
        <!-- CSS-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>          

        <link rel="icon" type="image/png" href="../img/LogoUniud.png" sizes="32x32">

        <!--  GOOGLE FONTS  -->
        <link href="https://fonts.googleapis.com/css?family=Raleway|Satisfy" rel="stylesheet">

        <!--  FONT AWESOME  -->
        <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
            
        <link href="style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
      
    </head>



    <body>
     
        <div class="container">

            <div id="messages" class="col s12 l6 offset-l3 "></div>
        </div>


        <div class="container">
            <form>
                <input  type="text" id="message" class="col s12 l6 offset-l3 " autocomplete="off" autofocus placeholder="Scrivi un messaggio...">
                
                <input class="btn-large waves-effect waves-light red lighten-1" type="submit" value="Invia">
                  <!--
                <input type="checkbox" id="autodelete" name="autodelete">
                <label for="autodelete">Cancella dopo 10 sec</label>
                -->
            </form>
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


<!-- Scripts-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js"></script>

   <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="./chat.js"></script>


        
         </body>

       
   
</html>