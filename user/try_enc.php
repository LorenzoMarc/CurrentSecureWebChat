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
   
      
    </head>

<script type="text/javascript">

(() => {

  /*
  Store the calculated ciphertext and counter here, so we can decrypt the message later.
  */
  let ciphertext;
  let counter;

  /*
  Fetch the contents of the "message" textbox, and encode it
  in a form we can use for the encrypt operation.
  */
  function getMessageEncoding() {
    const messageBox = document.querySelector("#aes-ctr-message");
    let message = messageBox.value;
    let enc = new TextEncoder();
    return enc.encode(message);
  }

  /*
  Get the encoded message, encrypt it and display a representation
  of the ciphertext in the "Ciphertext" element.
  */
  async function encryptMessage(key) {
    let encoded = getMessageEncoding();
    // The counter block value must never be reused with a given key.
    counter = window.crypto.getRandomValues(new Uint8Array(16)),
    ciphertext = await window.crypto.subtle.encrypt(
      {
        name: "AES-CTR",
        counter,
        length: 64
      },
      key,
      encoded
    );

    let buffer = new Uint8Array(ciphertext, 0, 5);
    const ciphertextValue = document.querySelector(".aes-ctr .ciphertext-value");
    ciphertextValue.classList.add('fade-in');
    ciphertextValue.addEventListener('animationend', () => {
      ciphertextValue.classList.remove('fade-in');
    });
    ciphertextValue.textContent = `${buffer}...[${ciphertext.byteLength} bytes total]`;
  }

  /*
  Fetch the ciphertext and decrypt it.
  Write the decrypted message into the "Decrypted" box.
  */
  async function decryptMessage(key) {
    let decrypted = await window.crypto.subtle.decrypt(
      {
        name: "AES-CTR",
        counter,
        length: 64
      },
      key,
      ciphertext
    );

    let dec = new TextDecoder();
    const decryptedValue = document.querySelector(".aes-ctr .decrypted-value");
    decryptedValue.classList.add('fade-in');
    decryptedValue.addEventListener('animationend', () => {
      decryptedValue.classList.remove('fade-in');
    });
    decryptedValue.textContent = dec.decode(decrypted);
  }

  /*
  Generate an encryption key, then set up event listeners
  on the "Encrypt" and "Decrypt" buttons.
  */
  window.crypto.subtle.generateKey(
    {
        name: "AES-CTR",
        length: 256
    },
    true,
    ["encrypt", "decrypt"]
  ).then((key) => {
    const encryptButton = document.querySelector(".aes-ctr .encrypt-button");
    encryptButton.addEventListener("click", () => {
      encryptMessage(key);
    });

    const decryptButton = document.querySelector(".aes-ctr .decrypt-button");
    decryptButton.addEventListener("click", () => {
      decryptMessage(key);
    });
  });

})();
</script>
<body>
    <section class="encrypt-decrypt aes-ctr">
          <h2 class="encrypt-decrypt-heading">AES-CTR</h2>
          <section class="encrypt-decrypt-controls">
            <div class="message-control">
              <label for="aes-ctr-message">Enter a message to encrypt:</label>
              <input  type="text" id="aes-ctr-message" name="message" class="col s12 l6 offset-l3 " autocomplete="off" autofocus placeholder="Scrivi un messaggio...">
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
</body>


       
   
</html>