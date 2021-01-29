<!DOCTYPE html>
<html lang="en">
<head>
    <title>Table</title>
    <link rel="stylesheet" href="style.css">
    <!-- import jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- import js -->
    <script src="functions.js"></script>
</head>
<body>
    <header>
        <p class="studentName">Сухняк Данила Дмитриевич</p>
        <p class="groupNumber">Группа P3232</p>
        <p class="optionNumber">Вариант 2816</p>
    </header>
    <div class="content">
        <img id = "image" src="src/area.png" alt="Задание" width="500px">
        <form id="myForm" action="GET">
            <div class="insideForm x">
                <label>Выберите X:</label>
                <input class="checkbox" type="radio" checked="checked" name="x" value="-3">-3
                <input class="checkbox" type="radio" name="x" value="-2">-2
                <input class="checkbox" type="radio" name="x" value="-1">-1
                <input class="checkbox" type="radio" name="x" value="0">0
                <input class="checkbox" type="radio" name="x" value="1">1
                <input class="checkbox" type="radio" name="x" value="2">2
                <input class="checkbox" type="radio" name="x" value="3">3
                <input class="checkbox" type="radio" name="x" value="4">4
                <input class="checkbox" type="radio" name="x" value="5">5
            </div>
            <div class="insideForm y">    
                <label>Введите Y:</label>
                <input type="text" id="inputY" placeholder="-5..5" name="y">
            </div>

            <div class="insideForm r">
                <label>Введите R:</label>
                <input type="text" id="inputR" placeholder="1..4" name="r">
            </div>

            <input type="submit" name="submit" id="submit" class="submit" value="Добавить" tabindex="4" :disabled="isButtonDisabled"/>
        </form>
        <?php
        if(array_key_exists('clean',$_GET)){
            session_start();
            session_destroy();
            header('Location: https://se.ifmo.ru/~s284187/index.php');
        }
        ?>
        <form id="myForm2" method="get" action="">
            <input type="submit" name="clean" id="clean" value="Очистить"/>
        </form>
        <br>
        <table id="result-table">
            <thead>
            <tr>
                <th>X</th>
                <th>Y</th>
                <th>R</th>
                <th>Current time</th>
                <th>Execution time</th>
                <th>Result</th>
            </tr>
            </thead>
            <tbody id="results_table_body">
            <?php
            session_start();
            if (isset($_SESSION['results'])) {
                foreach ($_SESSION['results'] as $result) { ?>
                    <tr>
                        <th><?php echo $result[0] ?></th>
                        <th><?php echo $result[1] ?></th>
                        <th><?php echo $result[2] ?></th>
                        <th><?php echo $result[3] ?></th>
                        <th><?php echo $result[4] ?></th>
                        <th><?php echo $result[5] ?></th>
                    </tr>
                <?php }} ?>
            </tbody>
        </table>

    </div>
</body>
</html>