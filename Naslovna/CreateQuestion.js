validirajNaslov = function () {
    var naslov = document.getElementById("naslov");

    if (naslov.value.length < 3) {
        naslov.style.backgroundColor = "red";
    }
    else {
        naslov.style.backgroundColor = "white";
    }
}
