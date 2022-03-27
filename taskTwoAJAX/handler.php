<?php
include_once(__DIR__.'/objectXML.php');

if ($_POST['currency'] && $_POST['amount']) {
    $currency = $_POST['currency'];
    $amountCurrency = $_POST['amount'];
    foreach ($arrCurrency as $arr) {
        if (in_array($currency, $arr, true)) {
            $arr[0] = preg_replace('/,/', '.', $arr[0]);
            $int = (float)$arr[0] * ($amountCurrency / $arr[2]);
        }
    }
}
header('Content-Type: application/json');
echo json_encode($int);
