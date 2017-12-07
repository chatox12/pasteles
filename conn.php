<?php
define('SERVER', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'pasteleria');
class Connection{
    /**
     * @var Resource 
     */
    var $mysqli = null;
 
    function __construct(){
        try{
            if(!$this->mysqli){
                $this->mysqli = new MySQLi(SERVER, USER, PASS, DB);
                if(!$this->mysqli)
                    throw new Exception('Could not create connection using MySQLi', 'NO_CONNECTION');
            }
        }
        catch(Exception $ex){
            echo "ERROR: ".$e->getMessage();
        }
    }

    public function executeQuery($sql){
		//$this->$conn = mysqli_connect(SERVER, USER,PASS,DB);
		//if (!$conn)
		//{
		// 	die('Could not connect: ' . mysql_error());
		//}
		$result = mysqli_query($this->mysqli,$sql);
		mysqli_close($this->mysqli);
		return $result;
	}

}


?>