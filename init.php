<?php
class Fun 
{    
    private $_host = 'localhost';
    private $_username = 'root';
    private $_password = '';
    private $_database = 'stock';
    
    protected $connection;
  
    public function __construct()
    {
            $this->connection = new mysqli($this->_host, $this->_username, $this->_password, $this->_database);
            
            if (!$this->connection) {
                 die('Cannot connect to database server');
            }            
    }
    public function execute($query) 
    {
        return $this->connection->query($query);
    }
   
    public function delete($id, $table) 
    { 
        $query = "DELETE FROM $table WHERE id = $id";
        
        $result = $this->connection->query($query);
    
        if ($result == false) {
            echo 'Error: cannot delete id ' . $id . ' from table ' . $table;
            return false;
        } else {
            return true;
        }
    }

    public function isEmailValid($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {    
            return true;  
        }
        return false;
    }
    
    public function isUserExist($username)
    {   
        $result = $this->connection->query("SELECT * from users where username = '$username'");
        if($result == false) return false;
        return $result->num_rows > 0;
    }

    public function isEmailExist($email)
    {        
        return $this->connection->query("SELECT * from users where email='".$email."'")->num_rows > 0;
    }
    public function isLoginCorrect($email,$password)
    {        
        return $this->connection->query("SELECT * from users where username='$email' && `password`='$password'")->num_rows > 0;
    }

    public function selectAll($table) 
    {        
        $result = $this->connection->query("SELECT * FROM $table");
        if ($result == false) return false;        
        $result = $result->fetch_all(MYSQLI_ASSOC);
        if(count($result) > 0) return $result;
        return [];    
    }
    public function selectWhere($table, $what = "*", $where = "")
    {        
        $result = $this->connection->query("SELECT $what FROM $table $where");
        if ($result == false) return false;        
        $result = $result->fetch_all(MYSQLI_ASSOC);
        if(count($result) > 0) return $result;
        return [];    
    }
    public function insert_id(){
        return $this->connection->insert_id;
    }

}

/* other global functions*/

function getTitle(){
    global $pageTitle;
    echo $pageTitle;
}

// getIfset function takes the same value of the 1st parm if exists 
// else it takes the 2nd parm
function getifset(&$var, $else = ""){
    return isset($var)?$var:$else;    
}

$db = new Fun();
/*--------------DIRS------------------ */
define("_BASE_","/stock/");
define("PROTOCOL","http://");
define("DOM","localhost");
define("URI",PROTOCOL.DOM._BASE_);
define("UPLOADS","uploads");

/*-------------ERRORS-------------*/
ini_set('display_errors', 'On');
error_reporting(E_ALL);

/*-------------URI-------------*/
$uri = explode("?",$_SERVER["REQUEST_URI"])[0];
$route = trim(strtolower(substr($uri,strlen(_BASE_))),'/');
$segments = explode("/",$route);
$seg = $segments;
$segment_head = array_shift($seg);
$segment_tail = array_pop($seg);
$segment_body = implode('/',$seg);
unset($seg);


if($route == "logout"){ 
    session_unset(); 
    session_destroy(); 
    header('Location: '.URI.'login');
}

define("ROLES",array("superadmin","admin","editor","consultant","agent"));
define("ROLE",getifset($_SESSION["role"]));

