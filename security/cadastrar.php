<?php
$mail = $_POST["inputEmail"];

$ch = curl_init();


curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array(
    "secret" => "6LdEdNMZAAAAAJfW58xfAk3TvSh-lpJQytKOGvkf",
    "response" => $_POST["g-recaptcha-response"],
    "remoteip" => $_SERVER["REMOTE_ADDR"]
)));

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$recaptcha = json_encode(curl_exec($ch), true);

curl_close($ch);

if ($recaptcha ["sucess"] == true && (isset($_POST["inputEmail"]))){
    echo "Ok: " . $_POST["inputEmail"];
}
else {
    header("Location: captcha.php");
}