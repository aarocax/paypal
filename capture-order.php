<?php



$order_id = $_GET["token"];

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://api.sandbox.paypal.com/v2/checkout/orders/'.$order_id.'/capture');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);

$headers = array();
$headers[] = 'Content-Type: application/json';
$headers[] = 'Authorization: Bearer A21AAHrXRJphFY5E7svldhDns_igoYefG_wLImColKDnZCILVclXnP1Edr4J5f_JGsjQubyLT6BmHQKr7WpDDu8iUlhPj8IcA';
$headers[] = 'Paypal-Request-Id: 7b92603e-77ed-4896-8e78-5dea2050476a';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close ($ch);

$response = json_decode($result);

echo ( $response->status === "COMPLETED" ) ? "todo ok" : "ko";
