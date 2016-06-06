<?php

if(isset($_POST["name"]) && isset($_POST["username"]) && isset($_POST["pass"]))
    spasiAutora();

function spasiAutora()
{
     $veza = new PDO("mysql:dbname=spirala4;host=127.3.47.130;charset=utf8", "admin79xADN4", "XnzWJLm_gPwD");
     $veza->exec("set names utf8");
     $upit = $veza->prepare("SELECT username from user WHERE username=?");
     $upit->execute(array($_POST["username"]));

     if($upit->fetch() != null)
     {
         echo '<script language="javascript">';
         echo 'alert("Username vec postoji")';
         echo '</script>';
         return;
     }

     $q = "INSERT INTO user SET Ime='".$_POST["name"]."', username='".$_POST["username"]."',password='".md5($_POST["pass"])."';";
     $rez = $veza->exec($q);

     if($rez == 0)
     {
         $greska = $veza->errorInfo();
         echo '<script language="javascript">';
         echo 'alert("SQL greška: '.$greska[2].'")';
         echo '</script>';
     }

     echo '<script language="javascript">';
     echo 'alert("Autor uspjesno spasen!")';
     echo '</script>';

}
?>