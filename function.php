<?php

//funzione per la connessione al database
function dbConnect() {
	$db = mysqli_connect("127.0.0.1", "root", "", "secure_chat");

	if (!$db) {
	    echo "Error: Unable to connect to MySQL." . PHP_EOL;
	    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
	    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
	    exit;
}
	return $db;
}


//inserimento dati utente cifrati
function inserisci_utente($username, $password, $email){
	$conn=dbConnect();
	$username = cipher_content($username);
	$password = cipher_content($password);
	$email = cipher_content($email);

	$sql="INSERT INTO ch_users (user_username, user_password, user_email) VALUES ('". $username ."', '". $password ."', '". $email ."')";
	if(!$conn->query($sql)){  //stampo un errore
		 echo '<div class="alert alert-danger"><strong>Attenzione errore nella query:</strong> ' . $sql . "\n" . mysql_error() .'</div>';
	}
	else{
		echo '<div class="alert alert-success">
				<strong>Utente inserito con successo</strong>
			  </div>';
		header( "refresh:3;url=database_index.php" );
	}
	
	mysqli_close($conn); 
	                                                            
}


//stampo la lista degli utenti
function lista_utenti(){
	$risultato=[];
	$conn=dbConnect();
	$sql="SELECT * FROM ch_users";
	$risposta = $conn->query($sql) or die("Errore nella query: " . $sql . "\n" . mysql_error());
	
	while ($riga = mysqli_fetch_row($risposta)) {  //restituisce una riga della tabella sc_users altrimenti FALSE
	    $risultato[] = $riga;
	  	}
		mysqli_close($conn);
	return $risultato;  //ritorno l'array risultato
}


//rimuovo un utente
function rimuovi_utente($user_id){
	$conn=dbConnect();
	$sql="DELETE FROM ch_users WHERE user_id = $user_id";
	$risposta=$conn->query($sql)  or die("Errore nella query: " . $sql . "\n" . mysql_error());
    mysqli_close($conn);
    header("Location: database_index.php");

}

//cifra il contenuto con md5
function cipher_content($content){
	$salt='ha1itu7cn6l';
	$enc_content = md5($salt.$content);

	return $enc_content;
}

//controlla se un utente è presente nel database per username
function check_users($username) {
	$conn=dbConnect();
	$username = cipher_pwd($username);   //DA COMPLETARE
 

	//****** da completare *********
	$sql="SELECT * FROM ch_users WHERE user_username = '$username'";
	$result = $conn->query($sql);
	if(mysqli_num_rows($result)>0){
		
		echo '<div class="alert alert-success">
				<strong>Utente presente nel database</strong>
			  </div>';
		header( "refresh:1;url=database_index.php" );
		} else {
			
			echo '<div class="alert alert-success">
				<strong>Utente non è presente nel database</strong>
			  </div>';
		header( "refresh:1;url=database_index.php" );
		}
		
	
	mysqli_close($conn); 
	                                                            
}



?>