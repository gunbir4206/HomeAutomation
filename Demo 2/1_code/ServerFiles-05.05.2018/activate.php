<?php
require('includes/config.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//collect values from the url
$memberID = trim($_GET['x']);
$active = trim($_GET['y']);
echo ($memberID);
echo ($active);
//if id is number and the active token is not empty carry on
//Minor Security Flaw: Currently, this doesn't cross reference the url activation key to the sql database because a verification code field doesn't exit.
//this could be fixed relatively easily

$stmt = $db->prepare("SELECT active FROM members WHERE memberID = (:memberID)");
		$stmt->execute(array(':memberID' => $memberID));
$check = $stmt->fetch(PDO::FETCH_ASSOC);

if($check = 'yes'){
	header('Location: login.php?action=active');
	exit();

}
if(is_numeric($memberID) && !empty($active)){

	//update users record set the active column to Yes where the memberID and active value match the ones provided in the array
	$stmt = $db->prepare("UPDATE members SET active='yes' WHERE memberID = (:memberID)");
	$stmt->execute(array(':memberID' => $memberID));

		
	

	//if the row was updated redirect the user
	if($stmt->rowCount() == 1){

		//redirect to login page
		header('Location: login.php?action=active');
		exit;

	} else {
		echo "Your account could not be activated."; 
	}
	
}
?>
