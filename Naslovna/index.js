var danasnjiDatum;
var datumi;

seed = function () {
    danasnjiDatum = new Date();
    datumi = [
        new Date(),
        new Date(),
        new Date(danasnjiDatum.getFullYear(), danasnjiDatum.getMonth(), danasnjiDatum.getDate(), 8, 50, 16, 0),
        new Date(danasnjiDatum.getFullYear(), danasnjiDatum.getMonth(), danasnjiDatum.getDate(), 14, 25, 45, 0),
        new Date(danasnjiDatum.getFullYear(), danasnjiDatum.getMonth(), danasnjiDatum.getDate() - 1, 23, 25, 7, 0),
        new Date(danasnjiDatum.getFullYear(), danasnjiDatum.getMonth(), danasnjiDatum.getDate() - 4, 9, 25, 51, 0),
        new Date(danasnjiDatum.getFullYear(), danasnjiDatum.getMonth(), danasnjiDatum.getDate() - 2, 15, 25, 38, 0),
        new Date(danasnjiDatum.getFullYear(), danasnjiDatum.getMonth(), danasnjiDatum.getDate() - 3, 20, 35, 16, 0),
        new Date(danasnjiDatum.getFullYear(), danasnjiDatum.getMonth(), danasnjiDatum.getDate() - 5, 20, 35, 16, 0),
        new Date(danasnjiDatum.getFullYear(), danasnjiDatum.getMonth(), danasnjiDatum.getDate() - 7, 20, 35, 16, 0),
        new Date(danasnjiDatum.getFullYear(), danasnjiDatum.getMonth() - 2, danasnjiDatum.getDate() - 1, 20, 35, 16, 0),
        new Date(danasnjiDatum.getFullYear(), danasnjiDatum.getMonth(), danasnjiDatum.getDate() - 15, 20, 35, 16, 0),
    ];
    ispisiVremenaObjave();
}

Filtriraj = function () {
    var select = document.getElementById("select");
    var filter = select.options[select.selectedIndex].value;

    if (filter == "Sve novosti") {
        prikaziSveNovosti();
    }
    else if (filter == "Danasnje novosti") {
        prikaziDanasnjeNovosti();
    }
    else if (filter == "Novosti ove sedmice") {
        prikaziSedmicneNovosti();
    }
    else if (filter == "Novosti ovog mjeseca") {
        prikaziMjesecneNovosti();
    }
}

prikaziMjesecneNovosti = function () {
    var elementiDatum = document.getElementsByClassName("novost");
    var trenutnoVrijeme = new Date();


    for (var i = 0; i < elementiDatum.length; i++) {

        if (datumi[i].getFullYear() == trenutnoVrijeme.getFullYear() &&
            datumi[i].getMonth() == trenutnoVrijeme.getMonth()) {
            elementiDatum[i].style.display = "inherit";
        }
        else {
            elementiDatum[i].style.display = "none";
        }
    }
}

prikaziSedmicneNovosti = function () {
    var elementiDatum = document.getElementsByClassName("novost");
    var trenutnoVrijeme = new Date();
    var milisekundiOdPocetkaSedmice = (trenutnoVrijeme.getDay() + 1) * 86400000;

    for (var i = 0; i < elementiDatum.length; i++) {
        var milisekundiOdObjave = (datumi[i].getDay() + 1) * 86400000;
          
        if (milisekundiOdPocetkaSedmice >= milisekundiOdObjave) {
            elementiDatum[i].style.display = "inherit";
        }
        else {
            elementiDatum[i].style.display = "none";
        }
    }
}

prikaziDanasnjeNovosti = function () {
    var elementiDatum = document.getElementsByClassName("novost");
    var trenutnoVrijeme = new Date();


    for (var i = 0; i < elementiDatum.length; i++) {

        if (datumi[i].getFullYear() == trenutnoVrijeme.getFullYear() &&
            datumi[i].getMonth() == trenutnoVrijeme.getMonth() &&
            datumi[i].getDate() == trenutnoVrijeme.getDate()) {
            elementiDatum[i].style.display = "inherit";
        }
        else {
            elementiDatum[i].style.display = "none";
        }
    }
}

prikaziSveNovosti = function () {
    var elementiDatum = document.getElementsByClassName("novost");

    for (var i = 0; i < elementiDatum.length; i++) {
        elementiDatum[i].style.display = "inherit";
    }
}

ispisiVremenaObjave = function () {
    var elementiDatum = document.getElementsByClassName("datum");

    for (var i = 0; i < elementiDatum.length; i++) {
        var a =  odrediVrijemeObjave(datumi[i]);
        elementiDatum[i].innerHTML = a;
    }
}

odrediVrijemeObjave = function (date) {
    var trenutnoVrijeme = new Date();

    if (trenutnoVrijeme.getTime() - date.getTime() < 60000) {
        return "Novost objavljena prije par sekundi";
    }
    else if (trenutnoVrijeme.getTime() - date.getTime() < 3600000) { //minuta
        var proteklo = Math.floor((trenutnoVrijeme.getTime() - date.getTime()) / 60000);
        var tekst;

        if (proteklo % 10 == 1 && proteklo != 11) {
            tekst = " minutu";
        }
        else if((proteklo % 10 == 2 || proteklo % 10 == 3 || proteklo % 10 == 2) && !(proteklo > 10 && proteklo < 20)){
            tekst = " minute";
        }
        else {
            tekst = " minuta";
        }

        return "Novost objavljena prije " + String(proteklo) + tekst;
    }
    else if (trenutnoVrijeme.getTime() - date.getTime() < 86400000) { //sati
        var proteklo = Math.floor((trenutnoVrijeme.getTime() - date.getTime()) / 3600000);
        var tekst;

        if (proteklo == 1 || proteklo == 21) {
            tekst = " sat";
        }
        else if ((proteklo >= 2 && proteklo <= 4) || proteklo >= 22) {
            tekst = " sata";
        }
        else {
            tekst = " sati";
        }

        return "Novost objavljena prije " + String(proteklo) + tekst;
    }
    else if (trenutnoVrijeme.getTime() - date.getTime() < 604800000) { //dana
        var proteklo = Math.floor((trenutnoVrijeme.getTime() - date.getTime()) / 86400000);
        var tekst;

        if (proteklo == 1) {
            tekst = " dan";
        }
        else {
            tekst = " dana";
        }

        return "Novost objavljena prije " + String(proteklo) + tekst;
    }
    else if (trenutnoVrijeme.getTime() - date.getTime() < 2592000000) { //sedmica
        var proteklo = Math.floor((trenutnoVrijeme.getTime() - date.getTime()) / 604800000);
        var tekst;

        if (proteklo == 1) {
            tekst = " sedmica";
        }
        else {
            tekst = " sedmice";
        }

        return "Novost objavljena prije " + String(proteklo) + tekst;
    }
    else {
        return String(date.getDate() + "." + date.getMonth() + "." + date.getFullYear() + ".");
    }

}