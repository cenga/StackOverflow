validirajUsername = function () {
    var username = document.getElementsByName("username")[0];

    if (username.value.length < 2) {
        username.style.backgroundColor = "red";
    }
    else {
        username.style.backgroundColor = "white";
    }
}

validirajPw = function () {
    var pw = document.getElementsByName("pw")[0];

    if (pw.value.length < 5) {
        pw.style.backgroundColor = "red";
    }
    else {
        pw.style.backgroundColor = "white";
    }
}

validiraj = function () {
    var username = document.getElementsByName("username")[0]; 
    var pw = document.getElementsByName("pw")[0];

    if (username.value.length < 3) {
        alert("Username mora imati barem 3 karaktera");
        return;
    }
    else if (pw.value.length < 5) {
        alert("Password mora imati barem 3 karaktera");
        return;
    }
}