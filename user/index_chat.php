<?php
/*
$receiver = $_POST['receiver'];
setcookie($receiver);
*/
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
   <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script>
            var iv=0, sender = 0, enc_message = 0, start = 0, url = 'conn_chat.php';
            
            function getCookie(cname) {
                var name = cname + "=";
                var decodedCookie = decodeURIComponent(document.cookie);
                var ca = decodedCookie.split(';');
                for(var i = 0; i <ca.length; i++) {
                    var c = ca[i];
                    while (c.charAt(0) == ' ') {
                        c = c.substring(1);
                        }
                    if (c.indexOf(name) == 0) {
                        return c.substring(name.length, c.length);
                    }
                }
                    return "";
            }
/*
            function getMessageEncoding() {
                const messageBox = document.querySelector("#message");
                let message = messageBox.value;
                let enc = new TextEncoder();
                return enc.encode(message);
            }               


            function encryptMessage(key) {
                let encoded = getMessageEncoding();
                // iv will be needed for decryption
                iv = window.crypto.getRandomValues(new Uint8Array(16));
                return window.crypto.subtle.encrypt(
                {
                    name: "AES-CBC",
                    iv
                },
                key,
                encoded
                ) ;
            }
           */

            $(document).ready(function(){
                sender=getCookie('username');                
                load();
             //  iv = window.crypto.getRandomValues(new Uint8Array(16));
                $('form').submit(function(e){
                    $.post(url, {
                 /*      message: crypto.subtle.encrypt({
                    name: "AES-CBC",
                    iv
                },"ciao",$('#message').val()),*/

                        //message: CryptoJS.AES.encrypt($('#message').val(), "ciao"),
                       message:$('#message').val(),
                        sender: sender
                    });
                    $('#message').val('');
                    return false;
                })
            });

            function load(){
                $.get(url + '?start=' + start, function(result){
                    if (result.items) {
                        result.items.forEach(item => {
                            start = item.id;                           
                            $('#messages').append(renderMessage(item));
                        });
                        $('#messages').animate({scrollTop: $('#messages')[0].scrollHeight});
                    };
                    load();
                });
            }

            function renderMessage(item){
                let time= new Date(item.created);
                time= `${time.getHours()}:${time.getMinutes()}`;
              //  if(item.sender == sender){
                    return `<div class="msg"><p>${item.sender}</p>${item.message}<span>${time}</span></div>`;
              //  }else{
                  //  return `<div class="msg_receiver"><p>${item.receiver}</p>${item.message}<span>${time}</span></div>`;
                }
           // }
/*
             function renderMessage(item){
                let time= new Date(item.created);
                time= `${time.getHours()}:${time.getMinutes()}`;
                return `<div class="msg"><p>${item.sender}</p>${item.message}<span>${time}</span></div>`;
            }*/
    </script>


        
         </body>

       
   
</html>