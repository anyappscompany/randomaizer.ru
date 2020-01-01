function getXmlHttp(){
  var xmlhttp;
  try {
    xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
  } catch (e) {
    try {
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    } catch (E) {
      xmlhttp = false;
    }
  }
  if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
    xmlhttp = new XMLHttpRequest();
  }
  return xmlhttp;
}

function makeid() {
  var text = "";
  var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

  for (var i = 0; i < 10; i++)
    text += possible.charAt(Math.floor(Math.random() * possible.length));

  return text;
}
function create(sn){
	// (1) создать объект для запроса к серверу
	var req = getXmlHttp();

        // (2)
	// span рядом с кнопкой
	// в нем будем отображать ход выполнения
	//var statusElem = document.getElementById('response');

    switch (sn) {
  case 'generator-yaponskih-imen-i-familiy':{
        var gen_result = document.getElementById('gen-result');
        var name_input = document.getElementById('name-input');
        var surname_input = document.getElementById('surname-input');
        var gender_select = document.getElementById('gender-select');

        //var name_input = document.getElementById('name-input');
        //var surname_input = document.getElementById('surname-input');
        if(name_input.checked!=true && surname_input.checked!=true) return false;

        var name = 0;
        var surname = 0;
        var gender = "all";
        if(name_input.checked){
            name = 1;
        }
        if(surname_input.checked){
            surname = 1;
        }
        gender = gender_select.options[gender_select.selectedIndex].value;
        // (3) задать адрес подключения
        
	    req.open('GET', '/scripts/script.php?sn='+sn+'&name='+name+'&surname='+surname+'&gender='+gender + '&rnd='+makeid(), true);
        break;
    }
  case 'generator-japonskih-nikov':{
        var gen_result = document.getElementById('gen-result');
        //var name_input = document.getElementById('name-input');
        //var surname_input = document.getElementById('surname-input');
        var gender_select = document.getElementById('gender-select');

        //var name_input = document.getElementById('name-input');
        //var surname_input = document.getElementById('surname-input');
        //if(name_input.checked!=true && surname_input.checked!=true) return false;

        //var name = 0;
        //var surname = 0;
        var gender = "all";

        gender = gender_select.options[gender_select.selectedIndex].value;
        // (3) задать адрес подключения
        
	    req.open('GET', '/scripts/script.php?sn='+sn+'&name=1&surname=1&gender='+gender + '&rnd='+makeid(), true);
        break;
    }
  case 'generator-angliyskih-imen-i-familiy':{
        var gen_result = document.getElementById('gen-result');
        var name_input = document.getElementById('name-input');
        var surname_input = document.getElementById('surname-input');
        var gender_select = document.getElementById('gender-select');

        //var name_input = document.getElementById('name-input');
        //var surname_input = document.getElementById('surname-input');
        if(name_input.checked!=true && surname_input.checked!=true) return false;

        var name = 0;
        var surname = 0;
        var gender = "all";
        if(name_input.checked){
            name = 1;
        }
        if(surname_input.checked){
            surname = 1;
        }
        gender = gender_select.options[gender_select.selectedIndex].value;
        // (3) задать адрес подключения

	    req.open('GET', '/scripts/script.php?sn='+sn+'&name='+name+'&surname='+surname+'&gender='+gender + '&rnd='+makeid(), true);
        break;
    }
  default:
    //alert( 'Я таких значений не знаю' );
    break;
}



    req.onreadystatechange = function() {
        // onreadystatechange активируется при получении ответа сервера

		if (req.readyState == 4) {
            // если запрос закончил выполняться

			//statusElem.innerHTML = req.statusText // показать статус (Not Found, ОК..)

			if(req.status == 200) {
                 // если статус 200 (ОК) - выдать ответ пользователю
                //if(req.responseText.length<=0) return false;
				gen_result.value = req.responseText;
                refresh_history(req.responseText);
			}
			// тут можно добавить else с обработкой ошибок запроса
		}

	}



	// объект запроса подготовлен: указан адрес и создана функция onreadystatechange
	// для обработки ответа сервера

        // (4)
	req.send(null);  // отослать запрос

        // (5)
	gen_result.value = 'Сервер занят обработкой входных данных...';


}

function copy_to_clipboard_result(){
    var el = document.getElementById("gen-result");
    el.select();

    document.execCommand("copy");
}

window.onload = function(){
    (function(){
        //var date = new Date(), div = document.getElementsByTagName('div');
        var date = new Date();
        var datecont = document.getElementById('curdata');

        //div[0].innerHTML = date.getHours()+':'+date.getMinutes()+':'+date.getSeconds()+':'+date.getMilliseconds();
        //div[1].innerHTML = new Date().setTime(new Date(date).getTime());
        var date=new Date();
        var weekday=new Array(7);
        weekday[0]="воскресенье";
        weekday[1]="понедельник";
        weekday[2]="вторник";
        weekday[3]="среда";
        weekday[4]="четверг";
        weekday[5]="пятница";
        weekday[6]="суббота";

        var month=new Array(12);
        month[0]="января";
        month[1]="февраля";
        month[2]="марта";
        month[3]="апреля";
        month[4]="мая";
        month[5]="июня";
        month[6]="июля";
        month[7]="августа";
        month[8]="сентября";
        month[9]="октября";
        month[10]="ноября";
        month[11]="декабря";

        datecont.innerHTML = "Сегодня " + weekday[date.getDay()] + ", " + date.getDate() + " " + month[date.getMonth()] + " " + date.getFullYear() + " года<br />Текущее время:" + ("0" + date.getHours()).slice(-2)+':'+((date.getMinutes()<10?'0':'')+ date.getMinutes())+':'+((date.getSeconds()<10?'0':'')+ date.getSeconds())+':'+date.getMilliseconds();
        window.setTimeout(arguments.callee, 1);
    })();
};



