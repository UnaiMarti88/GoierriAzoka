<?php 
$LOGS_DIR = $env["LOGS_DIR"];

$error_message = "This is an error message 2!"; 
  
// path of the log file where errors need to be logged 
$log_file = $LOGS_DIR . "/azoka-log.log"; 
  
// setting error logging to be active 
ini_set("log_errors", TRUE);  
  
// setting the logging file in php.ini 
ini_set('error_log', $log_file); 
  
// logging the error 
// error_log($error_message); 

function writeLog($functionName, $data = []){

    $string = "ID: " . session_id() . ", ";

    $string .= $functionName . ": {";
    $i = 0;
    foreach($data as $index => $value){
        if($i != 0){
            $string .= ", ";    
        }
        $string .= $index.": ".$value;
        $i++;
    }

    $string .= "}";

    error_log($string); 

}