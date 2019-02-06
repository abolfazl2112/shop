<?php
class category
{
    private $db;
    private $sql_select = "select * from tbl_category WHERE 1 ";
    private $sql_insert = "INSERT INTO `tbl_category`
                              (`ressellerId`,`userId`,`parentid`,`subject`, `description`,`pic`, `active`) 
                           VALUES 
                              ( %s , %s, %s , %s , %s , %s  , %s  )";
    private $sql_update = "UPDATE `tbl_category` 
                           SET 
                              `ressellerId`=%s,
                              `userId`=%s,
                              `parentid`=%s,
                              `subject`=%s,
                              `description`=%s,
                              `pic`=%s,
                              `active`=%s
                           WHERE 1 ";
    private $sql_delete = "delete from tbl_category WHERE 1 ";

    function __construct()
    {
        $this->db = new Database();
    }

    function insert($tblCategory)
    {
        $sql = sprintf($this->sql_insert,
            check($tblCategory->ressellerId),
            check($tblCategory->userId),
            check($tblCategory->parentid),
            check($tblCategory->subject),
            check($tblCategory->description),
            check($tblCategory->pic),
            check($tblCategory->active)
        );
        return $this->db->IUD($sql);
    }

    function update($tblCategory)
    {
        $sql = sprintf($this->sql_update.' and id='.check($tblCategory->id),
            check($tblCategory->ressellerId),
            check($tblCategory->userId),
            check($tblCategory->parentid),
            check($tblCategory->subject),
            check($tblCategory->description),
            check($tblCategory->pic),
            check($tblCategory->active)
        );
        return $this->db->IUD($sql);
    }

    function delete($id)
    {
        $sql = sprintf($this->sql_delete.' and id = '.check($id));
        return $this->db->IUD($sql);
    }


    function getCategories()
    {
        $sql = $this->sql_select;
        return $this->db->searchAllObjects($sql,'tbl_category');
    }

    function getCategoryFirstPage($number=8,$desc=false)
    {
        $sql = $this->sql_select.' and parentid<>0 '.($desc?' ORDER BY id DESC':'').' Limit 0,'.$number;
        return $this->db->searchAllObjects($sql,'tbl_category',false);
    }

    function getSubCategories($parentId)
    {
        $sql = $this->sql_select;
        return $this->db->searchAllObjects($sql.' and parentid='.check($parentId),'tbl_category');
    }

    function getCategoriesResseller($ressellerId)
    {
        $sql = $this->sql_select.' and ressellerId='.check($ressellerId);
        return $this->db->searchAllObjects($sql,'tbl_category');
    }

    function getCategory($id)
    {
        $sql = $this->sql_select.' and id = '.$id;
        return $this->db->searchFirstObject($sql,'tbl_category');
    }
}