<?php
error_reporting(0);
$FoolName = $_POST['FoolName'];
if($_POST['FoolName'] == '') {
	header("location: register.php");
	die();
}
include 'php-execute/connection.php';
$url = $_POST['URL'];
$stCrush = $_POST['1stCrush'];
$ndCrush = $_POST['2ndCrush'];
$rdCrush = $_POST['3rdCrush'];

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

//send email begins	
echo $FoolName;
echo $stCrush;
echo $ndCrush;
echo $rdCrush;

echo $YourEmail;
echo $YourName;

$SubFooled = "You have fooled ".$FoolName;

require("php-execute/phpmailer/class.phpmailer.php");
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
	echo 'email is sent!';
//send email ends
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Facebook Love Calculator</title>
		<meta name="generator" content="Md Ali Akhtar" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
	</head>
	<body>
<div class="wrapper">
    <div class="box">
        <div class="row row-offcanvas row-offcanvas-left">
                               
            <!-- main right col -->
            <div class="column col-sm-10 col-xs-11" id="main">
                
                <!-- top nav -->
              	<div class="navbar navbar-blue navbar-static-top">  
                    <div class="navbar-header">
                      <a href="/" class="navbar-brand logo">facebook Love Calculator</a>
                  	</div>
                </div>
                <!-- /top nav -->
              
                <div class="padding">
                    <div class="full col-sm-9">
                      
                        <!-- content -->                      
                      	<div class="row">
                          
                         <!-- main col left --> 
                         <div class="col-sm-5">
                              <div class="panel panel-default">
                                <div class="panel-heading"><h4><?php echo $FoolName; ?>, You have been fooled!</h4></div>
                               	<div class="panel-body">
									<img src="images/fool.png" class="img-circle pull-right">
                                    The name of your crush has been mailed to:<br>
                                    <?php echo $YourName; ?><br>
                                    at<br> 
                                    <?php echo $YourEmail; ?>
                                    <hr>
                                    <div class="clearfix"></div>
                                    Now its your turn.<br> 
									Do you also want to know secrets of your friends and fool them?
                                    <p></p>
									<a href="register.php"><button class="btn btn-primary pull-right" type="button">Click here to begin</button></a>						
								</div>
                              </div>						 
						 
                              <div class="panel panel-default">
                                <div class="panel-heading"><h4>Sponsors</h4></div>
                               	<div class="panel-body">
                                	<div class="panel-thumbnail"><img src="images/bg_5.jpg" class="img-responsive"></div>                         
								</div>
                              </div>
                          </div>
                       </div><!--/row-->
                      
                        <div class="row">
                          <div class="col-sm-6">
                            <a href="https://twitter.com/mdaliakhtar" target="_blank">Twitter</a> <small class="text-muted">|</small> <a href="https://www.facebook.com/AliAkhtarMd" target="_blank">Facebook</a> <small class="text-muted">|</small> <a href="http://in.linkedin.com/in/mdaliakhtar" target="_blank">LinkedIn</a>
                          </div>
                        </div>
                      
                        <div class="row" id="footer">    
                      
                      <hr>
                      
                      <h4>
                      Copyright 2014. Ali Akhtar Mohammed
                      </h4>

                    </div><!-- /col-9 -->
                </div><!-- /padding -->
            </div>
            <!-- /main -->
          
        </div>
    </div>
</div>


<!--post modal-->
<div id="postModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			Update Status
      </div>
      <div class="modal-body">
          <form class="form center-block">
            <div class="form-group">
              <textarea class="form-control input-lg" autofocus placeholder="What do you want to share?"></textarea>
            </div>
          </form>
      </div>
      <div class="modal-footer">
          <div>
          <button class="btn btn-primary btn-sm" data-dismiss="modal" aria-hidden="true">Post</button>
            <ul class="pull-left list-inline"><li><a href=""><i class="glyphicon glyphicon-upload"></i></a></li><li><a href=""><i class="glyphicon glyphicon-camera"></i></a></li><li><a href=""><i class="glyphicon glyphicon-map-marker"></i></a></li></ul>
		  </div>	
      </div>
  </div>
  </div>
</div>
	<!-- script references -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/scripts.js"></script>
	</body>
</html>
<?php
include 'php-execute/connection-close.php';
?>