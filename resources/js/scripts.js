var start = document.getElementById('dataInicio');
var end = document.getElementById('dataFim');
var botao = document.getElementById('botao');

start.addEventListener('change', function() {
    if (start.value){
        end.min = start.value;
        start.max = end.value;
	}
}, false);
end.addEventListener('change', function() {
    if (end.value){
        end.min = start.value;
        start.max = end.value;
	}
}, false);

botao.addEventListener('click', function() {
    ajaxDate();
}, false);

function ajaxDate() {
    if (start.value == "") {
        // alert("Preencha a data!");
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("table").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","control.php?dataInicio="+start.value,true);
        xmlhttp.send();
    }
}

function ajax(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","getuser.php?q="+str,true);
        xmlhttp.send();
    }
}