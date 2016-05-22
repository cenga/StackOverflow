<?php

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
    $datoteka = "Pitanja.csv";
    $podaci = file($datoteka);
    $naslov = str_replace(",", "&#44", $_POST["title"]);
    $pitanje = str_replace(",", "&#44", $_POST["pitanje"]);
    $skill = str_replace(",", "&#44", $_POST["skill"]);

    $noviRed = htmlentities($naslov.", ".$pitanje.", ".$skill.",".date('Y.m.d H:i:s')."\n", ENT_QUOTES);
    array_push($podaci, $noviRed);
    file_put_contents($datoteka, $podaci);

    echo '<script language="javascript">';
    echo 'alert("Pitanje uspjesno spaseno")';
    echo '</script>';
}
?>