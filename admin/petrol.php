<?php
function esc($var)
{
    $enc = htmlentities($var, ENT_QUOTES);
    //$enc = htmlspecialchars($var, ENT_QUOTES);
    return $enc;
}

class DB{
    //public $LIMIT_PER_PAGE = '5';
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'BTask';
    
    protected $connector;
    
    public function __construct(){

        if (!isset($this->connector)) {
            
            $this->connector = new mysqli($this->host, $this->username, $this->password, $this->database);
            
            if (!$this->connector) {
                echo 'Cannot connect to database server';
                exit;
            }            
        }    
        
        return $this->connector;
    }
}
?>