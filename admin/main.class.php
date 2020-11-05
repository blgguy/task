<?php
include('petrol.php');
/**
* 
*/
class Engine extends DB
{
	// Database Name = 'BTask'
 // Table blogpost \\ fields=	id	date	author	title	content	image	uniqKey	dateAdded
 // Table event \\ fields= id	date	time	title	description	image	author	venue	uniqKey	dateAdded	
 // Table comment \\ fields= id	postId	userName	content	dateAdded	
 // Table contact \\ fields= id	address	email	website	phone	twitterLink	fbLink	InsLink	dateAdded	
 // Table users \\ fields= id	username	email	pass	dateadded	
 // Table author \\ fields= id	name	description	image	dateAdded	
 // Table question \\ fields= id	name	email	subject	message	dateAdded	
 // Table donation \\ fields= id	name	date	amountDonated	causes	image	dateAdded	
 // Table volunteer \\ fields= 
 // Table gallery \\ fields= 
 // Table causes \\ fields= 
    
    public $LIMIT_PER_PAGE = '6';
    
    public function BInsert($table, $fields)
	{
		$SQL  = "";
        $SQL .= "INSERT INTO `".$table."`";
        $SQL .= " (`".implode("`,`", array_keys($fields))."`) VALUES ";
        $SQL .= "('".implode("','", array_values($fields))."')";
        //echo $SQL;
        $query = $this->connector->query($SQL);
        if ($query) {
            return true;
        }
    }
    
    public function AuthDub($table, $title)
    {
        // Check the Requested id is valid or not
        $sql = "SELECT * FROM `".$table."` WHERE title = '".$title."' LIMIT 1";
        $query = $this->connector->query($sql);
        $postData = array();
        while ($row = $query->fetch_array()){
            $postData[] = $row;
        }
            return $postData;
    }
    
    public function ViewByKey($table, $key)
	{
		$sql = "SELECT * FROM `".$table."` WHERE `uniqKey` ='$key' LIMIT 1";
        $query = $this->connector->query($sql);
        $postData = array();
        while ($row = $query->fetch_array()){
            $postData[] = $row;
        }
        return $postData;
    }

	public function BView($table)
	{
		$sql = "SELECT * FROM $table ORDER BY id ASC";
        $query = $this->connector->query($sql);
        $postData = array();
        while ($row = $query->fetch_array()){
            $postData[] = $row;
        }
        return $postData;
    }

	public function BEdit($date, $author, $title, $content, $uniqKey, $key)
	{        
		$SQL = "";
        $SQL .= "UPDATE `blogpost`";
        $SQL .= " SET `date` ='$date', `author` ='$author', `title` ='$title', `content` ='$content', `uniqKey` ='$uniqKey' WHERE `uniqkey` ='$key'";
        $query = $this->connector->query($SQL);
        if ($query) {
            return true;
        }
    }

    public function EditPic($tbl, $picc, $uniqKey, $key)
	{    
        $SQL = "";
        $SQL .= "UPDATE `".$tbl."`";
        $SQL .= " SET `image` ='$picc', `uniqKey` ='$uniqKey' WHERE `uniqkey` ='$key'";
        $query = $this->connector->query($SQL);
        if ($query) {
            return true;
        }
    }
    
    public function EvntEdit($date, $sttime, $endtime, $title, $content, $author, $venue, $uniqKey, $key)
	{      
		$SQL = "";
        $SQL .= "UPDATE `event`";
        $SQL .= " SET `date` ='$date', `sttime` ='$sttime', `endtime` ='$endtime', `title` ='$title', `description` ='$content', `author` ='$author', `venue` ='$venue', `uniqKey` ='$uniqKey' WHERE `uniqkey` ='$key'";
        $query = $this->connector->query($SQL);
        if ($query) {
            return true;
        }
	}

