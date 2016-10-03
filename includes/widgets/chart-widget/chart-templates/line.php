<?php
/**
 * Created by PhpStorm.
 * User: daitd
 * Date: 9/28/2016
 * Time: 5:40 PM
 */

$chart_title = $instance['title'] ? $instance['title'] : '';
$sheet_title = $instance['range'];
$id = $instance['id'];

$html = '<p>'. $chart_title .'</p>';
$html .= '<canvas id="lineChart" class="chart_loading" data-id="' . $id . '" data-range="' . $sheet_title . '" width="818" height="409"></canvas>';
echo $html;