<?php
error_reporting (0); // Do not show anything

$db = mysqli_connect("127.0.0.1", "root", "i2RwHRI3D0ufvGsb", "chat_users");
if($db->connect_error){
    die("Connection failed: ". $db->connect_error);       
}

$result = array();
$message= isset($_POST['message']) ? $_POST['message'] : null;
$sender = isset($_POST['sender']) ? $_POST['sender'] : null;



/*
$enc_message= openssl_encrypt($message, "AES-256-CBC", "ciao")
*/

if(!empty($message) && !empty($sender) ){
    $sql = "INSERT INTO chat (message, sender) VALUES ('".$message."','".$sender."')";
    $result['send_status'] = $db->query($sql);
}
//print messages   QUALCOSA COME SENDER == RECEIVER. DEVO DISTINGUERE CHI DEI DUE È L'UTENTE ATTIVO E CHI LA CONTROPARTE
$start = isset($_GET['start']) ? intval($_GET['start']) : 0;
/*db->query("SELECT *
FROM chat WHERE (sender= '". $sender."' AND receiver='". $receiver."') OR (sender = '".$receiver."' AND receiver = '".$sender."')");
*/

$items = $db->query("SELECT * FROM chat WHERE id > ".$start."");

/*
$items = $db->query("SELECT sender.user_username, receiver.user_username, message.chat
FROM chat, ch_users
LEFT JOIN chat AS sender ON chat.sender = ch_users.user_username
LEFT JOIN chat AS receiver ON chat.receiver = ch_users.user_username
ORDER BY chat.id
"); */

while($row = $items->fetch_assoc()) {
	$result['items'][] = $row;
}


$db->close();

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

echo json_encode($result);
?>