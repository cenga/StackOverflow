validiraj = function () {
    var pass = document.getElementById("pw").value;
    var cpw = document.getElementById("cpw").value;

    if(pass != cpw)
    {
        alert("Passwordi nisu isti");
        return false;
    }

    return true;
}