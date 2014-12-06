<?php
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

echo $EmailNo;

// Open file for resetting
if($EmailNo == 100){
	$EmailCounterReset = fopen("EmailCounter.txt", "w");
	fwrite($EmailCounterReset, "0"); 
	fclose($EmailCounterReset); // Close the text file
}


?>