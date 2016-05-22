var danasnjiDatum;
var datumi;


seed = function () {
    danasnjiDatum = new Date();
    datumi = [];
    var novosti = document.getElementsByClassName('datum');
    
    for (var i = 0; i < novosti.length; i++) {
        novosti[i].style.display = 'inherit';
        var datum = novosti[i].innerHTML;
        var godina = datum.substring(0, 4);
        var mjesec = Number(datum.substring(5, 7));
        var dan = datum.substring(8, 10);
        var sat = datum.substring(11, 13);
        var minuta = datum.substring(14, 16);
        var sekunda = datum.substring(17, 19);
        datumi.push(new Date(godina, mjesec-1, dan, sat, minuta, sekunda, 0)); 
    }


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
        return String(date.getDate() + "." + String(Number(date.getMonth() + 1)) + "." + date.getFullYear() + ".");
    }

}