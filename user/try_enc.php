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
                
        <!-- CSS- 

// INIT
var myString   = "blablabla Card game bla";
var myPassword = "myPassword";

// PROCESS
var encrypted = CryptoJS.AES.encrypt(myString, myPassword);
var decrypted = CryptoJS.AES.decrypt(encrypted, myPassword);
document.getElementById("demo0").innerHTML = myString;
document.getElementById("demo1").innerHTML = encrypted;
document.getElementById("demo2").innerHTML = decrypted;
document.getElementById("demo3").innerHTML = decrypted.toString(CryptoJS.enc.Utf8);
-->
   
      
    </head>


<body>
  <strong><label>Original String:</label></strong>
  <span id="demo0"></span>

  <br>
  <br>
  
  <strong><label>Encrypted:</label></strong>
  <span id="demo1"></span>

  <br>
  <br>
  
  <strong><label>Decrypted:</label></strong>
  <span id="demo2"></span>

  <br> 
  <br>

  <strong><label>String after Decryption:</label></strong>
  <span id="demo3"></span>

  
  <br />
  <br />





    <section class="encrypt-decrypt aes-ctr">
          <h2 class="encrypt-decrypt-heading">AES-CTR</h2>
          <section class="encrypt-decrypt-controls">
            <div class="message-control">
            <form>
              <input  type="text" id="message" name="message" class="col s12 l6 offset-l3 " autocomplete="off" autofocus placeholder="Scrivi un messaggio...">
            </form>

             <!--- <input id="aes-ctr-message" name="message" size="25" value="The tiger prowls at dawn" type="text"> -->

            </div>
            <div class="ciphertext">Ciphertext:<span class="ciphertext-value">57,172,251,119,181...[24 bytes total]</span></div>
            <div class="decrypted">Decrypted:<span class="decrypted-value">The tiger prowls at dawn</span></div>
            <input class="encrypt-button" value="Encrypt" type="button">
            <input class="decrypt-button" value="Decrypt" type="button">
          </section>
    </section>

         <div class="container">
            <form>
                <input  type="text" id="message" class="col s12 l6 offset-l3 " autocomplete="off" autofocus placeholder="Scrivi un messaggio...">
                
                <input class="btn-large waves-effect waves-light red lighten-1" type="submit" value="Invia">
            
            </form>
        </div>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js"></script>
   
    <script type="text/javascript">

       
          


var JsonFormatter = {
  stringify: function(cipherParams) {
    // create json object with ciphertext
    var jsonObj = { ct: cipherParams.ciphertext.toString(CryptoJS.enc.Base64) };
​
    // optionally add iv or salt
    if (cipherParams.iv) {
      jsonObj.iv = cipherParams.iv.toString();
    }
​
    if (cipherParams.salt) {
      jsonObj.s = cipherParams.salt.toString();
    }
​
    // stringify json object
    return JSON.stringify(jsonObj);
  },
  parse: function(jsonStr) {
    // parse json string
    var jsonObj = JSON.parse(jsonStr);
​
    // extract ciphertext from json object, and create cipher params object
    var cipherParams = CryptoJS.lib.CipherParams.create({
      ciphertext: CryptoJS.enc.Base64.parse(jsonObj.ct)
    });
​
    // optionally extract iv or salt
​
    if (jsonObj.iv) {
      cipherParams.iv = CryptoJS.enc.Hex.parse(jsonObj.iv);
    }
​
    if (jsonObj.s) {
      cipherParams.salt = CryptoJS.enc.Hex.parse(jsonObj.s);
    }
​
    return cipherParams;
  }
};
​
    var myString   = "tizio caio";
    var myPassword = "ciao";
// PROCESS
var encrypted = CryptoJS.AES.encrypt(myString, myPassword);
//var envelope = CryptoJS.enc.Utf8.stringify(encrypted);
//var denvelope = CryptoJS.enc.Utf8.parse(envelope);
var decrypted = CryptoJS.AES.decrypt(encrypted, myPassword);
document.getElementById("demo0").innerHTML = myString;
document.getElementById("demo1").innerHTML = encrypted;
document.getElementById("demo2").innerHTML = decrypted;
document.getElementById("demo3").innerHTML = decrypted.toString(CryptoJS.enc.Utf8);



    </script>
</body>


       
   
</html>