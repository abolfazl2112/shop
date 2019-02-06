<?php
class product
{
    private $db;
    private $sql_select = "select * from tbl_product WHERE 1 ";
    private $sql_insert = "INSERT INTO `tbl_product`
                              (`categoryId`, `ressellerId`, `userId`, `subject`, `description`, `keywords`, `meta`, `picName`, `priceBuy`,`priceSelltmp`, `priceSell`, `number`,`weight`,`size`, `type`, `active`, `barcode`) 
                           VALUES 
                              ( %s , %s , %s , %s , %s, %s , %s , %s , %s , %s ,%s , %s , %s , %s  , %s, %s, %s  )";
    private $sql_update = "UPDATE `tbl_product` 
                           SET 
                              `categoryId`=%s,
                              `ressellerId`=%s,
                              `userId`=%s,
                              `subject`=%s,
                              `description`=%s,
                              `keywords`=%s,
                              `meta`=%s,
                              `picName`=%s,
                              `priceBuy`=%s,
                              `priceSelltmp`=%s,
                              `priceSell`=%s,
                              `number`=%s,
                              `type`=%s,
                              `active`=%s,
                              `barcode`=%s
                           WHERE 1 ";
    private $sql_delete = "delete from tbl_product WHERE 1 ";

    function __construct()
    {
        $this->db = new Database();
    }

    function insert($tblProduct)
    {
        $sql = sprintf($this->sql_insert,
            check($tblProduct->categoryId),
            check($tblProduct->ressellerId),
            check($tblProduct->userId),
            check($tblProduct->subject),
            check($tblProduct->description),
            check($tblProduct->keywords),
            check($tblProduct->meta),
            check($tblProduct->picName),
            check($tblProduct->priceBuy),
            check($tblProduct->priceSelltmp),
            check($tblProduct->priceSell),
            check($tblProduct->number),
            check($tblProduct->weight),
            check($tblProduct->size),
            check($tblProduct->type),
            check($tblProduct->active),
            check($tblProduct->barcode)
        );
        return $this->db->IUD($sql);
    }

    function update($tblProduct)
    {
        $sql = sprintf($this->sql_update.' and id = '.check($tblProduct->id),
            check($tblProduct->categoryId),
            check($tblProduct->ressellerId),
            check($tblProduct->userId),
            check($tblProduct->subject),
            check($tblProduct->description),
            check($tblProduct->keywords),
            check($tblProduct->meta),
            check($tblProduct->picName),
            check($tblProduct->priceBuy),
            check($tblProduct->priceSelltmp),
            check($tblProduct->priceSell),
            check($tblProduct->number),
            check($tblProduct->type),
            check($tblProduct->active),
            check($tblProduct->barcode)
        );
        return $this->db->IUD($sql);
    }

    function delete($id)
    {
        $sql = sprintf($this->sql_delete.' and id = '.check($id));
        return $this->db->IUD($sql);
    }

    function getProducts($min=0,$max=0)
    {
        $limit = '';
        $sql = $this->sql_select;
        if($min>=0&&$max>0)
        {
            $limit =' LIMIT '.$min.','.$max;
        }
        return $this->db->searchAllObjects($sql,'tbl_product',true,$limit);
    }

    function getProductsWithFilters($filters)
    {
        $sql = $this->sql_select.$filters;
        return $this->db->searchAllObjects($sql,'tbl_product');
    }

    function getProductInCategory($categoryId)
    {
        $sql = $this->sql_select;
        return $this->db->searchAllObjects($sql.' and categoryId='.check($categoryId).' and active=1','tbl_product');
    }

    function getProductInCategoryAndSubCategory($categoryId)
    {
        $sql = 'SELECT DISTINCT `tbl_product`.* 
                FROM `tbl_product` 
                cross join `tbl_category`
                where (`tbl_product`.categoryId = `tbl_category`.id  
                OR `tbl_product`.categoryId = `tbl_category`.parentid) 
                AND `tbl_product`.categoryId='.check($categoryId);

        return $this->db->searchAllObjects($sql,'tbl_product');
    }

    function getBestsellingProducts($number=20)
    {
        $sql = $this->sql_select.' and active=1  order by id desc Limit 0, '.$number;
        return $this->db->searchAllObjects($sql,'tbl_product',false);
    }

    function getNewProducts($number=20)
    {
        $sql = $this->sql_select.' and active=1 order by id DESC Limit 0, '.$number;
        return $this->db->searchAllObjects($sql,'tbl_product',false);
    }

    function getProductInResseller($ressellerId,$start=0,$end=0)
    {
        $limit = ($start>0&&$end>0&&$start>$end?" LIMIT ".$start.",".$end." ":"");
        $sql = $this->sql_select.' and ressellerId='.check($ressellerId).' and active = 1 '.$limit;
        return $this->db->searchAllObjects($sql,'tbl_product');
    }

    function getProduct($id)
    {
        $sql = $this->sql_select.' and id = '.check($id);
        return $this->db->searchFirst($sql);
    }
    function getProductObject($id)
    {
        $sql = $this->sql_select.' and id = '.check($id);
        return $this->db->searchFirstObject($sql,'tbl_product');
    }

    function getFilterProduct($ressellerId,$filter,$start=0,$end=0)
    {
        $limit = ($start>0&&$end>0&&$start>$end?" LIMIT ".$start.",".$end." ":"");
        $filter='%'.$filter.'%';
        $sql = $this->sql_select.' and subject LIKE '.check($filter).' and active = 1 '.$limit;
        return $this->db->searchAllObjects($sql,'tbl_product');
    }

    function searchProducts($filter)
    {
        $sql = $this->sql_select." and subject LIKE '%".$filter."%'";
        return $this->db->searchAllObjects($sql,'tbl_product');
    }
}