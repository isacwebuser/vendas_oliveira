<?php
session_start();
if(!$_SESSION['desLogin']){
    header('Location: ../index.php');
    exit();
}