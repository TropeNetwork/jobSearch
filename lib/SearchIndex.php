<?php

/**
 * @package jobSearch
 * very simple search Server based on MySQL
 **/

require_once(OPENHR_LIB."/Database.php");

class SearchIndex {

    function SearchIndex(){
        $this->collection = "jobs";
        $this->language   = "de_DE";
        $this->db         = &Database::getConnection( DB_SEARCH );
    }

    function insert($key,$data){
        return "INSERT $key";
    }
    
    function delete($key){
        return "DELETE $key";
    }

}

?>