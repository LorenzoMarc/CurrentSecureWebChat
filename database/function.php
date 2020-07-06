<?php
error_reporting (0); // Do not show anything
$username = $_POST['username'];
$password = $_POST['password'];


//funzione per la connessione al database
function dbConnect() {
	$db = mysqli_connect("127.0.0.1", "root", "i2RwHRI3D0ufvGsb", "chat_users");

	if (!$db) {
	    echo "Error: Unable to connect to MySQL." . PHP_EOL;
	    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
	    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
	    exit;
}
	return $db;
}


//inserimento dati utente, password cifrata con brcrypt
function inserisci_utente($username, $password, $email){
		$conn=dbConnect();

	//SQL INJECTION PROTECTION
	$username = str_replace("'"|"`", "", $username);
	$password = str_replace("'"|"`", "", $password);
	$inject_secure = preg_match('/\'|\*|\bSELECT\b|\bOR\b|\bWHERE\b|\bselect\b|\bor\b|\bwhere\b/', $username);
	if ($inject_secure == 1) {
		echo '<h3><div class="alert alert-danger"><strong>inserimento non valido</strong> </h3></div>';
		 header( "refresh:30;url=../index.php" );

	}else{
		$password = cipher_content($password);
		$sql="INSERT INTO ch_users (user_username, user_password, user_email) VALUES ('". $username ."', '". $password ."', '". $email ."')";
		if(!$conn->query($sql)){  //stampo un errore
			 echo '<h3><div class="alert alert-danger"><strong>Username già esistente</strong> </h3></div>';
			 header( "refresh:3;url=../index.php" );
		}
		else{
			echo '<div class="alert alert-success">
					<h3><strong>Utente registrato con successo</strong></h3>
				  </div>';
			header( "refresh:3;url=../index.php#accedi" );
		}
	}
	
	mysqli_close($conn); 
	                                                            
}


//stampo la lista degli utenti
function lista_utenti($run_user){
	$risultato=[];
	$conn=dbConnect();
	$sql="SELECT * FROM ch_users WHERE user_username <>'". $run_user."'";
	$risposta = $conn->query($sql) or die("Errore nella query: " . $sql . "\n" . mysql_error());
	
	while ($riga = mysqli_fetch_row($risposta)) {  //restituisce una riga della tabella sc_users altrimenti FALSE
	    $risultato[] = $riga;
	  	}
		mysqli_close($conn);
	return $risultato;  //ritorno l'array risultato
}


function cipher_content($content){
	$enc_content = password_hash($content, PASSWORD_DEFAULT);

	return $enc_content;
}


function check_users($username, $password) {
	$conn=dbConnect();

	//SQL INJECTION PROTECTION
	$username = str_replace("'"|"`", "", $username);
	$password = str_replace("'"|"`", "", $password);
	$inject_secure = preg_match('/\'|\*|\bSELECT\b|\bOR\b|\bWHERE\b|\bselect\b|\bor\b|\bwhere\b/', $username);

	if ($inject_secure == 1) {
		echo '<h3><div class="alert alert-danger"><strong>inserimento non valido</strong> </h3></div>';
		 header( "refresh:3;url=../index.php" );

	}else{
		//verifica correttezza username
		$sql="SELECT * FROM ch_users WHERE user_username = '$username'";
		$result = $conn->query($sql);
		if(mysqli_num_rows($result)==1){
			$row = mysqli_fetch_assoc($result);
			//verifica correttezza pswd e crea ID sessione
			if (password_verify($password, $row['user_password'])) {
	                $_SESSION['ID'] = md5($row['user_id']. $_SERVER ['REMOTE_ADDR']);
	                setcookie('username', $username);
	                echo '<div class="alert alert-success">
					<h3>Credenziali corrette, accesso eseguito</h3>
				  </div>';
				  header( "refresh:3;url=../user/user_page.php" );
			} else {

				//Pswd errata
				echo '<div class="alert alert-success"><h3>
					<strong>Password errata</strong></h3>
				  </div>';
				header( "refresh:3;url=../index.php" );
				}			
			
		} else {
			//username errato	
			echo '<div class="alert alert-success">
					<h3><strong>Nome utente non valido</strong></h3>
			 	</div>';
			header( "refresh:3;url=../index.php" );
		}
	}
		
	
	mysqli_close($conn); 
	                                                            
}



?>