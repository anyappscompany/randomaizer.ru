	var h = document.getElementsByClassName("rand-script-icon-home");
var k;
for (k = 0; k < h.length; k++) {
var pattern = GeoPattern.generate(makeid());
    //x[i].style.backgroundImage = pattern.toDataUrl();
    h[k].src = pattern.toDataUri();
}

