<?php
class orderproduct
{
    private $db;
    private $sql_select = "select * from tbl_orderproduct WHERE 1 ";
    private $sql_insert = "INSERT INTO `tbl_orderproduct`
                              (`orderid`,`productid`,`subject`, `picName`, `priceBuy`, `priceSelltmp`,`priceSell`,  `number`, `total`) 
                           VALUES 
                              ( %s ,%s , %s , %s ,%s , %s , %s, %s, %s )";
    private $sql_update = "UPDATE `tbl_orderproduct` 
                           SET 
                              `orderid`=%s,
                              `productid`=%s,
                              `subject`=%s,
                              `picName`=%s,
                              `priceBuy`=%s,
                              `priceSelltmp`=%s,
                              `priceSell`=%s,
                              `number`=%s,
                              `total`=%s 
                           WHERE 1 ";
    private $sql_delete = "delete from tbl_orderproduct WHERE 1 ";

    function __construct()
    {
        $this->db = new Database();
    }

    function insert($tblOrderProduct)
    {
        $sql = sprintf($this->sql_insert,
            check($tblOrderProduct->orderid),
            check($tblOrderProduct->productid),
            check($tblOrderProduct->subject),
            check($tblOrderProduct->picName),
            check($tblOrderProduct->priceBuy),
            check($tblOrderProduct->priceSelltmp),
            check($tblOrderProduct->priceSell),
            check($tblOrderProduct->number),
            check($tblOrderProduct->total)
        );
        return $this->db->IUD($sql);
    }

    function delete($id)
    {
        $sql = sprintf($this->sql_delete.' and id = '.check($id));
        return $this->db->IUD($sql);
    }

    function deleteWhitOrderId($id)
    {
        $sql = sprintf($this->sql_delete.' and orderid = '.check($id));
        return $this->db->IUD($sql);
    }

    function getOrderProducts($orderid)
    {
        $sql = $this->sql_select;
        return $this->db->searchAll($sql.' and orderid='.check($orderid));
    }

    function getOrderProductObject($orderid)
    {
        $sql = $this->sql_select.' and orderid = '.check($orderid);
//        return $sql;
        return $this->db->searchAllObjects($sql,'tbl_orderproduct');
    }
}