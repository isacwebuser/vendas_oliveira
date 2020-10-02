<?php
// include
//require "library/Rain/autoload.php";
require_once "vendor/autoload.php";
// namespace
use Rain\Tpl;

// include
include "vendor/rain/raintpl/library/Rain/Tpl.php";

// conf
$config = array(
    "tpl_dir"   => "templates/",
    "cache_dir" => "cache/",
    "auto_escape" => false,
    "debug"         => true // set to false to improve the speed
);

Tpl::configure( $config );

$tpl = new Tpl;
// assign a variable
$tpl->assign( "name", "Isac Vendas" );
$tpl->assign( "version", PHP_VERSION );
// assign an array
//$tpl->assign( "week", array( "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday" ) );

// draw the template
echo $tpl->draw( "index" );