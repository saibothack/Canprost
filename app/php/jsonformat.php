<?php
function jsonformat($obj){
	$json = json_encode($obj);
	$json = str_replace('"', '\r\n  \"' , $json);
	$json = str_replace('[[', '[' , $json);
	$json = str_replace(']]', ']' , $json);
	$json = str_replace('\r\n  \":', '\":' , $json);
	$json = str_replace('\r\n  \",', '\",' , $json);
	$json = str_replace('\r\n  \"}', '\"}' , $json);
	$json = '"' .$json .'"';
	
	return $json;
}
?>