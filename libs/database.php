<?php

class Database extends PDO
{
    private $db;
    private $utf8 = "SET CHARACTER SET utf8";
    private $utf8_1 = "SET NAMES 'UTF8";
    private $utf8_2 = "SET character_set_connection = 'utf8'";

	function __construct()
	{
		parent::__construct(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
	}

    public function searchAll($sql,$orderbyid=true)
    {
        $this->db = null;
        $this->db = new Database();
        $query = $this->db->prepare($this->utf8);
        $query->execute();

        if($orderbyid)
            $sql .= " order by id desc";
        $query = $this->db->prepare($sql);
        $query->execute();
        $arrayFetch = $query->fetchAll();
        $this->db = null;
//        echo $sql;
//        print_r($arrayFetch);
        return $arrayFetch;
    }

    public function searchAll_style($sql,$orderbyid=true)
    {

        $this->db = null;
        $this->db = new Database();
        $query = $this->db->prepare($this->utf8);
        $query->execute();

        if($orderbyid)
            $sql .= " order by id desc";
        $query = $this->db->prepare($sql);
        $query->execute();
        $arrayFetch = $query->fetchAll(PDO::FETCH_ASSOC);
        $this->db = null;
        //echo $sql;
        return $arrayFetch;
    }
    public function searchAllObjects($sql,$className,$orderbyid=true,$limit='')
    {
        $this->db = null;
        $this->db = new Database();
        $query = $this->db->prepare($this->utf8);
        $query->execute();

        if($orderbyid)
            $sql .= " order by id desc";

        $sql .= $limit;
        $query = $this->db->prepare($sql);
        $query->execute();
        $objects = $query->fetchAll(PDO::FETCH_CLASS,$className);
        $this->db = null;
//        echo $sql;
//        print_r($objects);
        return $objects;
    }

    function searchFirst($sql)
    {
//        echo $sql;
        $this->db = null;
        $this->db = new Database();
        $query = $this->db->prepare($this->utf8);
        $query->execute();
        $qurey = $this->db->prepare($sql);
        $qurey->execute();
        $result = $qurey->fetch(PDO::FETCH_ASSOC);
        $this->db = null;
        return $result;
    }

    function searchFirstObject($sql,$className)
    {
//        echo $sql;
        $this->db = null;
        $this->db = new Database();
        $query = $this->db->prepare($this->utf8);
        $query->execute();
        $qurey = $this->db->prepare($sql);
        $qurey->execute();
        $object = $qurey->fetchObject($className);
        $this->db = null;
        return $object;
    }

    function Number($sql)
    {
        $this->db = null;
        $this->db = new Database();
        $qurey = $this->db->prepare($sql);
        $qurey->execute();
        $qurey = $this->db->prepare("SELECT FOUND_ROWS()");
        $qurey->execute();
        $num = $qurey->fetchColumn();
        $this->db = null;
        return $num;
    }

    public function IUD($sql)
    {
//        echo $sql;
        $this->db = null;
        $this->db = new Database();
        $query = $this->db->prepare($this->utf8);
        $query->execute();
        $query = $this->db->prepare($sql);
        $query->execute();
        $count = $query->rowcount();
        if ($count > 0) {
            $lastInsertId = $this->db->lastInsertId();
            $this->db = null;
            if($lastInsertId>0)
                return $lastInsertId;
            return $count;
        } else {
            $this->db = null;
            return 0;
        }
    }
    
    public function SearchwithJOIN($sql,$orderbyid=true)
    {
        $con=null;
        $con = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
        mysqli_set_charset($con,"utf8");
        $result = mysqli_query($con,$sql);

        $sqlrows = array();
        $index = 0;
        while ($row = mysqli_fetch_assoc($result))
        {
            $sqlrows[$index] = $row;
            $index++;
        }
        mysqli_close($con);
        $con=null;

        return $sqlrows;
    }

}

