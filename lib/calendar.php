<?php
$year = isset($_GET['year']) ? $_GET['year'] : date('Y');
$month = isset($_GET['month']) ? $_GET['month'] : date('m');
$date = isset($_GET['date']) ? $_GET['date'] : date('d');
if( ! $date ) $date = '01';
$ymd = $year . "-" . $month . "-" . $date;
$number_of_days = date('t', strtotime($ymd));
$week = date('w', strtotime($year.'-'.$month . '-01')); // 선택된 달의 첫 날의 요일 0~6, 0=Sunday, 6=Saturday
$lastDay = $number_of_days;
$lastWeek = date('w', strtotime($year.'-'.$month . '-' . $lastDay)); // 선택된 달의 마지막 날의 요일 0~6, 0=Sunday, 6=Saturday
$array_of_days = array("","01","02","03","04","05","06","07","08","09","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31");
for($i=($lastDay+1);$i<sizeof($array_of_days);$i++) array_pop($array_of_days);
for($i=0; $i<$week; $i++) array_unshift($array_of_days, '');
if($lastWeek < 6 ) for($i=($lastWeek+1); $i<7; $i++) $array_of_days[] = '';
?>
