<?php
date_default_timezone_set('Europe/Sarajevo');
validiraj();

function validiraj(){
    if (isset($_POST["novoPitanje"])){

        $url = 'https://restcountries.eu/rest/v1/alpha?codes=';

        if (isset($_POST["title"])){
            $naslov = $_POST["title"];
            if(strlen($naslov) < 3){
                echo '<script language="javascript">';
                echo 'alert("Naslov mora imati najmanje 3 slova")';
                echo '</script>';
                die();
            }
        }
        else{
            die();
        }

        if (isset($_POST["pitanje"])){
            $pitanje = $_POST["pitanje"];
        }
        else{
            die();
        }

        if (isset($_POST["skill"])){
            $skill = $_POST["skill"];
            if(strlen($skill) < 1){
                echo '<script language="javascript">';
                echo 'alert("Skill mora imati najmanje 1 slovo")';
                echo '</script>';
                die();
            }
        }
        else{
            die();
        }

        if (isset($_POST["broj"]))
        {
            $broj = $_POST["broj"];
            if(strlen($broj) < 6)
            {
                echo '<script language="javascript">';
                echo 'alert("Telefonski broj mora imati najmanje 6 znakova")';
                echo '</script>';
                die();
            }
            else if($broj[0] != "+"){
                echo '<script language="javascript">';
                echo 'alert("Neispravan format telefonskog broja")';
                echo '</script>';
                die();
            }
        }
        else{
            die();
        }

        if (isset($_POST["kod"])){
            $kod = $_POST["kod"];
            $response = file_get_contents($url.$kod);
            $podaci = json_decode($response, true);
            foreach($podaci as $data)
            {
                if($data == null){
                    echo '<script language="javascript">';
                    echo 'alert("Nepoznat kod")';
                    echo '</script>';
                    die();
                }
                foreach($data['callingCodes'] as $code)
                {
                    if("+".$code == substr($broj, 0, strlen($code) + 1))
                    {
                        spasiPitanje();
                        die();
                    }
                }
            }
        }
        echo '<script language="javascript">';
        echo 'alert("Kod drzave i broj telefona se ne podudaraju")';
        echo '</script>';
        die();
    }
}

function spasiPitanje(){
    $veza = new PDO("mysql:dbname=spirala4;host=127.3.47.130;charset=utf8", "admin79xADN4", "XnzWJLm_gPwD");
    $veza->exec("set names utf8");
    $komentari = 1;
    if(!$_POST["komentari"])
    {
        $komentari = 0;
    }
    session_start();
    $q = "INSERT INTO vijest SET Naslov='".$_POST["title"]."', Tekst='".$_POST["pitanje"]."',Skill='".$_POST["skill"]."',DozvoljeniKomentari='".$komentari."',FK_user=".$_SESSION['id'].", datum=NOW()";
    $rez = $veza->exec($q);

    if($rez == 0)
    {
        $greska = $veza->errorInfo();
        echo '<script language="javascript">';
        echo 'alert("SQL greška: '.$greska[2].'")';
        echo '</script>';
    }

    echo '<script language="javascript">';
    echo 'alert("Pitanje uspjesno spaseno")';
    echo '</script>';
}
?>