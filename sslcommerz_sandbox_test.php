<?php
// Minimal cURL test for SSLCommerz sandbox credentials

$post_data = array();
$post_data['store_id'] = 'testbox';
$post_data['store_passwd'] = 'qwerty';
$post_data['total_amount'] = 10;
$post_data['currency'] = "BDT";
$post_data['tran_id'] = uniqid();
$post_data['success_url'] = 'https://example.com/success';
$post_data['fail_url'] = 'https://example.com/fail';
$post_data['cancel_url'] = 'https://example.com/cancel';
$post_data['emi_option'] = 0;
$post_data['cus_name'] = 'Test Customer';
$post_data['cus_email'] = 'test@example.com';
$post_data['cus_add1'] = 'Dhaka';
$post_data['cus_phone'] = '01711111111';
$post_data['shipping_method'] = 'NO';
$post_data['product_name'] = 'Test Payment';
$post_data['product_category'] = 'Test';
$post_data['product_profile'] = 'general';

$api_url = "https://sandbox.sslcommerz.com/gwprocess/v4/api.php";

$handle = curl_init($api_url);
curl_setopt($handle, CURLOPT_TIMEOUT, 30);
curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_POST, true);
curl_setopt($handle, CURLOPT_POSTFIELDS, http_build_query($post_data));
curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);

$content = curl_exec($handle);
$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

if ($code == 200 && !(curl_errno($handle))) {
    $response = json_decode($content, true);
    print_r($response);
} else {
    echo "Failed to connect to SSLCommerz sandbox API.";
}
