<html>
<head>
    <title>نتیجه پرداخت</title>
    <meta charset="utf-8">
</head>
<body>

    <div style="padding: 20px;text-align: center;">
<?php
session_start();
include_once '../../libs/include.all.php';

if(
    isset($_SESSION['amount']) && !empty($_SESSION['amount'])&&
    isset($_SESSION['username_value']) && !empty($_SESSION['username_value'])&&
    isset($_GET['Authority']) && !empty($_GET['Authority'])
) {
    $MerchantID = '0034583a-cee0-11e7-8397-000c295eb8fc';
    $Amount = $_SESSION['amount']; //Amount will be based on Toman
    $Authority = $_GET['Authority'];

    if ($_GET['Status'] == 'OK') {

        $client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

        $result = $client->PaymentVerification(
            [
                'MerchantID' => $MerchantID,
                'Authority' => $Authority,
                'Amount' => $Amount,
            ]
        );

        if ($result->Status == 100)
        {
            $person= new user();
            $tblPerson = $person->getUserByUsername($_SESSION['username_value']);


            $credit = is_numeric($Amount)?$Amount:0;

            $tbl_credit = new tbl_credit();
            $tbl_credit->description=($credit>0?'افزایش اعتبار':'کاهش اعتبار');
            $tbl_credit->date = jdate('omd','','','','en');
            $tbl_credit->time = jdate('His','','','','en');
            $tbl_credit->userId = $tblPerson->id;
            $tbl_credit->price = $credit;

            $credit_list = new credit();
            $credit_list->insert($tbl_credit);

            $tblPerson->credit += $credit;
            $tblPerson->address = "بروز شد";
            if($person->update($tblPerson)>0)
            {
                echo '<div style="background-color: green;color: white;padding: 10px;border-radius: 5px;box-shadow: 0px 0px 5px black;">'.'پرداخت شما با موفقیت انجام شد'.'<br>کد رهگیری:'. $result->RefID.'</div>';
            }
            else
            {
                echo '<div style="background-color: #b7e102;color: white;padding: 10px;border-radius: 5px;box-shadow: 0px 0px 5px black;">' .'پرداخت شما با موفقیت انجام شد(عدم افزایش اعتبار، لطفا با پشتیبانی تماس بگیرید)'.'<br>کد رهگیری:'. $result->RefID.'</div>';
            }

        } else {
            echo '<div style="background-color: red;color: white;padding: 10px;border-radius: 5px;box-shadow: 0px 0px 5px black;">'.'خطا در پرداخت:' . $result->Status.'</div>';
        }
    } else {
        echo '<div style="background-color: #ffc223;color: white;padding: 10px;border-radius: 5px;box-shadow: 0px 0px 5px black;">' .'انصراف از تراکش توسط کاربر'.'</div>';
    }
}
else
{
    echo '<div style="background-color: red;color: white;padding: 10px;border-radius: 5px;box-shadow: 0px 0px 5px black;">'.'تراکنش نامعتبر'.'</div>';
}
?>
    </div>
</body>
</html>
