<?php

try {

    throw new Exception("Error Processing Request.",1);

}catch (Exception $e){
    die($e->getMessage());
}