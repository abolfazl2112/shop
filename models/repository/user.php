<?php

class user
{
    private $db;
    private $sql_select = "select * from tbl_user WHERE 1 ";
    private $sql_insert = "INSERT INTO `tbl_user`
                              (`name`, `family`,`father`, `birthdate`, `sex`, `address`, `mobile`, `picture`, `username`, `password`, `usertype`, `credit`, `rate`, `active`,`files`,`date`,`time`,`moaref`,`admin`) 
                           VALUES 
                              (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)";
    private $sql_update = "UPDATE `tbl_user` 
                           SET 
                              `name`=%s,
                              `family`=%s,
                              `father`=%s,
                              `birthdate`=%s,
                              `sex`=%s,
                              `address`=%s,
                              `mobile`=%s,
                              `picture`=%s,
                              `username`=%s,
                              `password`=%s,
                              `usertype`=%s,
                              `credit`=%s,
                              `rate`=%s,
                              `active`=%s,
                              `files`=%s,
                              `date`=%s,
                              `time`=%s,
                              `moaref`=%s,
                              `admin`=%s
                           WHERE 1 ";
    private $sql_delete = "delete from tbl_user WHERE 1 ";

    public $defaultRate=0;
    public $defaultUserType=0;
    public $defaultCredit=0;
    public $defaultState=0;
    public $usertype_passanger=0;
    public $usertype_driver=1;

    function __construct()
    {
        $this->db=new Database();
    }

    function signUp($tbluser)
    {
        $sql = sprintf($this->sql_insert,
            check($tbluser->name),
            check($tbluser->family),
            check($tbluser->father),
            check($tbluser->birthdate),
            check($tbluser->sex),
            check($tbluser->address),
            check($tbluser->mobile),
            check($tbluser->picture),
            check($tbluser->username),
            check($tbluser->password),
            check($tbluser->usertype),
            check($tbluser->credit),
            check($tbluser->rate),
            check($tbluser->active),
            check($tbluser->files),
            check($tbluser->date),
            check($tbluser->time),
            check($tbluser->moaref),
            check($tbluser->admin)
        );
//        echo $sql;
        return $this->db->IUD($sql);
    }

    function update($tbluser)
    {
        $sql = sprintf($this->sql_update.' and id = %s',
            check($tbluser->name),
            check($tbluser->family),
            check($tbluser->father),
            check($tbluser->birthdate),
            check($tbluser->sex),
            check($tbluser->address),
            check($tbluser->mobile),
            check($tbluser->picture),
            check($tbluser->username),
            check($tbluser->password),
            check($tbluser->usertype),
            check($tbluser->credit),
            check($tbluser->rate),
//            check($tbluser->state),
            check($tbluser->active),
            check($tbluser->files),
//            check($tbluser->cartype),
//            check($tbluser->carcolor),
//            check($tbluser->carpelak),
            check($tbluser->date),
            check($tbluser->time),
            check($tbluser->moaref),
            check($tbluser->admin),
            check($tbluser->id)
        );
//echo $sql;
        return $this->db->IUD($sql);
    }

    function delete($id)
    {
        $sql = sprintf($this->sql_delete.' and id = %s',
            check($id)
        );

        return $this->db->IUD($sql);
    }

    function saveUserArrayToTblArray($userArray)
    {
        $tbluser = new tbl_user();
        $tbluser->id = $userArray['id'];
        $tbluser->name=$userArray['name'];
        $tbluser->family=$userArray['family'];
        $tbluser->birthdate=$userArray['birthdate'];
        $tbluser->sex=$userArray['sex'];
        $tbluser->address=$userArray['address'];
        $tbluser->mobile=$userArray['mobile'];
        $tbluser->picture=$userArray['picture'];
        $tbluser->username=$userArray['username'];
        $tbluser->password=$userArray['password'];
        $tbluser->usertype=$userArray['usertype'];
        $tbluser->credit=$userArray['credit'];
        $tbluser->rate=$userArray['rate'];
//        $tbluser->state=$userArray['state'];
        $tbluser->active=$userArray['active'];
        $tbluser->files=$userArray['files'];
//        $tbluser->cartype=$userArray['cartype'];
//        $tbluser->carcolor=$userArray['carcolor'];
//        $tbluser->carpelak=$userArray['carpelak'];
        $tbluser->date=$userArray['date'];
        $tbluser->time=$userArray['time'];
        $tbluser->moaref=$userArray['moaref'];
        return $tbluser;
    }

    function generatePassword()
    {
        return rand(10000,99999);
    }

    function checkUserExist($username,$password)
    {
        $user = $this->getUserByUsername($username);
        if($user && $user->password==$password)
        {
            return $user->id;
        }
        return 0;
    }

    function getUserById($id)
    {
        $sql = $this->sql_select.' and id='.check($id);
        return $this->db->searchFirstObject($sql,'tbl_user');
    }

    function getResseller()
    {
        $sql = $this->sql_select.' and usertype = 2 and active = 1';
        return $this->db->searchAllObjects($sql,'tbl_user');
    }

    function getUserByUsername($username)
    {
        $sql = $this->sql_select.' and username='.check($username);
        return $this->db->searchFirstObject($sql,'tbl_user');
    }

    function getUserByMobile($mobile)
    {
        $sql = $this->sql_select.' and mobile='.check($mobile);
        return $this->db->searchFirstObject($sql,'tbl_user');
    }

    function getUsers($userType=-1)
    {
        $sql = $this->sql_select;
        if($userType>=0)
            $sql .= " and usertype = ".check($userType);
        return $this->db->searchAllObjects($sql,'tbl_user');
    }

    function getAllUsers($start=-1,$end=-1)
    {
        $sql = $this->sql_select;
        if($start>=0&&$end>0)
            $limit = " ORDER BY id DESC LIMIT ".$start.','.$end;
        else
            $limit = ' ORDER BY id DESC ';
        return $this->db->searchAllObjects($sql.$limit,'tbl_user');
    }
    
    function getallcustomer()
    {
        $sql = $this->sql_select.' AND admin='.'0';
        
        return $this->db->searchAllObjects($sql,'tbl_user');
    }

    function getUsersCount($userType=-1)
    {
        $sql = $this->sql_select;
        if($userType>=0)
            $sql .= " and usertype = ".check($userType);
        return $this->db->Number($sql);
    }

    function getUsersSearch($username,$family,$type)
    {
        $sql = $this->sql_select;
        if($username!='')
            $sql .= " and username LIKE '".$username."%'";
        if($family!='')
            $sql .= " and family LIKE '".$family."%'";

        $sql.=" and usertype=".check($type);

        return $this->db->searchAllObjects($sql,'tbl_user');
    }
}