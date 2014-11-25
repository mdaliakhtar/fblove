<?php
$url=$_GET['u'];
if($_GET['u'] == '') {
	header("location: register.php");
	exit();
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Funbook Love Calculator</title>
        <link href="images/favicon.ico" type="image/x-icon" rel="shortcut icon">
		<meta name="generator" content="Md Ali Akhtar" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
		<script type="text/javascript">
            function validrecalculator(){
                if(document.calculator.FoolName.value == ""){
                        alert("Please enter Your Name");
                        document.calculator.FoolName.focus();
                        return false;
                }
                if(document.calculator.stCrush.value == ""){
                        alert ( "Please enter Your Crush" );
                        document.calculator.stCrush.focus();
                        return false;
                }		
            }	
        </script>        
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
                      <a href="/" class="navbar-brand logo">funbook Love Calculator</a>
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
                                <div class="panel-heading"><h4>Calculate love and compatibility</h4></div>
                               	<div class="panel-body">
                                	<form id="calculator" name="calculator" method="post" action="php-execute/index-agent.php" onSubmit="return validrecalculator();">
                                    	<input name="URL" type="hidden" value="<?php echo $url; ?>">
                                        <div class="input-group">
                                          <div class="input-group-btn">
                                          <button class="btn btn-default">U</button>
                                          </div>
                                          <input name="FoolName" type="text" class="form-control" placeholder="Your Name">
                                        </div> 
                                        <div class="input-group">
                                          <div class="input-group-btn">
                                          <button class="btn btn-default">1</button>
                                          </div>
                                          <input name="stCrush" type="text" class="form-control" placeholder="1st crush">
                                        </div>  
                                        <div class="input-group">
                                          <div class="input-group-btn">
                                          <button class="btn btn-default">2</button>
                                          </div>
                                          <input name="ndCrush" type="text" class="form-control" placeholder="2nd crush">
                                        </div>  
                                        <div class="input-group">
                                          <div class="input-group-btn">
                                          <button class="btn btn-default">3</button>
                                          </div>
                                          <input name="rdCrush" type="text" class="form-control" placeholder="3rd crush">
                                        </div>
                                        <button class="btn btn-primary pull-right" type="submit">Calculate</button>
                                    </form>								
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
                                If something's not working on Funbook, or you think there's a bug, 
                                use the link below to report bugs.<br>
                                <a href="http://in.linkedin.com/in/mdaliakhtar" target="_blank">
                                	<b>https://www.linkedin.com/in/mdaliakhtar/</b>
                                </a><br>
                                <a href="https://twitter.com/mdaliakhtar" target="_blank">
                                	<b>https://twitter.com/mdaliakhtar/</b>
                                </a><br>
                                <a href="https://www.facebook.com/AliAkhtarMd" target="_blank">
                                	<b>https://www.facebook.com/ALImdaliakhtar/</b>
                                </a><br>
                                Giving more detail (ex: adding a screenshot and description) helps 
                                us find the problem. We may contact you for more details as we investigate. 
                                Reporting issues when they happen helps make Funbook better, and we 
                                appreciate the time it takes to give us this information.  
                          </div>
                        </div>
                      
                        <div class="row" id="footer">    
                      
                      <hr>
                      
                      <h4>
                        Copyright &copy; 2014 <a href="http://in.linkedin.com/in/mdaliakhtar">Ali Akhtar Mohammed</a><br>
                        Under <a href="http://www.gnu.org/copyleft/gpl.html">GNU General Public License v3.0</a>  
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