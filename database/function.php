<?php

$username = $_POST['username'];
$password = $_POST['password'];

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


//inserimento dati utente, password cifrata con brcrypt
function inserisci_utente($username, $password, $email){
	$conn=dbConnect();
	
	$password = cipher_content($password);

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

/*

bcrypt

bcrypt is currently the defacto secure standard for password hashing. It’s derived from the Blowfish block cipher which, to generate the hash, uses look up tables which are initiated in memory. This means a certain amount of memory space needs to be used before a hash can be generated. This can be done on CPU, but when using the power of GPU it will become a lot more cumbersome due to memory restrictions. Bcrypt has been around for 14 years, based on a cipher which has been around for over 20 years. It’s been well vetted and tested and hence considered the standard for password hashing.

There is actually one weakness, FPGA processing units. When bcrypt was originally developed it’s main threat was custom ASICs specifically built to attack hash functions. These days those ASICs would be GPUs (password bruteforcing can actually still run on GPU, but not in full parallelism) which are cheap to purchase and are ideal for multithreaded processes such as password bruteforcing.

FPGAs (Field Programmable Gate Arrays) are similar to GPUs but the memory management is very different. On these chips bruteforcing bcrypt can be done more efficiently than on GPUs, but if you have a long enough password it will still be unfeasable.
scrypt

For password hashing, the current fashion is to move the problem away to another level; instead of doing a lot of hash function invocations, concentrate on an operation which is hard for anything else than a PC, e.g. random memory accesses. That’s what scrypt is about. Scrypt is another hashing algorithm which has the same properties as bcrypt, except that when you increase rounds, it exponentially increases calculation time and memory space required to generate the hash. Scrypt was created as response to evolving attacks on bcrypt and is completely unfeasable when using FPGAs or GPUs due to memory constraints. Scrypt requires the storage of a series of intermediate state data “snapshots”, which are used in further derivation operations. These snapshots, stored in memory, grow exponentially compared when rounds increase. So adding a round, will make it exponentially harder to brute force the password. Scrypt is still relatively new compared to bcrypt and has only been around for a couple of years, which makes it less vetted than bcrypt.


usa 
*/
function cipher_content($content){
	$enc_content = password_hash($content, PASSWORD_DEFAULT);

	return $enc_content;
}

//controlla se un utente è presente nel database per username e se la password è valida
/*
function login($email,$password){
    global $connection;
    $query = "SELECT * FROM table_name WHERE email = '$email'";

    $result_set=mysqli_query($connection,$query);


        if (mysqli_num_rows($result_set) === 1) {
            $row = mysqli_fetch_assoc($result_set);
            if (password_verify($password, $row['password'])) {
                $_SESSION['user_id'] = $row['id'];
                redirect_to("welcome.php");
            }else{
                echo " <script>alert('Password is incorrect');</script>  ";
            }
        }else{
            echo " <script>alert('No email found: {$email}');</script>  ";
        }


}

$email = mysqli_real_escape_string (  $connection,  $_POST['email']);
$password= mysqli_real_escape_string (  $connection,  $_POST['password']);
login($email,$password);
*/

function check_users($username, $password) {
	$conn=dbConnect();
	
	$sql="SELECT * FROM ch_users WHERE user_username = '$username'";
	$result = $conn->query($sql);
	if(mysqli_num_rows($result)==1){
		$row = mysqli_fetch_assoc($result);
		if (password_verify($password, $row['user_password'])) {
                $_SESSION['id'] = $row['user_id'];
                echo '<div class="alert alert-success">
				<strong>Credenziali corrette, accesso eseguito</strong>
			  </div>';
			  header( "refresh:3;url=../user/user_page.php" );
		} else {
			echo '<div class="alert alert-success">
				<strong>Password errata</strong>
			  </div>';
			header( "refresh:3;url=../index.php" );
			}
		
		} else {
			
			echo '<div class="alert alert-success">
					<strong>Nome utente non valido</strong>
		 		</div>';
			header( "refresh:3;url=../index.php" );
		}
		
	
	mysqli_close($conn); 
	                                                            
}



?>