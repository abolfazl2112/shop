<?php
function check($value)
{
    return "'".$value."'";
}

function getDateToInt($date)
{
    $date = str_replace('/','',$date);
    return convertFaToEn($date);
}

function convertFaToEn($string) {
    $persian = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
    $num = range(0, 9);
    return str_replace($persian, $num, $string);
}

function convertEnToFa($string) {
    $english = range(0, 9);
    $num = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
    return str_replace($english, $num, $string);
}

function getDistanceBetweenTwoPoints($startLon,$startLat,$endLon,$endLat)
{
    $url = "http://maps.googleapis.com/maps/api/distancematrix/json?origins=".$startLat.",".$startLon."&destinations=".$endLat.",".$endLon;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $response = curl_exec($ch);
    curl_close($ch);
    $response_a = json_decode($response);
    $status = $response_a->status;


    if ( $status == 'ZERO_RESULTS' )
    {
        return FALSE;
    }
    else
    {
        $km =  $response_a->rows[0]->elements[0]->distance->text;
        $km = str_replace(' ','',$km);
        if(strpos($km,"km"))
        {
            $km*=1000;
        }
        $km = str_replace('km','',$km);
        $km = str_replace('m','',$km);

        return $km;
    }
}

function postData($url,$myvars)
{
//    $url = 'http://www.someurl.com';
//    $myvars = 'myvar1=' . $myvar1 . '&myvar2=' . $myvar2;

    $ch = curl_init( $url );
    curl_setopt( $ch, CURLOPT_POST, 1);
    curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);
    curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt( $ch, CURLOPT_HEADER, 0);
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

    $response = curl_exec( $ch );

    return $response;
}
//header('Content-Type: text/html; charset=utf-8');
//print_r(getDistanceBetweenTwoPoints(34.3500944,58.6863477,34.1506301,58.6530925));