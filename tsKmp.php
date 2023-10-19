<?php
/**
 * Created by PhpStorm.
 * User: 12271
 * Date: 2021/2/2
 * Time: 9:50
 * Note: tsKmp.php
 */
include "testKMP.php";
$kmp = new testKMP();
$time = microtime(true);
$index = $kmp->contains('abqweweasduwqhsuiahidqwdasc','asc');
$end = microtime(true);
$time1 = microtime(true);
strpos('abqweweasduwqhsuiahidqwdasc','asc');
$end1 = microtime(true);
//var_dump($index);
var_dump($end - $time);
var_dump($end1 - $time1);
