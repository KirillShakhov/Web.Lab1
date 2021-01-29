<?php
$s = "$#$";
//если заполнены данные
if(isset($_GET['x']) && isset($_GET['y']) && isset($_GET['r'])){
    $check_array = array("-3", "-2", "-1", "0", "1", "2", "3", "4", "5");
    if(!in_array($_GET['x'], $check_array) || $_GET['x']<-3 || $_GET['x']>5) {
        die("-" . $s . "-" . $s . "-" . $s . '-' . $s . "-" . $s . "Введено неправильное значение X");
    }
    else if($_GET['y']>=5 || $_GET['y']<=-5){
        die("-" . $s . "-" . $s . "-" . $s . '-' . $s . "-" . $s . "Введено неправильное значение Y");
    }
    else if($_GET['r']<=1 || $_GET['r']>=5){
        die("-" . $s . "-" . $s . "-" . $s . '-' . $s . "-" . $s . "Введено неправильное значение R");
    }
    else{
        $result = [];
        $check = 0;
        $start = microtime(true);//начинаем засекать время
        if (
            $_GET['x'] >= 0 && $_GET['x'] <= $_GET['r'] / 2 &&//прямоугольник
            $_GET['y'] >= 0 && $_GET['y'] <= $_GET['r']

            ||

            $_GET['x'] <= 0 && $_GET['y'] <= 0 &&//треугольник
            $_GET['y'] >= -$_GET['x'] - $_GET['r']

            ||

            $_GET['x'] <= 0 && $_GET['y'] >= 0 &&//окруЖность
            $_GET['y'] * $_GET['y'] <= $_GET['r'] / 2 * $_GET['r'] / 2 - $_GET['x'] * $_GET['x']
        ) {
            $check = 1;
        }
        $time = number_format(microtime(true) - $start, 6);//сколько прошло времени с начала работы скрипта
        $dt = new DateTime("now", new DateTimeZone('Europe/Moscow'));//текущее время

        $result_array = array($_GET['x'], $_GET['y'], $_GET['r'], $dt->format('H:i:s'), $time, $check);
        session_start();
        if (!isset($_SESSION['results'])) {
            $_SESSION['results'] = array();
        }
        array_push($_SESSION['results'], $result_array);
        $s = "$#$";
        die($_GET['x'] . $s . $_GET['y'] . $s . $_GET['r'] . $s . $dt->format('H:i:s') . $s . $time . $s . $check);
    }
}
