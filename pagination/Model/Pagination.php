<?php
namespace Phppot;

use Phppot\DataSource;

class Pagination
{

    private $ds;
    public $LIMIT_PER_PAGE = '6';

    function __construct()
    {
        require_once __DIR__ . './../lib/DataSource.php';
        $this->ds = new DataSource();
    }

    public function getPage($table)
    {
        // adding limits to select query
        //require_once __DIR__ . './../Common/Config.php';
        $limit = $this->LIMIT_PER_PAGE;

        // Look for a GET variable page if not found default is 1.
        if (isset($_GET["page"])) {
            $pn = $_GET["page"];
        } else {
            $pn = 1;
        }
        $startFrom = ($pn - 1) * $limit;

        $query = 'SELECT * FROM '.$table.' LIMIT ? , ?';
        $paramType = 'ii';
        $paramValue = array(
            $startFrom,
            $limit
        );
        $result = $this->ds->select($query, $paramType, $paramValue);
        return $result;
    }

    public function getAllRecords($table)
    {
        $query = 'SELECT * FROM '.$table;
        $totalRecords = $this->ds->getRecordCount($query);
        return $totalRecords;
    }
}
?>