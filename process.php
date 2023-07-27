<?php

require_once "config.php";

if(isset($_POST["newusername"]) && isset($_POST["newemail"]) && isset($_POST["newpassword"]))
{	
    echo "test";
	$username = $_POST["newusername"];

	$email = $_POST["newemail"];

	$password = $_POST["newpassword"];
	
	$stmt=$db->prepare("INSERT INTO users(username,
											 email, 
											 password)
										VALUES
										    (:uname,
											 :uemail,
											 :upassword)"); 
	
		
	$stmt->bindParam(":uname",$username, PDO::PARAM_STR);
	$stmt->bindParam(":uemail",$email, PDO::PARAM_STR);
	$stmt->bindParam(":upassword",$password, PDO::PARAM_STR);
		 		
	if($stmt->execute())
	{
		echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button> 
					Register Successfully  
			 </div>';		
	}	
	else
	{
		echo  '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button> 
					Fail to Register  
			   </div>';		
	}
}

?>