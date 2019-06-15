<?php
require_once 'api_interface.php';
require_once 'db_operation.php';

/**
 * generate unique trx_id
 *
 */
function generateTrxId($length) {
	return substr(str_shuffle("0123456789"), 0, $length);
}

/**
 * pretty print JSON data
 *
 */
$interface = new ApiInterface();
$params['trx_date'] = date("YmdHis");
$params['trx_id'] = generateTrxId(10);
$params['trx_type'] = '2100'; // 2100 = Inquiry, 2200 = Payment
$params['cust_msisdn'] = '';
$params['cust_account_no'] = '212100089886';
$params['product_id'] = '100';
$params['product_nomination'] = '';
$params['periode_payment'] = '';
$params['unsold'] = '';
$input = json_encode($params, true);


$request_date = date('Y-m-d H:i:s');
$output = $interface->hitApi($params);
$response_date = date('Y-m-d H:i:s');


$parse = json_decode($output, true);
$data = $parse['data']['trx'];
$rc = $data['rc'];

print_r($output);
?>