<?php

/**
 * @package jobSearch
 * very simple search Server based on MySQL
 **/

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
                        (job_id, job_title, location, employer, incoming_date)
                 VALUES (?,?,?,?,now())";     
        $sth=$this->db->prepare($query);
        $this->db->execute($sth,array($key,$data["job_title"],$data["location"],""));

        return array("key"=>$key,
                     "action"=> JOB_STATUS_ONLINE_REQUESTED,
                     "return"=> array("errno"  => 0,
                                      "errstr" => "OK"));
    }
    
    function delete($key){
        return array("key"=>$key,
                     "action"=> JOB_STATUS_OFFLINE_REQUESTED,
                     "return"=> array("errno"  => 0,
                                      "errstr" => "OK"));
    }

}

?>