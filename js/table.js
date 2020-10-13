let d = document;
let X, Y, R;
let result;
let result_array;
let first = true;

function execute()
{
    let inp = document.getElementsByName('x');
    for (let i = 0; i < inp.length; i++) {
        if (inp[i].type === "radio" && inp[i].checked) {
            X = inp[i].value;
        }
    }
    Y = d.getElementById('input_text').value;
    R = d.getElementById('select_r').value;

    $.get('./php/work.php', {x: X, y:Y, r: R}, function(data) {
        result = data; // ответ от сервера
        let array;
        array = result.split("#");
        add_row(array[0], array[1], array[2], array[3]);
    })
}
function add_row(xyr, result, current_time, computation_time){
    if(result === undefined){
        alert(xyr);
    }
    else {
        // Находим нужную таблицу
        let tbody = d.getElementById('result-table').getElementsByTagName('TBODY')[0];
        // Создаем строку таблицы и добавляем ее
        let row = d.createElement("TR");
        tbody.appendChild(row);

        //if (first) {
        //    first = false;
        //    d.getElementById("no_result").remove();
        //}


        // Создаем ячейки в вышесозданной строке
        // и добавляем тх
        let td1 = d.createElement("TH");
        let td2 = d.createElement("TH");
        let td3 = d.createElement("TH");
        let td4 = d.createElement("TH");

        row.appendChild(td1);
        row.appendChild(td2);
        row.appendChild(td3);
        row.appendChild(td4);

        // Наполняем ячейки
        td1.innerHTML = xyr;
        td2.innerHTML = result;
        td3.innerHTML = current_time;
        td4.innerHTML = computation_time;
    }
}