<?php
$email = filter_input(INPUT_POST, 'emailGoogle', FILTER_SANITIZE_STRING);
echo $email;exit;
if(!$_SESSION['desLogin']){
    header('Location: ../index.php');
    exit();
}