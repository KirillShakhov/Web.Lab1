<?php
$start = microtime(true);
if (isset($_GET['x'])) $x = $_GET['x'];
if (isset($_GET['y'])) $y = $_GET['y'];
if (isset($_GET['r'])) $r = $_GET['r'];
$check = false;
$fail = "";
$y = preg_replace("/,/", ".", $y);
if (!(is_numeric($x))) $fail .= "Некорректное значение X\n";
elseif ($y<-5 || $y>3 || !is_numeric($y)) $fail .= "Некорректное значение Y\n";
elseif (!is_numeric($r) || $r < 0) $fail .= "Некорректное значение R";
if ($fail != "") die($fail);
if ($x>=0 && $x<=$r/2 && $y<=0 && $y>=-$r) $check=true;
elseif ($x<=0 && $y<=0 && $y>=-($x+$r)/2) $check=true;
elseif ($x<=0 && $y>=0 && $y<=sqrt($r*$r - $x*$x)) $check=true;
$time = number_format(microtime(true)-$start,6);
$dt = new DateTime("now", new DateTimeZone('Europe/Moscow'));

if ($check){
    //echo "<tr><th scope=\"col\">" . $x . "; " . $y . "; " . $r . "</th><th scope=\"col\">лежит в заданной области</th><th scope=\"col\">" . $dt->format('H:i:s') . "</th><th scope=\"col\">" . $time . "</th></tr>";
    echo $x . "; " . $y . "; " . $r . "#true#" . $dt->format('H:i:s') . "#" . $time;
}
else {
    //echo "<div style=\"text-align: center;\"><b>Результат:</b><br>Точка (" . $x . "; " . $y . ") при r = " . $r . " не лежит в заданной области<br>Текущее время: " . $dt->format('H:i:s'). "<br> Время выполнения скрипта: ". $time . " с</div>";
    echo $x . "; " . $y . "; " . $r . "#false#" . $dt->format('H:i:s') . "#" . $time;
}

