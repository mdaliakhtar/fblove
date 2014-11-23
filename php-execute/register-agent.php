<?php
session_start();

include 'connection.php';

$YourName = $_POST['YourName'];
$YourEmail = $_POST['YourEmail'];
//$url = "mdaliakhtar.com";

//user registration check begins
$sql = "SELECT * FROM register WHERE YourEmail='$YourEmail'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0){
    // if user registered
    while($row = mysqli_fetch_assoc($result)){
		$_SESSION['Returningid'] = $row["id"];
		$_SESSION['ReturningYourName'] = $row["YourName"];
		$_SESSION['ReturningYourEmail'] = $row["YourEmail"];
		$_SESSION['ReturningURL'] = $row["URL"];
		header('Location: ../returning-user.php');
    }
}else{
	//if user not registered
	$sql = "INSERT INTO register (YourName, YourEmail, URL)
	VALUES ('$YourName', '$YourEmail', 'noURL')";
	if ($conn->query($sql) === TRUE) {
		//echo "New record created successfully";
		$sql = "SELECT * FROM register WHERE YourEmail='$YourEmail'";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) > 0){
			// getting back new user's details
			while($row = mysqli_fetch_assoc($result)){
				$_SESSION['id'] = $row["id"];
				$_SESSION['YourName'] = $row["YourName"];
				$_SESSION['YourEmail'] = $row["YourEmail"];
				//send email to new user begins
				//-----------------------------------------------------------------------
				$URLbyId = $row["id"];
				$UserYourName = $row["YourName"];
				$UserYourEmail = $row["YourEmail"];
				$UserURL = "https://www.fblove.com/index.php?u=".$URLbyId;
				$SubUser = $UserYourName . ", Your Facebook Love Calculator link";
				
				require("PHPMailer_5.2.4/class.phpmailer.php");
				$mail = new PHPMailer();
				$mail->IsSMTP();
				$mail->SMTPAuth = true;
				$body="<body><div id=\"bodyreadMessagePartBodyControl712f\" class=\"ExternalClass MsgBodyContainer\" data-link=\"class{:~tag.cssClasses(PlainText, IsContentFiltered)}\"><title>Facebook</title><table width=\"98%\" border=\"0\" cellspacing=\"0\" cellpadding=\"40\"><tbody><tr><td bgcolor=\"#f7f7f7\" width=\"100%\" style=\"font-family:'lucida grande',tahoma,verdana,arial,sans-serif;\"><table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"620\"><tbody><tr><td style=\"background:#3b5998;color:#FFFFFF;font-weight:bold;font-family:'lucida grande',tahoma,verdana,arial,sans-serif;vertical-align:middle;padding:4px 8px;font-size:16px;letter-spacing:-0.03em;text-align:left;\">facebook Love Calculator</td><td style=\"background:#3b5998;color:#FFFFFF;font-weight:bold;font-family:'lucida grande',tahoma,verdana,arial,sans-serif;vertical-align:middle;padding:4px 8px;font-size:11px;text-align:right;\"></td></tr><tr><td colspan=\"2\" style=\"background-color:#FFFFFF;border-bottom:1px solid #3b5998;border-left:1px solid #CCCCCC;border-right:1px solid #CCCCCC;padding:15px;font-family:'lucida grande',tahoma,verdana,arial,sans-serif;\" valign=\"top\"><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\"><tbody><tr><td width=\"100%\" style=\"font-size:12px;\" valign=\"top\" align=\"left\"><div style=\"font-size:12px;font-family:'lucida grande',tahoma,verdana,arial,sans-serif;\">Hi ".$UserYourName.",</div><div style=\"\">Your facebook Love calculator link is below:</div><div style=\"\"><div style=\"border-bottom:1px solid #cccccc;line-height:5px;\">&nbsp;</div><br><div style=\"padding:2px 2px 3px 8px;border-left:5px solid green;\"><div><h3 style=\"font-size:14px;\"><a href=\"".$UserURL."\" style=\"color:#3b5998;text-decoration:none;\" target=\"_blank\" class=\"\"><b>".$UserURL."</b></a></h3></div><div style=\"color:#666666;font-size:10px;\">Tomorrow, November 5 at 2:20am</div>Copy and paste this link to your friend's blog, scrapbook, forum or email to fool him/her.</div><br><div style=\"border-bottom:1px solid #cccccc;line-height:5px;\">&nbsp;</div></div><div style=\"\"></div></td></tr></tbody></table><br><table cellspacing=\"0\" cellpadding=\"0\" style=\"border-collapse:collapse;width:100%;\"><tbody><tr><td style=\"font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding:10px;background-color:#fff9d7;border-left:1px solid #e2c822;border-right:1px solid #e2c822;border-top:1px solid #e2c822;border-bottom:1px solid #e2c822;\"><div style=\"font-weight:bold;font-size:11px;\">Find out more information and get status updates here:</div><a href=\"http://developers.facebook.com/status/issues/816418688452225/\" style=\"color:#3b5998;text-decoration:none;font-size:11px;\" target=\"_blank\">http://developers.facebook.com/status/issues/816418688452225/</a></td></tr></tbody></table></td></tr><tr><td colspan=\"2\" style=\"color:#999999;padding:10px;font-size:12px;font-family:'lucida grande',tahoma,verdana,arial,sans-serif;\"><br>This message was intended for mdaliakhtar@outlook.com. You are receiving this email because you have chosen to receive developer updates from Facebook. Want to control which developer updates you receive? Go to:<br><a href=\"http://developers.facebook.com/settings\" target=\"_blank\">http://developers.facebook.com/settings</a><br>Facebook, Inc., Attention: Department 415, PO Box 10005, Palo Alto, CA 94303<br></td></tr></tbody></table></td></tr></tbody></table></div></body>";
				$mail->AddAddress($UserYourEmail);
				$mail->Subject = $SubUser;
				$mail->MsgHTML($body);
				$mail->Header='Content-type: text/html; charset=iso-8859-1';
				if(!$mail->Send())
					echo "Error sending: ".$mail->ErrorInfo;
				else
					//echo 'email is sent!';
					header('Location: ../register-done.php');
					
				//--------------------------------------------------------------------------------				
				//send email to new user ends
			}
		}else{
			echo "error while getting url";
		}		
		
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

include 'connection-close.php';
?>