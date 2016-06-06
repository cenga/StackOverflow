validirajIme = function () {

    var ime = document.getElementById("ime");

    if (ime.value.length < 2) {
        ime.style.backgroundColor = "red";
        return false;
    }
    else {
        ime.style.backgroundColor = "white";
        return true;
    }
}

validirajPw = function () {
    var pw = document.getElementById("pw");
    var cpw = document.getElementById("cpw");
    var vrijednost = false;

    if (pw.value.length < 2) {
        pw.style.backgroundColor = "red";
        vrijednost = false;
    }
    else {
        pw.style.backgroundColor = "white";
        vrijednost = true;
    }

    if (pw.value != cpw.value) {
        cpw.style.backgroundColor = "red";
        vrijednost = false;
    }
    else{
        cpw.style.backgroundColor = "white";
        vrijednost = true;
    }

    return vrijednost;
}

validirajCpw = function () {
    var pw = document.getElementById("pw");
    var cpw = document.getElementById("cpw");
    var vrijednost = false;

    if (cpw.value.length < 2) {
        cpw.style.backgroundColor = "red";
        vrijednost = false;
    }
    else {
        cpw.style.backgroundColor = "white";
        vrijednost = true;
    }

    if (pw.value != cpw.value) {
        cpw.style.backgroundColor = "red";     
        vrijednost = false;
    }
    else {
        cpw.style.backgroundColor = "white";
        vrijednost = true;
    }

    return vrijednost;
}

validiraj = function(){
    var ime = document.getElementById("ime");
    var email = document.getElementById("email");
    var pw = document.getElementById("pw");
    var cpw = document.getElementById("cpw");

    if (validirajIme() == false)
        alert("Ime mora imati barem 2 karaktera");
    else if (validirajEmail() == false)
        alert("Neispravan mail");
    else if (validirajPw() == false)
        alert("Neispravan password");
    else if (validirajCpw() == false)
        alert("Neispravan password");
}