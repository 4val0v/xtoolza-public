<?php
  /**
   * File: include/classMysqlDB.php
   * @author Andrey Knyazev satanuga666@gmail.com
   * 
   */

  /**
   * Mysql wrapper class.
   *
   */
  class classMysqlDB {
    
    /**
     * DB Host for connection
     *
     * @var String
     */

    private $dbHost;
    
    /**
     * DB User for connection
     *
     * @var String
     */
    private $dbUser;
    
    /**
     * DB Password for connection
     *
     * @var unknown_type
     */
    private $dbPass;
    
    /**
     * DB Name for connection
     *
     * @var unknown_type
     */
    private $dbName;
    
    /**
     * DB connection
     *
     * @var object
     */
    public $dbConnection;
    
    /**
     * Debug mode true/false
     *
     * @var Boolean
     */
    public $debug = false;
    
    /**
     * Filename for save debug
     *
     * @var String
     */
    private $logFile = "sql.log";    
    
    /**
     * Filename for saving errors
     *
     * @var String
     */
    private $errorFile = "error.log";
    
    /**
     * Result of execution
     *
     * @var object
     */
    private $dbResult;
    
    function classMysqlDB($debug = false) {
      $this->debug = $debug;  
    }
    
    /**
     * Connecting to MySQL server
     */
    public function connect($host, $user, $pass, $name, $logName = "sql.log", $errorName = "error.log") {
      $this->dbHost = $host;
      $this->dbUser = $user;
      $this->dbPass = $pass;
      $this->dbName = $name;
      $this->logFile = $logName;
      $this->errorFile = $errorName;
      
      $db = @mysql_connect($this->dbHost, $this->dbUser, $this->dbPass) or $this->error(mysql_error());
      
      if ($db) {
        if (@mysql_select_db($this->dbName, $db) or $this->error(mysql_error())) {
          $this->dbConnection = $db;
          return $this->dbConnection;
        }
      }
      return false;
    }
    
    /**
     * Execution SQL query
     */
    public function execute($SQL) {
      $this->dbResult = @mysql_query($SQL, $this->dbConnection) or $this->error(mysql_error());
      
      if ($this->debug) {
        $this->writeToLog($SQL, $this->logFile);
      }
      
      return $this->dbResult;
    }

    /**
     * Special insert
     */
    public function insert($table, $data) {
      if (count($data) > 0 ) {
        $fields = array();
        $values = array();
        
        foreach ($data as $key=>$value) {
          $fields[] = $key;
          $values[] = ((!get_magic_quotes_gpc()) ? "'" . mysql_real_escape_string($value, $this->dbConnection) . "'" : "'" . $value . "'");
        }

        $this->execute("INSERT INTO `" . $table . "` (`" . implode("`,`", $fields) . "`) VALUES (" . implode(",", $values) . ")");
        return (mysql_insert_id($this->dbConnection));        
      }
      $this->error("Missing data");
      return false;
    }
    
    /**
     * Special update
     */
    public function update($table, $data, $where = "") {
      if (count($data) > 0 ) {
        $sets = array();
        
        foreach ($data as $key=>$value)
        {
          $sets[] = ((!get_magic_quotes_gpc()) ? "`" . $key . "`='" . mysql_real_escape_string($value, $this->dbConnection) . "'" : $key . "='" . $value . "'");
          }
        
        if ($where != "") $where = "WHERE " . $where;
        
        return $this->Execute("UPDATE `" . $table . "` SET " . implode(", ", $sets) . " " . $where);
      }
      $this->error("Missing data");
      return false;
    }
    
    public function escapestr($string) {
      return (!get_magic_quotes_gpc()) ? mysql_real_escape_string($string, $this->dbConnection) : $string;
    }
    private function error($msg) {
      $this->writeToLog($msg, $this->errorFile);
    }
    /**
     * Function for saving messages in file
     */
    private function writeToLog($msg, $file)
    {
        $handle = fopen($file, "a");
        fwrite($handle, date("Y-m-d H:i:s") . " " . $msg . "\n");
        fclose($handle);
    }
    
  }


?>