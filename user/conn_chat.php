<?php

$db = mysqli_connect("127.0.0.1", "root", "", "chat_users");
if($db->connect_error){
    die("Connection failed: ". $db->connect_error);       
}

$result = array();
$message= isset($_POST['message']) ? $_POST['message'] : null;
$sender = isset($_POST['sender']) ? $_POST['sender'] : null;

if(!empty($message) && !empty($sender)){
    $sql = "INSERT INTO chat (message, sender) VALUES ('".$message."','".$sender."')";
    $result['send_status'] = $db->query($sql);
}
//print messages
$start = isset($_GET['start']) ? intval($_GET['start']) : 0;
$items = $db->query("SELECT * FROM chat WHERE id > ".$start);
while($row = $items->fetch_assoc()) {
	$result['items'][] = $row;
}


$db->close();

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

echo json_encode($result);
?>