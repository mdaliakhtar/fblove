<?php
/*
$EmailId1 = "1-10qmax@qmaxsys.com";
$EmailId1pass = "pass1";

$EmailId2 = "11-20qmax@qmaxsys.com";
$EmailId2pass = "pass2";

$EmailId3 = "21-30qmax@qmaxsys.com";
$EmailId3pass = "pass3";

$EmailId4 = "31-40qmax@qmaxsys.com";
$EmailId4pass = "pass4";

$EmailId5 = "41-50qmax@qmaxsys.com";
$EmailId5pass = "pass5";

//Open file for first time reading
$EmailCounterRead = fopen("EmailCounter.txt", "r");
$EmailNoInFile = fgets($EmailCounterRead); 
fclose($EmailCounterRead); // Close the text file

$IncreaseEmailNo = $EmailNoInFile + 1;

// Open file for writing
$EmailCounterWrite = fopen("EmailCounter.txt", "w");
fwrite($EmailCounterWrite, $IncreaseEmailNo); 
fclose($EmailCounterWrite); // Close the text file

//Open file for second time reading
$EmailCounterSecond = fopen("EmailCounter.txt", "r");
$EmailNo = fgets($EmailCounterSecond); 
fclose($EmailCounterSecond); // Close the text file

echo $EmailNo."<br>";

if($EmailNo > 0 && $EmailNo <= 10){
	echo $EmailToUser = $EmailId1;
	echo $EmailToUserPass = $EmailId1pass;
}elseif($EmailNo > 10 && $EmailNo <= 20){
	echo $EmailToUser = $EmailId2;
	echo $EmailToUserPass = $EmailId2pass;
}elseif($EmailNo > 20 && $EmailNo <= 30){
	echo $EmailToUser = $EmailId3;
	echo $EmailToUserPass = $EmailId3pass;
}elseif($EmailNo > 30 && $EmailNo <= 40){
	echo $EmailToUser = $EmailId4;
	echo $EmailToUserPass = $EmailId4pass;
}elseif($EmailNo > 40 && $EmailNo <= 50){
	echo $EmailToUser = $EmailId5;
	echo $EmailToUserPass = $EmailId5pass;
}else{
	echo "no email - else";	
}

//$MyFrom = "admin@qmaxonline.com";
//$MyUsername = "admin@qmaxonline.com";

// Open file for resetting
if($EmailNo == 50){
	$EmailCounterReset = fopen("EmailCounter.txt", "w");
	fwrite($EmailCounterReset, "0"); 
	fclose($EmailCounterReset); // Close the text file
}
*/


include 'connection.php';
/*
$url = $_POST['URL'];
$FoolName = $_POST['FoolName'];
$stCrush = $_POST['stCrush'];
$ndCrush = $_POST['ndCrush'];
$rdCrush = $_POST['rdCrush'];
*/
$url = "1";
$FoolName = "Sumant";
$stCrush = "Ruh";
$ndCrush = "Baby";
$rdCrush = "Neha";

$sql = "SELECT * FROM register WHERE id='$url'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
		//echo $row["id"];
		$YourName = $row["YourName"];
		$YourEmail = $row["YourEmail"];
		$UserURL = $row["URL"];
    }
}else{
	echo "not fetched data from db";
}
//for fooled page begins
$_SESSION['FoolName'] = $FoolName;
$_SESSION['FoolByYourName'] = $YourName;
$_SESSION['FoolByYourEmail'] = $YourEmail;
//for fooled page ends

//send email begins	
$SubFooled = "You have fooled ".$FoolName;

$EmailToUser = "fblove4u19@gmail.com";
$EmailToUserPass = "flcpass123";

