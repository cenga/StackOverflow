validirajNaslov = function () {
    var naslov = document.getElementById("naslov");

    if (naslov.value.length < 3) {
        naslov.style.backgroundColor = "red";
    }
    else {
        naslov.style.backgroundColor = "white";
    }
}

validirajBroj = function () {

    var broj = document.getElementsByName("broj")[0];
    if (broj.value[0] != "+"){
        alert("Neispravan format broja (prvi znak mora biti +)");
        return;
    }
    else if (broj.value.length < 6) {
        alert("Telefonski broj mora imati najmanje 6 znakova!");
        return;
    }

    var kod = document.getElementsByName("kod")[0].value;
    var ajax = new XMLHttpRequest();

    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
            if (ajax.responseText == "[null]") {
                alert("Nepostojeci kod");
                return;
            }

            var indeks = ajax.responseText.indexOf("callingCodes");
            var i = indeks + 16;
            while (ajax.responseText[i] != '"') {
                i = i + 1;
            }
            var pozivni = ajax.responseText.substring(indeks + 16, i);

            if (pozivni != broj.value.substring(1, pozivni.length + 1)) {
                alert("Kod i pozivni broj se ne podudaraju");
                return;
            }
        }
        if (ajax.readyState == 4 && ajax.status == 404) {
            alert("Greska");
        }
    }
    ajax.open("GET", "https://restcountries.eu/rest/v1/alpha?codes=" + kod, true);
    ajax.send();
}