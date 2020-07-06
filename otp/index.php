<?php
session_start();
error_reporting (0); // Do not show anything
$utente =$_POST['username'];
$utente = htmlspecialchars($utente);
$pswd_utente = $_POST['password'];	
$pswd_utente = htmlspecialchars($pswd_utente);
$success = "";
$error_message = "";
$conn = mysqli_connect("localhost","root","i2RwHRI3D0ufvGsb","chat_users");
if(!empty($utente)) {
	$result = mysqli_query($conn,"SELECT user_email FROM ch_users WHERE user_username='" . $utente . "'");
	$row = $result->fetch_array(MYSQLI_ASSOC);
	$count  = mysqli_num_rows($result);
	if($count>0) {

		// generate OTP
		$otp = rand(100000,999999);
		
		// Send OTP
		require_once("mail_function.php");
		$mail_status = sendOTP($row['user_email'],$otp);
		
		if($mail_status == 1) {
		
			//$is_expired_init = 0;
			$sql = "INSERT INTO otp_expiry (otp) VALUES ('" . $otp . "')";

			$query = $conn->query($sql);

			$current_id = mysqli_insert_id($conn);
			if(!empty($current_id)) {
				$success=1;
			}
		}
	} else {
		$error_message = "Email not exists!";
	}
}


if(!empty($_POST["submit_otp"])) {
	$result = mysqli_query($conn,"SELECT * FROM otp_expiry WHERE otp='" . $_POST["otp"] . "' AND is_expired!=1 AND NOW() <= DATE_ADD(create_at, INTERVAL 3 HOUR)");
	$count  = mysqli_num_rows($result);
	if(!empty($count)) {
		$result = mysqli_query($conn,"UPDATE otp_expiry SET is_expired = 1 WHERE otp = '" . $_POST["otp"] . "'");
		$success = 2;	
	} else {
		$success =3;
		$error_message = "Invalid OTP!";
	}	
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>

<title>User Login</title>

<!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="icon" type="image/png" href="../LogoUniud.png" sizes="32x32">
 <!-- GOOGLE FONTS  -->
  <link href="https://fonts.googleapis.com/css?family=Raleway|Satisfy" rel="stylesheet">

<!-- FONT AWESOME  -->
  <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">

</head>


</head>
<body>
	<!-- FIXED NAVBAR -->
  <div class="navbar-fixed">
    <nav>
      <div class="nav-wrapper white">
        <a href="#" class="brand-logo">SecureWebChat</a>
         <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <li><a href="#servizio">Servizio</a></li>
          <li><a href="#registrazione">Registrati</a></li>
          <li><a href="#accedi">Accedi</a></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
          <li><a href="#servizio">Servizio</a></li>
          <li><a href="#registrazione">Registrati</a></li>
          <li><a href="#accedi">Accedi</a></li>
      </ul>
      </div>
    </nav>
  </div>


  <!-- INTRO -->
  <div id="index-banner">
    <div class="section-intro no-pad-bot">
      <div class="container">
        <br><br>

        <?php 

			if(!empty($success == 1)) { 

		?>
	<form name="frmUser" method="post" action="">
		<div class="col s6 center">
		
				<h3 class="header center red-text text-lighten-1">Inserisci OTP</h3>
			        <div class="row center">
			          <h5 class="header-subtitle col s12 light">Controlla la tua mail</h5>
			        </div>
			        <br><br>

					
				<div class="input-field col s12 l6 offset-l3">
					<input type="text" name="otp" placeholder="One Time Password" pattern="(?=.*\d).{6,6}" class="login-input" required>
				</div>

				<div class="tableheader">
					<?php 
					
					echo "<input type=\"hidden\" name=\"username\" value=  ".$utente."  />
				<input type=\"hidden\" name=\"password\" value= ".$pswd_utente."  />";?>
					<input type="submit" name="submit_otp" value="Invia" class="col l6 offset-l3 btn btn-invita waves-effect waves-light red lighten-1">
				</div>
					</div>
	</form>


		<?php
			} else if(!empty($success == 3)){

				?>
				<form name="frmUser" method="post" action="">
					<div class="col s6 center">
		
					<h3 class="header center red-text text-lighten-1">Inserisci OTP corretto</h3>
			        <div class="row center">
			          <h5 class="header-subtitle col s12 light">Controlla la tua mail</h5>
			        </div>
			        <br><br>

					
				<div class="input-field col s12 l6 offset-l3">
					<input type="text" name="otp" placeholder="One Time Password" pattern="(?=.*\d).{6,6}" class="login-input" required>
				</div>

				<div class="tableheader">
					<?php echo "<input type=\"hidden\" name=\"username\" value=  ".$utente."  />
				<input type=\"hidden\" name=\"password\" value= ".$pswd_utente."  />";?>
					<input type="submit" name="submit_otp" value="Invia" class="col l6 offset-l3 btn btn-invita waves-effect waves-light red lighten-1">
				</div>
					</div>
				</form>
		<?php 
		} else if(!empty($success == 2)){

        ?>
        <div class="col s6 center">
		
			<h3 class="header center red-text text-lighten-1">Autenticazione riuscita!</h3>
			 <form name="formLoginOtp" method="post" action="../user/login.php">
				<?php echo "<input type=\"hidden\" name=\"username\" value=  ".$utente."  />
				<input type=\"hidden\" name=\"password\" value= ".$pswd_utente."  />";?>
				<input type="submit" name="submit_otp" value="Accedi" class="col l6 offset-l3 btn btn-invita waves-effect waves-light red lighten-1">
			</form>
			<?php
				}
			?>        
      </div>
    </div>
  </div>
	


</body>
</html>