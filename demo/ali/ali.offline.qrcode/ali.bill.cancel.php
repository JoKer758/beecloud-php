<?php
/**
 * Created by PhpStorm.
 * User: dengze
 * Date: 8/3/15
 * Time: 15:22
 */
require_once("../../../loader.php");
$billNo = $_GET["billNo"];
$data = array();
$appSecret = "c37d661d-7e61-49ea-96a5-68c34e83db3b";
$data["app_id"] = "c37d661d-7e61-49ea-96a5-68c34e83db3b";
$data["timestamp"] = time() * 1000;
$data["app_sign"] = md5($data["app_id"] . $data["timestamp"] . $appSecret);
$data["channel"] = "ALI_OFFLINE_QRCODE";
$data["bill_no"] = $billNo;
$data["method"] = "REVERT";


try {
    $result = $api->offline_bill($data);
    if ($result->result_code != 0) {
        echo json_encode($result);
        exit();
    }
    echo json_encode($result);
} catch (Exception $e) {
    echo $e->getMessage();
    exit();
}