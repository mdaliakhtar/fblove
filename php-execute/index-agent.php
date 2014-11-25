<?php
/*~ index-agent.php
.---------------------------------------------------------------------------.
|  Software: Funbook Love Calculator                                        |
|   Version: 1.0.0                                                          |
|      Site: https://fvlove.com/                                            |
| ------------------------------------------------------------------------- |
|     Admin: Ali Akhtar Mohammed                                            |
|   Authors: Ali Akhtar Mohammed                                            |
|   Founder: Ali Akhtar Mohammed (http://in.linkedin.com/in/mdaliakhtar)    |
| Copyright (c) 2014, Ali Akhtar Mohammed. All Rights Reserved.             |
| ------------------------------------------------------------------------- |
|   License:                                                                |
|																			|
|	Funbook Love Calculator is free software: you can redistribute it		|
|	and/or modify it under the terms of the GNU General Public License as	|
|	published by the Free Software Foundation, either version 3 of the		|
|	License, or (at your option) any later version.							|			|
|																			|
|	Funbook Love Calculator is distributed in the hope that it will be		|
|	useful, but WITHOUT ANY WARRANTY; without even the implied warranty of	|		|
|	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the			|
|	GNU General Public License for more details.							|
|																			|
|	You should have received a copy of the GNU General Public License		|
|	along with Funbook Love Calculator.										|
|	If not, see <http://www.gnu.org/licenses/>.  							|
|                                          									|
'---------------------------------------------------------------------------'
*/

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

require("PHPMailer_5.2.4/class.phpmailer.php");
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$body="<body><div id=\"bodyreadMessagePartBodyControl712f\" class=\"ExternalClass MsgBodyContainer\" data-link=\"class{:~tag.cssClasses(PlainText, IsContentFiltered)}\"><title>Funbook</title><table width=\"98%\" border=\"0\" cellspacing=\"0\" cellpadding=\"40\"><tbody><tr><td bgcolor=\"#f7f7f7\" width=\"100%\" style=\"font-family:'lucida grande',tahoma,verdana,arial,sans-serif;\"><table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"620\"><tbody><tr><td style=\"background:#3b5998;color:#FFFFFF;font-weight:bold;font-family:'lucida grande',tahoma,verdana,arial,sans-serif;vertical-align:middle;padding:4px 8px;font-size:16px;letter-spacing:-0.03em;text-align:left;\">funbook Love Calculator</td><td style=\"background:#3b5998;color:#FFFFFF;font-weight:bold;font-family:'lucida grande',tahoma,verdana,arial,sans-serif;vertical-align:middle;padding:4px 8px;font-size:11px;text-align:right;\"></td></tr><tr><td colspan=\"2\" style=\"background-color:#FFFFFF;border-bottom:1px solid #3b5998;border-left:1px solid #CCCCCC;border-right:1px solid #CCCCCC;padding:15px;font-family:'lucida grande',tahoma,verdana,arial,sans-serif;\" valign=\"top\"><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\"><tbody><tr><td width=\"100%\" style=\"font-size:12px;\" valign=\"top\" align=\"left\"><div style=\"font-size:12px;font-family:'lucida grande',tahoma,verdana,arial,sans-serif;\">Hi ".$YourName.",</div><div style=\"\">Your friend has been fooled by you. The information entered by him is:</div><div style=\"\"><div style=\"border-bottom:1px solid #cccccc;line-height:5px;\">&nbsp;</div><br><div style=\"padding:2px 2px 3px 8px;border-left:5px solid green;\"><div><h3 style=\"font-size:14px;\"><p style=\"color:#3b5998;text-decoration:none;\"><b>Name: ".$FoolName."<br>Crush Name(s): (1) ".$stCrush.", (2) ".$ndCrush.", and (3) ".$rdCrush."</b></p></h3></div><div style=\"color:#666666;font-size:10px;\">Enjoy Pranking</div>Dear ".$YourName.", Your link is below.<br><a href=\"".$UserURL."\" style=\"color:#3b5998;text-decoration:none;\" target=\"_blank\" class=\"\"><b>".$UserURL."</b></a><br>Send it to your friends and secrets will be sent to you at ".$YourEmail."</div><br><div style=\"border-bottom:1px solid #cccccc;line-height:5px;\">&nbsp;</div></div><div style=\"\"></div></td></tr></tbody></table><br><table cellspacing=\"0\" cellpadding=\"0\" style=\"border-collapse:collapse;width:100%;\"><tbody><tr><td style=\"font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding:10px;background-color:#fff9d7;border-left:1px solid #e2c822;border-right:1px solid #e2c822;border-top:1px solid #e2c822;border-bottom:1px solid #e2c822;\"><div style=\"font-weight:bold;font-size:11px;\">If something's not working on Funbook, or you think there's a bug, use the link below to report bugs.</div><a href=\"https://www.linkedin.com/in/mdaliakhtar/\" style=\"color:#3b5998;text-decoration:none;font-size:11px;\" target=\"_blank\">https://www.linkedin.com/in/mdaliakhtar/<br></a><a href=\"https://twitter.com/mdaliakhtar/\" style=\"color:#3b5998;text-decoration:none;font-size:11px;\" target=\"_blank\">https://twitter.com/mdaliakhtar/<br></a><a href=\"https://www.facebook.com/ALImdaliakhtar/\" style=\"color:#3b5998;text-decoration:none;font-size:11px;\" target=\"_blank\">https://www.facebook.com/ALImdaliakhtar/</a><div style=\"font-weight:bold;font-size:11px;\">Giving more detail (ex: adding a screenshot and description) helps us find the problem. We may contact you for more details as we investigate. Reporting issues when they happen helps make Funbook better, and we appreciate the time it takes to give us this information.</div></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></div></body>";
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