	public function dataDel($table, $uniqKey)
	{
        // Getting img ID to delete it from folder
        $sql    = "SELECT * FROM `".$table."`";
        $sql    .= " WHERE uniqKey ='".$uniqKey."'";
        $query = $this->connector->query($sql);
        while ($row = $query->fetch_array()) {
			$array[] = $row;
		}
        foreach ($array as $row) {
            $userImg = $row['image'];
        }

        // Unlink the images
        if($userImg!='') {
            unlink('./images/'.$userImg);	
            //header('location: ./src/product.php');
        }

        // Delete data from Table
        $sql    = "DELETE FROM `".$table."`";
        $sql    .= " WHERE uniqKey ='".$uniqKey."'";
        $query  = $this->connector->query($sql);
        //return true;
        if ($query) {
            return true;
        }
    }

    public function getAllRecords($tbl){	
        $sql = "SELECT * FROM ".$tbl;
        $query = $this->connector->query($sql);

        return $query->num_rows;
    }

    public function getPage($tbl)
    {
        // get page with pagination
        $limit = $this->LIMIT_PER_PAGE;

        // Look for a GET variable page if not found default is 1.
        if (isset($_GET["page"])) {
            $pn = $_GET["page"];
        } else {
            $pn = 1;
        }
        $startFrom = ($pn - 1) * $limit;

        $sql = "SELECT * FROM $tbl LIMIT ".$startFrom." , ".$limit;
        $query = $this->connector->query($sql);
        $postData = array();
        while ($row = $query->fetch_array()){
            $postData[] = $row;
        }
        return $postData;
    }

    public function admLogin($userId, $password){	
        $sql = "SELECT * FROM `users` WHERE `username`='$userId' AND `pass`='$password' || `email`='$userId' AND `pass`='$password'";
        $query = $this->connector->query($sql);

        if($query->num_rows > 0){
            $row = $query->fetch_array();
            return $row['id'];
        }else{
            return false;
        }
    }

    public function admLoginDetails($id)
    {
        // Check the Requested id is valid or not
        $sql = "SELECT * FROM `users` WHERE id = '".$id."' LIMIT 1";
        $query = $this->connector->query($sql);
        $Data = array();
        while ($row = $query->fetch_array()){
            $Data[] = $row;
        }
            return $Data;
    }

    public function im_logIn()
    {
        if (isset($_SESSION['authbjgvjhv78547545gff3426587xgxgfbn']))
		return true;
    }

    public function session()
    {        
        $sess = $_SESSION['authbjgvjhv78547545gff3426587xgxgfbn'];
        return $sess;
    }

    public function logOut()
    {   
        session_destroy();     
        unset($_SESSION['authbjgvjhv78547545gff3426587xgxgfbn']);
        
    }

    public function rd($url)
    {
        header('Location: ' .$url);
        exit;
    }

    
    // Causes <methods class="">
    
    public function CInsert($table, $fields)
	{
		$SQL  = "";
        $SQL .= "INSERT INTO `".$table."`";
        $SQL .= " (`".implode("`,`", array_keys($fields))."`) VALUES ";
        $SQL .= "('".implode("','", array_values($fields))."')";
        //echo $SQL;
        $query = $this->connector->query($SQL);
        if ($query) {
            return true;
        }
    }
    
    public function AuthDubCause($title)
    {
        // Check the Requested id is valid or not
        $sql = "SELECT * FROM `causes` WHERE title = '".$title."' LIMIT 1";
        $query = $this->connector->query($sql);
        $postData = array();
        while ($row = $query->fetch_array()){
            $postData[] = $row;
        }
            return $postData;
    }

    // Event <methods class="">
    
    public function EInsert($table, $fields)
	{
		$SQL  = "";
        $SQL .= "INSERT INTO `".$table."`";
        $SQL .= " (`".implode("`,`", array_keys($fields))."`) VALUES ";
        $SQL .= "('".implode("','", array_values($fields))."')";
        //echo $SQL;
        $query = $this->connector->query($SQL);
        if ($query) {
            return true;
        }
    }
    
    public function AuthDubEvent($title)
    {
        // Check the Requested id is valid or not
        $sql = "SELECT * FROM `causes` WHERE title = '".$title."' LIMIT 1";
        $query = $this->connector->query($sql);
        $postData = array();
        while ($row = $query->fetch_array()){
            $postData[] = $row;
        }
            return $postData;
    }
}
	
?>