<?php
require_once "config.php";
$error = array();
$res = array();
 
if(isset($_POST["newusername"]) && isset($_POST["newpassword"]))
{	
	$username = $_POST["newusername"];

	$password = $_POST["newpassword"];
	
	$stmt=$db->prepare("SELECT `IDUsers`, `username`, `password` FROM `users` WHERE `username` = :uname"); 
		
	$stmt->execute(array(':uname' => $_POST['newusername']));
	$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
	if (count($row) > 0) {
		if (!password_verify($_POST['newpassword'], $row[0]['password'])) {
			$error[] = "Password is not valid";
			$resp['msg'] = $error;
			$resp['status'] = false;
			echo json_encode($resp);
			exit;
		}
		session_start();
		$_SESSION['user_id'] = $row[0]['IDUsers'];
		$resp['redirect'] = "collection.html";
		$resp['status'] = true;
		echo json_encode($resp);
		exit;
	} else {
		$error[] = "User does not match";
		$resp['msg'] = $error;
		$resp['status'] = false;
		echo json_encode($resp);
		exit;
	}
}
?>