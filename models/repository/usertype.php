<?php
class usertype
{
    private $db;
    private $sql_select = "select * from tbl_usertype WHERE 1 ";
    private $sql_insert = "INSERT INTO `tbl_usertype`
                              (`name`,`active`,`access_menu`,`user`, `resseller`, `admin`) 
                           VALUES 
                              ( %s , %s, %s , %s , %s , %s  )";
    private $sql_update = "UPDATE `tbl_usertype` 
                           SET 
                              `name`=%s,
                              `active`=%s,
                              `access_menu`=%s,
                              `user`=%s,
                              `resseller`=%s,
                              `admin`=%s
                           WHERE 1 ";
    private $sql_delete = "delete from tbl_usertype WHERE 1 ";

    function __construct()
    {
        $this->db = new Database();
    }

//    function insert($tblusertype)
//    {
//        $sql = sprintf($this->sql_insert,
//            check($tblusertype->ressellerId),
//            check($tblusertype->userId),
//            check($tblusertype->parentid),
//            check($tblusertype->subject),
//            check($tblusertype->description),
//            check($tblusertype->active)
//        );
//        return $this->db->IUD($sql);
//    }

//    function delete($id)
//    {
//        $sql = sprintf($this->sql_delete.' and id = '.check($id));
//        return $this->db->IUD($sql);
//    }


    function getUsertypes()
    {
        $sql = $this->sql_select;
        return $this->db->searchAllObjects($sql,'tbl_usertype');
    }



    function getUsertype($id)
    {
        $sql = $this->sql_select.' and id = '.$id;
        return $this->db->searchFirstObject($sql,'tbl_usertype');
    }
}