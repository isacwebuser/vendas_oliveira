<?php

if(!$_SESSION['desLogin']){
    header('Location: ../index.php');
    exit();
}