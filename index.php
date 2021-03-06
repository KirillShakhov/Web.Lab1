<!DOCTYPE html>
<html lang="ru" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Лабораторная работа по Web-программированию №1</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
<table>
    <tr>
        <th id="header" height="10%">
            <h2>Шахов Кирилл Андреевич<br> Группа P3232 <br> Вариант: <i>2823</i></h2>
        </th>
        <td id="td-task" rowspan="3">
            <ul id="task">
                <h3>Разработанная HTML-страница должна удовлетворять следующим требованиям:</h3>
                <li>Для расположения текстовых и графических элементов необходимо использовать табличную верстку.</li>
                <li>Данные формы должны передаваться на обработку посредством GET-запроса.</li>
                <li>Таблицы стилей должны располагаться в отдельных файлах.</li>
                <li>При работе с CSS должно быть продемонстрировано использование селекторов идентификаторов, селекторов псевдоклассов, селекторов классов, селекторов потомств а также такие свойства стилей CSS, как наследование и каскадирование.</li>
                <li>HTML-страница должна иметь "шапку", содержащую ФИО студента, номер группы и новер варианта. При оформлении шапки необходимо явным образом задать шрифт (serif), его цвет и размер в каскадной таблице стилей.</li>
                <li>Отступы элементов ввода должны задаваться в пикселях.</li>
                <li>Страница должна содержать сценарий на языке JavaScript, осуществляющий валидацию значений, вводимых пользователем в поля формы. Любые некорректные значения (например, буквы в координатах точки или отрицательный радиус) должны блокироваться.</li>
            </ul>
            <img src="img/pic.png" id="info-pic" alt="img/pic.png">
        </td>
    </tr>
    <tr>
        <td id="buttons">
            <form></form>
            <form id="1" action="" onsubmit="execute();return false;">
                <label>Выберите X:</label>
                <input class="radio_button" type="radio" checked="checked" name="x" value="-4">-4
                <input class="radio_button" type="radio" name="x" value="-3">-3
                <input class="radio_button" type="radio" name="x" value="-2">-2
                <input class="radio_button" type="radio" name="x" value="-1">-1
                <input class="radio_button" type="radio" name="x" value="0">0
                <input class="radio_button" type="radio" name="x" value="1">1
                <input class="radio_button" type="radio" name="x" value="2">2
                <input class="radio_button" type="radio" name="x" value="3">3
                <input class="radio_button" type="radio" name="x" value="4">4
                <br>
                <br>
                <label>Введите Y:</label>
                <input type="text" id="input_text" placeholder="-5..3" name="y">
                <span id="error"></span>
                <br>
                <br>
                <label>Выберите R:</label>
                <select name="r" id="select_r">
                    <option value="1">1</option>
                    <option value="1.5">1.5</option>
                    <option value="2">2</option>
                    <option value="2.5">2.5</option>
                    <option value="3">3</option>
                </select>
                <br>
                <br>
                <input type="submit" name="submit" id="submit" class="submit" value="Добавить" tabindex="4" :disabled="isButtonDisabled"/>
            </form>
        </td>
    </tr>
    <tr id="tr-result">
        <td rowspan="2">
            <table id="result-table" class="sortable" width="650" border="0" cellspacing="4" cellpadding="4" align="center">
                <thead>
                <tr>
                    <th scope="col">XYR</th>
                    <th scope="col">Результат</th>
                    <th scope="col">Current Time</th>
                    <th scope="col">Computation Time</th>
                </tr>
                </thead>
                <tbody id="results_table_body">
                <!--<tr id="no_result"><th colspan="4">Нет результатов</th></tr>-->
                <?php
                session_start();
                if (isset($_SESSION['results'])) {
                    foreach ($_SESSION['results'] as $result) { ?>
                        <tr>
                            <th><?php echo $result[0] ?></th>
                            <th><?php echo $result[1] ?></th>
                            <th><?php echo $result[2] ?></th>
                            <th><?php echo $result[3] ?></th>
                        </tr>
                    <?php }} ?>
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td id="footer" height="10%">
            г. Санкт-Петербург<br>
            2020 г.
        </td>
    </tr>
</table>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="./js/table.js"></script>
<script type="text/javascript" src="js/ajax.js"></script>
</body>
</html>