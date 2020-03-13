<?php

//require("file:///C:/wamp64/www/sample/php-composer/vendor/khanamiryan/qrcode-detector-decoder/lib/QrReader.php");
require __DIR__ . "/vendor/autoload.php";
$qrcode = new QrReader('C:/Users/User/Pictures/qrdokimi3.png');
$text = $qrcode->text(); //return decoded text from QR Code
echo $text;
?>