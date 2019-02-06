<?php
header('Content-Type: text/html; charset=utf-8');
$rpatch = $_SERVER['DOCUMENT_ROOT'].'';
session_start();

require($rpatch."/libs/controller.php");
require($rpatch."/libs/view.php");

require($rpatch."/libs/model.php");
require($rpatch."/libs/database.php");
require($rpatch."/config/database.php");
require($rpatch."/config/define.php");

require($rpatch."/libs/session.php");
require($rpatch."/libs/bootstrap.php");

include_once($rpatch.'/models/tools/http.php');

include_once($rpatch.'/models/tools/tools.php');
include_once($rpatch.'/models/tools/jdf.php');
include_once($rpatch.'/models/tools/message.php');


include_once($rpatch.'/models/tables/tbl_user.php');
include_once($rpatch.'/models/tables/tbl_product.php');
include_once($rpatch.'/models/tables/tbl_category.php');
include_once($rpatch.'/models/tables/tbl_setting.php');
include_once($rpatch.'/models/tables/tbl_sms.php');
include_once($rpatch.'/models/tables/tbl_order.php');
include_once($rpatch.'/models/tables/tbl_orderproducts.php');
include_once($rpatch.'/models/tables/tbl_usertype.php');
include_once($rpatch.'/models/tables/tbl_discount.php');
include_once($rpatch.'/models/tables/tbl_reportbest.php');

include_once($rpatch.'/models/repository/Cart.php');
include_once($rpatch.'/models/repository/user.php');
include_once($rpatch.'/models/repository/product.php');
include_once($rpatch.'/models/repository/category.php');
include_once($rpatch.'/models/repository/setting.php');
include_once($rpatch.'/models/tools/sms.php');
include_once($rpatch.'/models/repository/order.php');
include_once($rpatch.'/models/repository/orderproducts.php');
include_once($rpatch.'/models/repository/usertype.php');
include_once($rpatch.'/models/repository/discount.php');
