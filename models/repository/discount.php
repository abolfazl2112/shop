<?php
class discount
{
    private $db;
    private $sql_select = "select * from tbl_discount WHERE 1 ";
    private $sql_insert = "INSERT INTO `tbl_discount`
                              (`userid`,`subject`,`code`,`percent`, `date1`,`date2`,`number`, `active`) 
                           VALUES 
                              ( %s , %s, %s , %s , %s , %s , %s , %s , %s  )";
    private $sql_update = "UPDATE `tbl_discount` 
                           SET 
                              `userid`=%s,
                              `subject`=%s,
                              `code`=%s,
                              `percent`=%s,
                              `date1`=%s,
                              `date2`=%s,
                              `number`=%s,
                              `active`=%s
                           WHERE 1 ";
    private $sql_delete = "delete from tbl_discount WHERE 1 ";

    function __construct()
    {
        $this->db = new Database();
    }

    function insert($tblDiscount)
    {
        $sql = sprintf($this->sql_insert,
            check($tblDiscount->ressellerId),
            check($tblDiscount->userId),
            check($tblDiscount->parentid),
            check($tblDiscount->subject),
            check($tblDiscount->description),
            check($tblDiscount->active)
        );
        return $this->db->IUD($sql);
    }

    function delete($id)
    {
        $sql = sprintf($this->sql_delete.' and id = '.check($id));
        return $this->db->IUD($sql);
    }


    function getDiscounts()
    {
        $sql = $this->sql_select;
        return $this->db->searchAllObjects($sql,'tbl_discount');
    }



    function getDiscount($id)
    {
        $sql = $this->sql_select.' and id = '.$id;
        return $this->db->searchFirstObject($sql,'tbl_discount');
    }
}