<?php

if(!$_SESSION['desLogin']){
    header('Location: ../index2.php');
    exit();
}