var o = document.getElementById('submit');
function ajaxRequest() {
    try {
        var request = new XMLHttpRequest()
    }
    catch (e1) {
        try{
            request = new ActiveXObject("Msxml2.XMLHTTP")
        }
        catch (e2) {
            try {
                request = new ActiveXObject("Microsoft.XMLHTTP")
            }
            catch (e3) {
                request = false
            }
        }
    }
    return request
}
function validate() {
    var y = this.y.value;
    y = y.replace(/,/, ".");
    if (y === "" || isNaN(y)) {document.getElementById("error").textContent = "Y должен быть числом"; return false}
    else if (y<=-5 || y>=3){
        document.getElementById("error").textContent = "Y должен находиться от -3 до 5"; return false
    }
    else {
        document.getElementById("tr-result").style.display = "table-row";
        document.getElementById("error").textContent = "";
        return true;
    }
}
function check() {
    request = new ajaxRequest();
    ajaxY = document.querySelector("input[type=text]").value;
    request.open("GET", "php/ajax.php?y=" + ajaxY, true);
    request.onreadystatechange = function()
    {
        if (this.readyState === 4)
        {
            if (this.status === 200)
            {
                if (this.responseText != null)
                {
                    document.getElementById('error').textContent =
                        this.responseText
                }
                else alert("Ошибка AJAX: Данные не получены ")
            }
            else alert( "Ошибка AJAX: " + this.statusText)
        }
    }
    request.send(null)
}
document.querySelector("form").onsubmit=validate;
let tmr;
document.querySelector("input[type=text]").onkeyup = function() {
    clearTimeout(tmr);
    tmr = setTimeout(check,100);
};