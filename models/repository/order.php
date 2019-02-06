<?php
abstract class orderStates
{
    const pending = 0;
    const confirm = 1;
    const completed = 2;
    const cancel = 3;
}
class order
{
    private $db;
    private $sql_select = "select * from tbl_order WHERE 1 ";
    private $sql_insert = "INSERT INTO `tbl_order`
                              ( `orderid`, `ressellerid`, `userid`, `price`, `discountcode`, `pricewithdiscount`, `description`, `date`, `time`, `state`) 
                           VALUES 
                              ( %s , %s , %s , %s , %s, %s , %s ,%s , %s , %s )";
    private $sql_update = "UPDATE `tbl_order` 
                           SET 
                              `orderid`=%s,
                              `ressellerid`=%s,
                              `userid`=%s,
                              `price`=%s, 
                              `discountcode`=%s, 
                              `pricewithdiscount`=%s, 
                              `description`=%s, 
                              `date`=%s, 
                              `time`=%s, 
                              `state`=%s,
                              `count` = %s,
                              `customername` = %s
                           WHERE 1 ";
    private $sql_delete = "delete from tbl_order WHERE 1 ";

    function __construct()
    {
        $this->db = new Database();
    }

    function insert($tblorder)
    {
        $sql = sprintf($this->sql_insert,
            check($tblorder->orderid),
            check($tblorder->ressellerid),
            check($tblorder->userid),
            check($tblorder->price),
            check($tblorder->discountcode),
            check($tblorder->pricewithdiscount),
            check($tblorder->description),
            check($tblorder->date),
            check($tblorder->time),
            check($tblorder->state)
        );
        return $this->db->IUD($sql);
    }

    function delete($id)
    {
        $sql = sprintf($this->sql_delete . ' and id = ' . check($id));
        return $this->db->IUD($sql);
    }

    function getOrders($start = -1, $end = -1)
    {
        $sql = $this->sql_select;

        if ($start >= 0 && $end >= 0)
        {
            $limit = 'LIMIT ' . $start . ' , ' . $end;
        }
        else
            $limit = '';
        return $this->db->searchAllObjects($sql . $limit, 'tbl_order');
    }

    function getOrdersByWeight($startweight, $endweight)
    {
        $sql = $this->sql_select . ' AND price>=' . $startweight . ' AND price <=' . $endweight;

        return $this->db->searchAllObjects($sql, 'tbl_order');
    }

    function getOrdersByDate($startDate, $endDate,$userid='')
    {
        $sql = $this->sql_select . ' and date>= ' . check($startDate) . ' and date<=' . check($endDate);
        if($userid!='')
            $sql.= ' AND userid='.$userid;

        return $this->db->searchAllObjects($sql, 'tbl_order');
    }

    function getUserOrders($userId, $start = 0, $end = 0)
    {
        $sql = $this->sql_select;
        $limit = ($start > 0 && $end > 0 && $start > $end ? " LIMIT " . $start . "," . $end . " " : "");
        return $this->db->searchAllObjects($sql . ' and userid=' . check($userId) . $limit, 'tbl_order');
    }

    function getOrder($id)
    {
        $sql = $this->sql_select . ' and id = ' . check($id);
        return $this->db->searchFirst($sql);
    }

    function getOrderObject($id)
    {
        $sql = $this->sql_select . ' and id = ' . check($id);
        return $this->db->searchFirstObject($sql, 'tbl_order');
    }

    function getreport($userid = '', $productid = '', $startdate = '', $enddate = '')
    {
        $ssql = "SELECT  op.*
				FROM tbl_order o
				LEFT JOIN tbl_orderproduct op ON o.id=op.orderid 
				WHERE 1";

        if ($userid != '')
            $ssql .= ' AND userid=' . $userid;
        if ($productid != '')
            $ssql .= ' AND productid=' . $productid;
        if ($startdate != '')
            $ssql .= ' AND date>=' . $startdate;
        if ($enddate != '')
            $ssql .= ' AND date<=' . $enddate;


        return $this->db->searchAll($ssql);

    }

    function reportmaxproduct($userid = '', $productid = '', $startdate = '', $enddate = '')
    {

        $fullmax = "SELECT y.num as count,y.pid as productid,y.pname as productname,y.picname as picname,y.weight as weight, y.num*y.weight as allweight
		  FROM 
          (
          SELECT SUM(op.number) as num,op.productid as pid,p.subject as pname,p.picName as picname,p.weight as weight 
          FROM tbl_order o 
          INNER JOIN tbl_orderproduct op ON o.id=op.orderid 
          INNER JOIN tbl_product p ON op.productid = p.id
          WHERE %s 
          GROUP BY op.productid 
          ORDER BY num DESC
          ) y
          ORDER BY count DESC";

        $fullcondition = ' 1 ';

        if ($userid != '')
            $fullcondition .= ' AND o.userid=' . check($userid);
        if ($productid != '')
            $fullcondition .= ' AND op.productid=' . check($productid);
        if ($startdate != '')
            $fullcondition .= ' AND o.date>=' . check($startdate);
        if ($enddate != '')
            $fullcondition .= ' AND o.date<=' . check($enddate);

        $final = sprintf($fullmax, $fullcondition);
        
        return $this->db->SearchwithJOIN($final);

    }

    function get_orderproducts($orderid)
    {
        $sql = 'SELECT * FROM tbl_orderproduct WHERE 1 AND orderid='.$orderid;

        return $this->db->searchAllObjects($sql,'tbl_orderproduct');
    }

}