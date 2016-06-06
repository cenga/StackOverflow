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
    $_SESSION['id'] = -1;
}

function login(){
    $veza = new PDO("mysql:dbname=spirala4;host=127.3.47.130;charset=utf8", "admin79xADN4", "XnzWJLm_gPwD");
    $veza->exec("set names utf8");
    $podaci = $veza->query("select id, username, password from user");
    foreach($podaci as $red)
    {
        $username = $red['username'];
        $password = $red['password'];
        if (isset($_POST["user"]) && isset($_POST["password"]) )
        {
            if ($_POST["user"] == $username && md5($_POST["password"]) == $password)
            {
                $_SESSION["korisnikPrijavljen"] = true;
                $_SESSION['id'] = $red['id'];
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