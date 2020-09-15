var d = document;

var X;
var Y;
var R;

var test  = 'asd';

function addRow()
{
    $.get("work.php", {test:test},
        function(data){
            $('#content').html(data);
        }
    );
    // Считываем значения с формы
    //X = d.getElementsByName('x').value;
    Y = d.getElementById('input_text').value;
    R = d.getElementById('select_r').value;

    // Находим нужную таблицу
    var tbody = d.getElementById('result-table').getElementsByTagName('TBODY')[0];

    // Создаем строку таблицы и добавляем ее
    var row = d.createElement("TR");
    tbody.appendChild(row);

    // Создаем ячейки в вышесозданной строке
    // и добавляем тх
    var td1 = d.createElement("TD");
    var td2 = d.createElement("TD");
    var td3 = d.createElement("TD");
    var td4 = d.createElement("TD");

    row.appendChild(td1);
    row.appendChild(td2);
    row.appendChild(td3);
    row.appendChild(td4);

    // Наполняем ячейки
    td1.innerHTML = test;
    td2.innerHTML = Y;
    td3.innerHTML = R;
    td4.innerHTML = R;
}