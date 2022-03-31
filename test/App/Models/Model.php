<?php
include_once("config.php");
class Model
{
    protected $pdo;
    private $num_row;
    function __construct()
    {
        $this->data = array();
        $this->num_row = 0;
        try {
            $this->pdo = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME, USER, PASS);
            $this->pdo->query("set names utf8");
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function query($sql, $param = array(), $mode = PDO::FETCH_ASSOC)
    {
        $stmt = $this->pdo->prepare($sql);
        if (count($param) > 0)
            $stmt->execute($param);
        else
            $stmt->execute();
        $this->num_row = $stmt->rowCount();
        return $stmt->fetchAll($mode);
    }
    public function insert($sql, $param=array(),$mode=PDO::FETCH_ASSOC)
    {
       
        $stmt=$this->pdo->prepare($sql);
        if(count($param)>0)
        {
            $stmt->execute($param);
        }
        else
            $stmt->execute();
        $this->num_row=$stmt->rowCount();
        return $this->pdo->lastInsertId();
    }
    public function getQuery($query,$params)
    {
        $keys=array();
        foreach($params as $key=>$value)
        {
            if(is_string($key)){
				$keys[] = '/:'.$key.'/';
			} else {
				$keys[] = '/[?]/';
			}
		}
        $query = preg_replace($keys, $params, $query, 1, $count);
		return $query;
    }
    public function getNumRow()
	{
		return $this->num_row;	
	}
	public function sql_debug($sql_string, array $params = null) {
		if (!empty($params)) {
			$indexed = $params == array_values($params);
			foreach($params as $k=>$v) {
				if (is_object($v)) {
					if ($v instanceof \DateTime) $v = $v->format('Y-m-d H:i:s');
					else continue;
				}
				elseif (is_string($v)) $v="'$v'";
				elseif ($v === null) $v='NULL';
				elseif (is_array($v)) $v = implode(',', $v);
	
				if ($indexed) {
					$sql_string = preg_replace('/\?/', $v, $sql_string, 1);
				}
				else {
					if ($k[0] != ':') $k = ':'.$k; //add leading colon if it was left out
					$sql_string = str_replace($k,$v,$sql_string);
				}
			}
		}
		return $sql_string;
	}
}
