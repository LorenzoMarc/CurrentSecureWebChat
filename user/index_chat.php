<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Chat</title>

          <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script>
            var sender = 0, start = 0, cookie_arr =[], url = './conn_chat.php';

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


            $(document).ready(function(){
                sender=getCookie('username');
                
                load();

                $('form').submit(function(e){
                    $.post(url, {
                        message: $('#message').val(),
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
                return `<div class="msg"><p>${item.sender}</p>${item.message}<span>${time}</span></div>`;
            }
        </script>
                 
          <!-- CSS
          <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
          <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>

           

          <link rel="icon" type="image/png" href="../img/LogoUniud.png" sizes="32x32">

       - GOOGLE FONTS  
          <link href="https://fonts.googleapis.com/css?family=Raleway|Satisfy" rel="stylesheet">

        FONT AWESOME 
          <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
             -->
          <link href="style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
      
    </head>



    <body>
        <div id="messages"></div>
        <form>
            <input type="text" id="message" autocomplete="off" autofocus placeholder="Scrivi un messaggio...">
            <input type="submit" value="send">
        </form>
         </body>

       
   
</html>