	var p = document.getElementsByClassName("page-form-bg");
var i;
for (i = 0; i < p.length; i++) {
var pattern = GeoPattern.generate(makeid());
    //x[i].style.backgroundImage = pattern.toDataUrl();
    p[i].style.backgroundImage = pattern.toDataUrl();
}

