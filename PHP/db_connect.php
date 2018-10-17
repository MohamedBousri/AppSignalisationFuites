<?php

class DB_CONNECT {
 
    
    function __construct() {
        // connecting to database
        $this->connect();
    }
 
    
    //function __destruct() {
        // closing db connection
    //    $this->close();
   // }
 
    /**
     * Function to connect with database
     */
    function connect() {
        // import database connection variables
        require_once __DIR__ . '/db_config.php';
 
        // Connecting to mysqli database
        $con = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD) or die(mysqli_error());
 
        // Selecing database
        $db = mysqli_select_db($con,DB_DATABASE) or die(mysqli_error()) or die(mysqli_error());
 
        
        return $con;
    }
 
    
    //function close($cls) {
        // closing db connection
       // mysqli_close($cls);
   // }
 
}
?>