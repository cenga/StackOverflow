<?php
session_start();
if (!isset($_SESSION["korisnikPrijavljen"])){
    $_SESSION["korisnikPrijavljen"] = false;
}

$action = "";

if (isset($_POST["aktivno"])){
    $action = $_POST["aktivno"];
}

if ($action == "login"){
    login();
}

if ($action == "logout"){
    session_destroy();
    $_SESSION["korisnikPrijavljen"] = false;
}

function login(){
    $podaci = file("LoginData.txt");
    foreach($podaci as $red)
    {
        $zarez = strpos($red, ",", 0);
        $username = trim(substr($red, 0, $zarez));
        $password = trim(substr($red, $zarez+1));
        if (isset($_POST["user"]) && isset($_POST["password"]) )
        {
            if ($_POST["user"] == $username && md5($_POST["password"]) == $password)
            {
                $_SESSION["korisnikPrijavljen"] = true;
                echo '<script language="javascript">';
                echo 'alert("Uspjesno ste logovani")';
                echo '</script>';
                return;
            }
        }

    }
    echo '<script language="javascript">';
    echo 'alert("Pogresan username ili password")';
    echo '</script>';
}
?>