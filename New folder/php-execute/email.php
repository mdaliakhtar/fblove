<?php
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

?>