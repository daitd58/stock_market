<?php
/**
 * Created by PhpStorm.
 * User: daitd
 * Date: 9/28/2016
 * Time: 5:40 PM
 */

$html = '<div class="nav-tabs">';
$html .= '<a href="#first" class="active">' . $instance['first_chart']['title'] . '</a>';
$html .= '<a href="#second">' . $instance['second_chart']['title'] . '</a>';
$html .= '</div>';
$html .= '<div class="content-tabs">';
$html .= '<div id="first" class="active">';
$html .= '<div id="value"></div>';
$html .= '<div id="first_chart" height="400"></div>';
$html .= '</div>';
$html .= '<div id="second">';
$html .= '<div id="value2"></div>';
$html .= '<div id="second_chart" height="400"></div>';
$html .= '</div></div>';
echo $html;