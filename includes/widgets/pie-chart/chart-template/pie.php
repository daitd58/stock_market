<?php
/**
 * Created by PhpStorm.
 * User: daitd
 * Date: 12/10/2016
 * Time: 15:44
 */
if ($instance['title'] && $instance['title'] != '')
    $html = '<h3 class="title">' . $instance['title'] . '</h3>';
else
    $html = '';

$html .= '<canvas id="pieChart" width="290" height="435px"></canvas>';
echo $html;