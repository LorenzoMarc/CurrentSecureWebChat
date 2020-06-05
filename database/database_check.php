<?php 
include("../config.php");
include('function.php');

	$username = $_POST['username'];
	$password = $_POST['password'];

?>





	<!-- CONTENT start -->
	<!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->
	<section id="content">
	<div class="container">

		<h3>Verifica utente</h3>
		

	<?php
		//controllo campi completati
		if($username != "" && $password != ""){
		
			//richiamo la funzione inserisci_utente();
			check_users($username, $password);  //DA COMPLETARE
			
		}
		else{
		echo '<div class="alert alert-danger">
				<strong>Compila tutti i campi, grazie.</strong>
			  </div>';
			  header( "refresh:3;url=../index.php" );
		}
	?>



	</div> <!-- /.container -->
	</section>
	<!-- CONTENT end -->
	<!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->




</body>
</html>
