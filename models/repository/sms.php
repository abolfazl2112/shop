<?php
define('URLSMS',"37.130.202.188/services.jspd");

class smspanel
{
    private $db;
    private $username;
    private $password;
    private $sql_select = "select * from tbl_sms WHERE 1 ";

    function __construct($username = '', $password = '', $number = '')
    {
        $this->db=new Database();
        $smsDetails = $this->getSmsDetails();

        $this->username = $smsDetails->username;
        $this->password = $smsDetails->password;
        $this->number = $smsDetails->number;
    }

    private function getSmsDetails()
    {
        $sql = $this->sql_select.' and id='.check(1);
        return $this->db->searchFirstObject($sql,'tbl_sms');
    }

    function get_credit()
    {
        $url = URLSMS;
        $param = array
        (
            'uname' => $this->username,
            'pass' => $this->password,
            'op' => 'credit'
        );

        $handler = curl_init($url);
        curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($handler, CURLOPT_POSTFIELDS, $param);
        curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
        $response2 = curl_exec($handler);

        $response2 = json_decode($response2);
        $res_code = $response2[0];
        $res_data = $response2[1];


        return $res_data;
    }

    function send_sms($body, $mobile_array)
    {
        $url = URLSMS;

//        $mobile_array = array('9121111111','9122222222');
        $param = array
        (
            'uname' => $this->username,
            'pass' => $this->password,
            'from' => $this->number,
            'message' => $body,
            'to' => json_encode($mobile_array),
            'op' => 'send'
        );

        $handler = curl_init($url);
        curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($handler, CURLOPT_POSTFIELDS, $param);
        curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
        $response2 = curl_exec($handler);

        $response2 = json_decode($response2);
        $res_code = $response2[0];
        $res_data = $response2[1];
        return $res_code;
    }

    function get_inbox_messages()
    {
        $url = URLSMS;
        $param = array
        (
            'uname' => $this->username,
            'pass' => $this->password,
            'op' => 'inboxlist'
        );

        $handler = curl_init($url);
        curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($handler, CURLOPT_POSTFIELDS, $param);
        curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
        $response2 = curl_exec($handler);

        $response2 = json_decode($response2);
        $res_code = $response2[0];
        $res_data = $response2[1];


        return $res_data;
    }

    function send_fast_sms($mobileAyray,$pattern_code,$input_data)
    {
        $client = new SoapClient("http://37.130.202.188/class/sms/wsdlservice/server.php?wsdl");
        $user = $this->username;
        $pass = $this->password;
        $fromNum = $this->number;
        $toNum = $mobileAyray;

        return $client->sendPatternSms($fromNum,$toNum,$user,$pass,$pattern_code,$input_data);
    }
}
?>