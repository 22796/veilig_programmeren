<?php

echo "<h1>Sanitised, validated variables: </h1>";
if(isset($_REQUEST["sanitise_this"]))
{
	$the_raw_input = substr($_REQUEST["sanitise_this"],0,56); 
	// max 56 chars
}else
{
	die("no input?");
}
$the_sanitised_input="";
$validates=false;
$validation_error="";

/* $the_raw_input is dirty */
/* Start code by student */

// sanitization
$the_sanitised_input=  filter_var ( $the_raw_input, FILTER_SANITIZE_STRING);

$stripped=strip_tags($the_sanitised_input);
$entities=htmlentities($the_sanitised_input);
if($stripped!=$the_raw_input || $entities!=$the_raw_input)
{
	$validation_error="'".htmlentities($the_raw_input)."' bevat html tags en of entities. Dat is niet toegestaan.";
}else{
	$validates=true;
}


/* End of code by student */
/* $the_sanitised_input is clean */

// print a nice rapport
echo "Sanitised value: <strong>'" . htmlentities($the_sanitised_input)."'</strong><br>";
if($validates)
{
	echo "Validated: <font color='green'>&#10003;</font><br>"; // checkmark
}else
{	
	echo "Validated: &#10060;"; // cross
	if($validation_error!="")
		echo ": ".$validation_error;
}


?>
