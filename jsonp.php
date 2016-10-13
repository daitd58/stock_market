<?php
/**
 * Created by PhpStorm.
 * User: daitd
 * Date: 11/10/2016
 * Time: 16:55
 */

header("content-type: application/json");

$file_name = $_GET['filename'];
$content = file_get_contents($file_name);

echo $_GET['callback']. '('. $content . ')';