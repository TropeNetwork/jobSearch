<?php

/**
 * very simple search Server based on MySQL fulltext search
 * This class implemets adding and removing documents to/from
 * the search engine
 * 
 * @package    OpenHR
 * @subpackage ProjectPage
 * @version    $Revision: 1.7 $
 * @author     Carsten Bleek <carsten@bleek.de>
 */


/**
 * definitions from Job.class. This should propably move
 * into a shared file. 
 */
define("JOB_STATUS_OFFLINE"            ,1);
define("JOB_STATUS_OFFLINE_REQUESTED"  ,2);
define("JOB_STATUS_ONLINE"             ,3);
define("JOB_STATUS_ONLINE_REQUESTED"   ,4);

require_once(OPENHR_LIB."/Database.php");

class SearchIndex {

    function SearchIndex(){
        $this->collection = "jobs";
        $this->language   = "de_DE";
        $this->db         = &Database::getConnection( DB_SEARCH );
    }

    function insert($key,$data){

        $query="REPLACE 
                   INTO jobs 
                        (job_id, job_title, job_location, employer, incoming_date)
                 VALUES (?,?,?,?,now())";     
        $sth=$this->db->prepare($query);

        $this->db->execute($sth,array($key,$data->job_title->value,$data->job_location->value,""));

        return array("key"=>$key,
                     "action"=> JOB_STATUS_ONLINE_REQUESTED,
                     "return"=> array("errno"  => 0,
                                      "errstr" => "OK"));
    }
    
    function delete($key){

        $query="DELETE FROM jobs where job_id=?";
        $sth=$this->db->prepare($query);
        $this->db->execute($sth,array($key));

        return array("key"=>$key,
                     "action"=> JOB_STATUS_OFFLINE_REQUESTED,
                     "return"=> array("errno"  => 0,
                                      "errstr" => "OK"));
    }

}

?>