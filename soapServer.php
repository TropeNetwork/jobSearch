<?php

include_once("prepend.inc");
require_once('SOAP/Server.php');
require_once(OPENHR_LIB."/../../jobSearch/lib/SearchIndex.php");

$ss = new SOAP_Server();
$sc = new SOAP_job();

$ss->addObjectMap($sc, 'urn:SOAP_job');

$ss->service($HTTP_RAW_POST_DATA);

// Sample SOAP Class
class SOAP_job{
    function activate($job_id, $data){
        
    }
    
    function test_soap($p_one, $p_two)
    {
        return "You sent p_one='$p_one' & p_two='$p_two'\n";
    }
}
?>