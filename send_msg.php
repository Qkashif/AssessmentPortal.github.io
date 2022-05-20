<?php 

include 'connection.php';

session_start();

$class_id    = $_POST['class_id'];
$Sender_id   = $_SESSION['user_id'];
$Sender_name = $_SESSION['user_name'];
$message     = $_POST['message'];

if (!empty($message)) {

	$send_msg_query = "INSERT INTO messages (msg_class, msg_senderId, msg_senderName, msg_text) VALUES (:class_id, :senderId, :senderName, :message)";

	$send_msg_runquery = $Conn->prepare($send_msg_query);

	$send_msg_runquery->bindParam(':class_id', $class_id, PDO::PARAM_INT);
	$send_msg_runquery->bindParam(':senderId', $Sender_id, PDO::PARAM_INT);
	$send_msg_runquery->bindParam(':senderName', $Sender_name, PDO::PARAM_STR);
	$send_msg_runquery->bindParam('message', $message, PDO::PARAM_STR);

	$send_msg_execute = $send_msg_runquery->execute();

	if ($send_msg_execute) {
		
		echo "Send Message Successfully.";

	}
	else{
		echo "Error Occurred.";
	}


}




 ?>