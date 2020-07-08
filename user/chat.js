 /* Sostituisce l'utilizzo di 
            *  una chiave generata con un Key Management System (in questo caso quello di Google), 
            *  sfortunatamente richiedono carta di credito anche per la prova gratuita...
            *  
            */
            var myPassword ="dcf93a0b883972ec0e19989ac5a2ce310e1d37717e8d9571bb7623731866e61ef75a2e27898b057f9891c2e27a639c3f29b60814581cd3b2ca3986d2683705577d45c2e7e52dc81c7a171876e5cea74b1448bfdfaf18828efd2519f14e45e3826634af1949e5b535cc829a483b8a76223e5d490a257f05bdff16f2fb22c583ab";       

           
            var sender = 0,  start = 0, url = 'conn_chat.php';
            
            
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
                
                $('form').on("submit", function(event){
                  event.preventDefault();                 
                   /* if ($('#autodelete').is(":checked")){
                          // it is checked
                          var autodelete = 'delete';                          
                        }else{
                            var autodelete ='save';
                        }         */ 
                  var message = $('#message').val();
                  var encrypted = CryptoJS.AES.encrypt(message, myPassword).toString();         
                    
                  
                    $.post(url, {
                        message: encrypted,
                        sender: sender,
                      //  autodelete: autodelete
                    });
                   $('#message').val('');
                   return false;
                });
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
                
                
                decrypted = CryptoJS.AES.decrypt(item.message, myPassword).toString(CryptoJS.enc.Utf8);
                item.message = decrypted;           
                return `<div class="msg"><p>${item.sender}</p>${item.message}<span>${time}</span></div>`;
                }