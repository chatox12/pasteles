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
		$con = mysqli_connect(SERVER, USER,PASS,DB);
		if (!$con)
		{
		 	die('Could not connect: ' . mysql_error());
		}
		$result = mysqli_query($con,$sql);
		mysqli_close($con);
		return $result;
	}
}
?>