<?php
define('URLSMS',"37.130.202.188/services.jspd");

class kavenegarsms
{
    function sendsms($body,$mobile)
    {
        require  'vendor/autoload.php';
        $sender = "100065995";
        $receptor = $mobile;
        $message = $body;
        $api = new \Kavenegar\KavenegarApi("4B6567316B6A6F4C6B514435472F494F73675A6F503252667135574D5A413870");
        $api->Send($sender,$receptor,$message);
    }
}

class SMSPANEL
{
    private $username;
    private $password;

    function __construct($username = '', $password = '', $number = '')
    {
        $this->username = $username;
        $this->password = $password;
        $this->number = $number;
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