<?php
/**
 * @package    OpenHR
 * @subpackage jobSearch
 * @version    $Revision: 1.5 $
 * @author     Carsten Bleek <carsten@bleek.de>
 */

include_once("prepend.inc");
require_once('SOAP/Server.php');
require_once(OPENHR_LIB."/../../jobSearch/lib/SearchIndex.php");

$ss = new SOAP_Server();
$sc = new SOAP_job();

$ss->addObjectMap($sc, 'urn:SOAP_job');

$ss->service($HTTP_RAW_POST_DATA);

// Sample SOAP Class. WILL BE COMPLETELY CHANGED
// Because adding and removing
// jobs from search engines may take a certain time, the SOAP
// interface will use SMTP as the transport protocoll.

class SOAP_job{
    /**
     * add job into index
     */
    function activate($job_id, $data){
        $index=new SearchServer;
        $index->insert($job_id, $data);
    }

    /**
     * remove job from index 
     */
    function deactivate($job_id){
#        $index=new SearchServer;
#        $index->delete($job_id);         
    }
}
?>