require("PHPMailer_5.2.4/class.phpmailer.php");
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$body="<body><div id=\"bodyreadMessagePartBodyControl712f\" class=\"ExternalClass MsgBodyContainer\" data-link=\"class{:~tag.cssClasses(PlainText, IsContentFiltered)}\"><title>Funbook</title><table width=\"98%\" border=\"0\" cellspacing=\"0\" cellpadding=\"40\"><tbody><tr><td bgcolor=\"#f7f7f7\" width=\"100%\" style=\"font-family:'lucida grande',tahoma,verdana,arial,sans-serif;\"><table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"620\"><tbody><tr><td style=\"background:#3b5998;color:#FFFFFF;font-weight:bold;font-family:'lucida grande',tahoma,verdana,arial,sans-serif;vertical-align:middle;padding:4px 8px;font-size:16px;letter-spacing:-0.03em;text-align:left;\">funbook Love Calculator</td><td style=\"background:#3b5998;color:#FFFFFF;font-weight:bold;font-family:'lucida grande',tahoma,verdana,arial,sans-serif;vertical-align:middle;padding:4px 8px;font-size:11px;text-align:right;\"></td></tr><tr><td colspan=\"2\" style=\"background-color:#FFFFFF;border-bottom:1px solid #3b5998;border-left:1px solid #CCCCCC;border-right:1px solid #CCCCCC;padding:15px;font-family:'lucida grande',tahoma,verdana,arial,sans-serif;\" valign=\"top\"><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\"><tbody><tr><td width=\"100%\" style=\"font-size:12px;\" valign=\"top\" align=\"left\"><div style=\"font-size:12px;font-family:'lucida grande',tahoma,verdana,arial,sans-serif;\">Hi ".$YourName.",</div><div style=\"\">Your friend has been fooled by you. The information entered by him is:</div><div style=\"\"><div style=\"border-bottom:1px solid #cccccc;line-height:5px;\">&nbsp;</div><br><div style=\"padding:2px 2px 3px 8px;border-left:5px solid green;\"><div><h3 style=\"font-size:14px;\"><p style=\"color:#3b5998;text-decoration:none;\"><b>Name: ".$FoolName."<br>Crush Name(s): (1) ".$stCrush.", (2) ".$ndCrush.", and (3) ".$rdCrush."</b></p></h3></div><div style=\"color:#666666;font-size:10px;\">Enjoy Pranking</div>Dear ".$YourName.", Your link is below.<br><a href=\"".$UserURL."\" style=\"color:#3b5998;text-decoration:none;\" target=\"_blank\" class=\"\"><b>".$UserURL."</b></a><br>Send it to your friends and secrets will be sent to you at ".$YourEmail."</div><br><div style=\"border-bottom:1px solid #cccccc;line-height:5px;\">&nbsp;</div></div><div style=\"\"></div></td></tr></tbody></table><br><table cellspacing=\"0\" cellpadding=\"0\" style=\"border-collapse:collapse;width:100%;\"><tbody><tr><td style=\"font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding:10px;background-color:#fff9d7;border-left:1px solid #e2c822;border-right:1px solid #e2c822;border-top:1px solid #e2c822;border-bottom:1px solid #e2c822;\"><div style=\"font-weight:bold;font-size:11px;\">If something's not working on Funbook, or you think there's a bug, use the link below to report bugs.</div><a href=\"https://www.linkedin.com/in/mdaliakhtar/\" style=\"color:#3b5998;text-decoration:none;font-size:11px;\" target=\"_blank\">https://www.linkedin.com/in/mdaliakhtar/<br></a><a href=\"https://twitter.com/mdaliakhtar/\" style=\"color:#3b5998;text-decoration:none;font-size:11px;\" target=\"_blank\">https://twitter.com/mdaliakhtar/<br></a><a href=\"https://www.facebook.com/ALImdaliakhtar/\" style=\"color:#3b5998;text-decoration:none;font-size:11px;\" target=\"_blank\">https://www.facebook.com/ALImdaliakhtar/</a><div style=\"font-weight:bold;font-size:11px;\">Giving more detail (ex: adding a screenshot and description) helps us find the problem. We may contact you for more details as we investigate. Reporting issues when they happen helps make Funbook better, and we appreciate the time it takes to give us this information.</div></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></div></body>";
$mail->From = $EmailToUser;
$mail->Username = $EmailToUser;
$mail->Password = $EmailToUserPass;
$mail->AddAddress($YourEmail);
$mail->Subject = $SubFooled;
$mail->MsgHTML($body);
$mail->Header='Content-type: text/html; charset=iso-8859-1';
if(!$mail->Send())
	echo "Error sending: ".$mail->ErrorInfo;
else
	echo 'email is sent!';
	//header('Location: ../fooled.php');
	
//send email ends
?>