<?php
if(isset($_POST["stari"]))
    izmjeniPassword();

function izmjeniPassword()
{
    include 'LoginKod.php';
    $veza = new PDO("mysql:dbname=spirala4;host=127.3.47.130;charset=utf8", "admin79xADN4", "XnzWJLm_gPwD");
    $veza->exec("set names utf8");
    //session_start();
    $u = $veza->query("SELECT * from user WHERE Id='".$_SESSION['id']."'");
    $user = $u->fetch();

    if($user["password"] != md5($_POST["stari"]))
    {
        echo '<script language="javascript">';
        echo 'alert("Password koji ste unijeli kao stari nije ispravan!")';
        echo '</script>';
        return;
    }
    if($_POST["cnovi"] != $_POST["novi"])
    {
        echo '<script language="javascript">';
        echo 'alert("Novi passwordi se razlikuju!")';
        echo '</script>';
        return;
    }

    $rez = $veza->query("UPDATE user SET Password='".md5($_POST["novi"])."' WHERE Id='".$_SESSION['id']."'");

    if(!$rez)
    {
        $greska = $veza->errorInfo();
        echo '<script language="javascript">';
        echo 'alert("SQL greška: '.$greska[2].'")';
        echo '</script>';
        //include 'IzmjenaPassworda.php';
        return;
    }

    echo '<script language="javascript">';
    echo 'alert("Password uspjesno izmijenjen")';
    echo '</script>';
    //include 'index.php';
}
?>