<?php

include "prepare-order.php";
include "config.php";

// get token
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.sandbox.paypal.com/v1/oauth2/token');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_USERPWD, CLIENTID . ':' . CLIENTSECRET);

$headers = array();
$headers[] = 'Accept: application/json';
$headers[] = 'Accept-Language: en_US';
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
  echo 'Error:' . curl_error($ch);
}
curl_close ($ch);

$response = json_decode($result);

var_dump($response->scope);
echo "<br><br>";
var_dump($response->access_token);
echo "<br><br>";
var_dump($response->token_type);
echo "<br><br>";
var_dump($response->app_id);
echo "<br><br>";
var_dump($response->expires_in);
echo "<br><br>";
var_dump($response->nonce);
echo "<br><br>";

// Create order


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.sandbox.paypal.com/v2/checkout/orders/');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, getOrder());
curl_setopt($ch, CURLOPT_POST, 1);

$headers = array();
$headers[] = 'Accept: application/json';
$headers[] = 'Content-Type: application/json';
$headers[] = 'Accept-Language: es_ES';
$headers[] = 'Authorization: Bearer '.$response->access_token;
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close ($ch);

$response = json_decode($result);

echo "Create Order --------------------<br>";

echo "order ID: ".$response->id;
echo "<br><br>";
var_dump($response->links[1]->href);
echo "<br><br>";
var_dump($response->status);
echo "<br><br>";

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>

  <a href="<?php echo $response->links[1]->href ?>" title="">Pagar...</a>	
 
</script>
</body>
</html>
