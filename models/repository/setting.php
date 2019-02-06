<?php
class setting
{
    private $db;
    private $sql_select = "select * from tbl_setting WHERE 1 ";
    private $sql_insert = "INSERT INTO `tbl_setting`
                              ( `name`, `description`, `keywords`, `meta`, `currency`, `address`, `mobile`, `tell`, `logo`, `telegram`, `instagram`, `email`, `active`) 
                           VALUES 
                              ( %s , %s, %s , %s , %s , %s  , %s, %s, %s, %s, %s, %s, %s  )";
    private $sql_update = "UPDATE `tbl_setting` 
                           SET 
                              `name`=%s,
                              `discription`=%s,
                              `keywords`=%s,
                              `meta`=%s,
                              `currency`=%s,
                              `address`=%s,
                              `mobile`=%s,
                              `tell`=%s,
                              `logo`=%s,
                              `telegram`=%s,
                              `instagram`=%s,
                              `email`=%s,
                              `active`=%s
                           WHERE 1 ";
    private $sql_delete = "delete from tbl_setting WHERE 1 ";

    function __construct()
    {
        $this->db = new Database();
    }

    function insert($tblSetting)
    {
        $sql = sprintf($this->sql_insert,
            check($tblSetting->name),
            check($tblSetting->description),
            check($tblSetting->kewords),
            check($tblSetting->meta),
            check($tblSetting->currency),
            check($tblSetting->address),
            check($tblSetting->mobile),
            check($tblSetting->tell),
            check($tblSetting->logo),
            check($tblSetting->telegram),
            check($tblSetting->instagram),
            check($tblSetting->email),
            check($tblSetting->active)
        );
        return $this->db->IUD($sql);
    }

    function update($tblSetting)
    {
        $sql = sprintf($this->sql_update.' and id = '.check($tblSetting->id),
            check($tblSetting->name),
            check($tblSetting->description),
            check($tblSetting->kewords),
            check($tblSetting->meta),
            check($tblSetting->currency),
            check($tblSetting->address),
            check($tblSetting->mobile),
            check($tblSetting->tell),
            check($tblSetting->logo),
            check($tblSetting->telegram),
            check($tblSetting->instagram),
            check($tblSetting->email),
            check($tblSetting->active)
        );
        return $this->db->IUD($sql);
    }

    function delete($id)
    {
        $sql = sprintf($this->sql_delete.' and id = '.check($id));
        return $this->db->IUD($sql);
    }

    function getSetting($id)
    {
        $sql = $this->sql_select.' and id = '.$id;
        return $this->db->searchFirstObject($sql,'tbl_setting');
    }
}