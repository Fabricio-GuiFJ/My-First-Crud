<?php


$string = "2004-05-02";

var_dump($string);
$string = date("d/m/Y",strtotime($string));

var_dump($string);

