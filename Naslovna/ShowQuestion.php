<?php
if(isset($_POST["odgovor"]))
    dodajOdgovor();
elseif(isset($_POST["komentar"]))
    dodajKomentar();
elseif(isset($_POST["brisanjeNovosti"]))
    obrisiVijest();
elseif(isset($_POST["brisanjeOdgovora"]))
    obrisiOdgovor();
elseif(isset($_POST["brisanjeKomentara"]))
    obrisiKomentar();
elseif(isset($_POST["komentarisanje"]))
    omoguciKomentarisanje();
elseif(isset($_POST["id"]))
    prikaziPitanje($_POST["id"]);

function omoguciKomentarisanje()
{
    $veza = new PDO("mysql:dbname=spirala4;host=127.3.47.130;charset=utf8", "admin79xADN4", "XnzWJLm_gPwD");
    $veza->exec("set names utf8");
    $pitanje = $veza->query("SELECT DozvoljeniKomentari FROM vijest WHERE Id='".$_POST["komentarisanje"]."'");
    $p = $pitanje->fetch();
    $vrijednost = 0;
    if($p["DozvoljeniKomentari"] == 0)
        $vrijednost = 1;

    $rez = $veza->query("UPDATE vijest SET DozvoljeniKomentari='".$vrijednost."' WHERE Id='".$_POST["komentarisanje"]."'");

    if(!$rez)
    {
        $greska = $veza->errorInfo();
        echo '<script language="javascript">';
        echo 'alert("SQL greška: '.$greska[2].'")';
        echo '</script>';
        return;
    }

    echo '<script language="javascript">';
    echo 'alert("Izmjena uspjesna")';
    echo '</script>';
    prikaziPitanje($_POST["komentarisanje"]);
}

function obrisiKomentar()
{
    $veza = new PDO("mysql:dbname=spirala4;host=127.3.47.130;charset=utf8", "admin79xADN4", "XnzWJLm_gPwD");
    $veza->exec("set names utf8");
    $rez = $veza->exec("DELETE from komentar WHERE Id = '".$_POST["brisanjeKomentara"]."'");

    if($rez != 1)
    {
        $greska = $veza->errorInfo();
        echo '<script language="javascript">';
        echo 'alert("SQL greška: '.$greska[2].'")';
        echo '</script>';
        return;
    }

    echo '<script language="javascript">';
    echo 'alert("Komentar uspjesno obrisan")';
    echo '</script>';

    prikaziPitanje($_POST["pitanje"]);
}

function obrisiOdgovor()
{
    $veza = new PDO("mysql:dbname=spirala4;host=127.3.47.130;charset=utf8", "admin79xADN4", "XnzWJLm_gPwD");
    $veza->exec("set names utf8");

    $pitanje = $veza->query("SELECT FK_vijest FROM odgovor WHERE id='".$_POST["brisanjeOdgovora"]."'");
    $p = $pitanje->fetch();

    $rez = $veza->exec("DELETE from odgovor WHERE Id = '".$_POST["brisanjeOdgovora"]."'");

    if($rez != 1)
    {
        $greska = $veza->errorInfo();
        echo '<script language="javascript">';
        echo 'alert("SQL greška: '.$greska[2].'")';
        echo '</script>';
        return;
    }

    echo '<script language="javascript">';
    echo 'alert("Odgovor uspjesno obrisan")';
    echo '</script>';

    prikaziPitanje($p["FK_vijest"]);
}

function obrisiVijest()
{
    $veza = new PDO("mysql:dbname=spirala4;host=127.3.47.130;charset=utf8", "admin79xADN4", "XnzWJLm_gPwD");
    $veza->exec("set names utf8");
    $rez = $veza->exec("DELETE from vijest WHERE Id = '".$_POST["brisanjeNovosti"]."'");

    if($rez != 1)
    {
        $greska = $veza->errorInfo();
        echo '<script language="javascript">';
        echo 'alert("SQL greška: '.$greska[2].'")';
        echo '</script>';
        return;
    }

    echo '<script language="javascript">';
    echo 'alert("Pitanje uspjesno obrisano")';
    echo '</script>';
    include 'index.php';
}

function dodajKomentar()
{
    $veza = new PDO("mysql:dbname=spirala4;host=127.3.47.130;charset=utf8", "admin79xADN4", "XnzWJLm_gPwD");
    $veza->exec("set names utf8");
    $rez = $veza->query("INSERT INTO komentar SET Tekst='".$_POST["tekst"]."', FK_odgovor='".$_POST["komentar"]."'");

    if(!$rez)
    {
        $greska = $veza->errorInfo();
        echo '<script language="javascript">';
        echo 'alert("SQL greška: '.$greska[2].'")';
        echo '</script>';
        return;
    }

    echo '<script language="javascript">';
    echo 'alert("Komentar uspjesno spasen")';
    echo '</script>';

    $pitanje = $veza->query("SELECT FK_vijest FROM odgovor where id='".$_POST["komentar"]."'");
    $p = $pitanje->fetch();
    prikaziPitanje($p["FK_vijest"]);
}

function dodajOdgovor()
{
    $veza = new PDO("mysql:dbname=spirala4;host=127.3.47.130;charset=utf8", "admin79xADN4", "XnzWJLm_gPwD");
    $veza->exec("set names utf8");
    $rez = $veza->query("INSERT INTO odgovor SET Tekst='".$_POST["tekst"]."', FK_vijest='".$_POST["odgovor"]."'");

    if(!$rez)
    {
        $greska = $veza->errorInfo();
        echo '<script language="javascript">';
        echo 'alert("SQL greška: '.$greska[2].'")';
        echo '</script>';
        return;
    }

    echo '<script language="javascript">';
    echo 'alert("Odgovor uspjesno spasen")';
    echo '</script>';
    prikaziPitanje($_POST["odgovor"]);
}

function prikaziPitanje($pitanje)
{
    $id = $pitanje;
    $veza = new PDO("mysql:dbname=spirala4;host=127.3.47.130;charset=utf8", "admin79xADN4", "XnzWJLm_gPwD");
    $veza->exec("set names utf8");
    $upit = $veza->prepare("SELECT * FROM vijest where id=?");
    $upit->execute(array($id));
    $pitanje = $upit->fetch();

    echo '<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="ViewQuestion.css" type="text/css" />
    <link href="Link.css" rel="stylesheet" />
    <script src="ViewQuestion.js"></script>
    <title>Main page</title>
</head>
<body>
    <header class="partial">

        <div class="logo">
            <a href="index.html">
                <h1 class="naslov">
                    Stack overflow
                </h1>
            </a>
        </div>

    </header>
    <nav>';
    include 'Menu.php';
    $stranica = '<input class="desno" id="search" type="search" />
        <label class="desno" for="search">Pretraga</label>
    </nav>
    <br />
    <br />
    <hr class="gornjiHr" />
    <br />
    <br />

    <section>
        <br />
        <br />

        <div class="main">
            <div class="question">
            <h3>Pitanje</h3>';
    if(isset($_SESSION["id"]) && $_SESSION['id'] == 1)
    {
        $stranica = $stranica.'<form action="ShowQuestion.php" method="post">
        <input type="hidden" name="brisanjeNovosti" value="'.$id.'" />
        <input type="submit" value="Obrisi pitanje" />
        </form>';
    }

    if($pitanje["DozvoljeniKomentari"] == 1 && isset($_SESSION["id"]) && $_SESSION['id'] == 1)
    {
        $stranica = $stranica.'<form action="ShowQuestion.php" method="post">
        <input type="hidden" name="komentarisanje" value="'.$id.'" />
        <input type="submit" value="Zabrani komentarisanje novosti" />
        </form>';
    }
    else if(isset($_SESSION["id"]) && $_SESSION['id'] == 1)
    {
        $stranica = $stranica.'<form action="ShowQuestion.php" method="post">
        <input type="hidden" name="komentarisanje" value="'.$id.'" />
        <input type="submit" value="Dozvoli komentarisanje novosti" />
        </form>';
    }
    $korisnik = $veza->query("SELECT Ime FROM user WHERE Id='".$_SESSION['id']."'");
    $k = $korisnik->fetch();
    $stranica = $stranica.'<p>
                    <img class="userSlika" src="https://cdn1.iconfinder.com/data/icons/user-pictures/101/malecostume-128.png" alt="https://cdn2.iconfinder.com/data/icons/fatcow/32x32/http_status_not_found.png" />
                    <b>'.$pitanje["Naslov"].'</b>
                </p>
                <textarea class="pitanjeTextBox" disabled>
                    '.$pitanje["Tekst"].'
                </textarea>

                <br />
                <br />

            </div>
            <br />
            <br />
            <hr class="linija" />
            <br />
            <h2>Odgovori</h2>
            <br />';

    $odgovori = $veza->query("SELECT * FROM odgovor WHERE FK_vijest='".$id."'");

    if($pitanje['DozvoljeniKomentari'] == 1)
    {
        $stranica = $stranica.' <input type="button" value="Odgovori" onclick="PrikaziZaOdgvor()" />
        <form action="ShowQuestion.php" id="unosForma" method="post">
            <input type="text" name="tekst" />
            <input type="submit" value="Spasi odgovor"  />
            <input type="hidden" value="'.$id.'" name="odgovor" />
        </form>';
    }
    else
    {
        $stranica = $stranica.'<h3>Komentari nisu dozvoljeni</h3>';
    }
    foreach($odgovori as $odgovor)
    {
        $stranica = $stranica.' <div class="question">
                <p>
                    <img class="userSlika" src="https://cdn1.iconfinder.com/data/icons/user-pictures/100/female1-128.png" alt="https://cdn2.iconfinder.com/data/icons/fatcow/32x32/http_status_not_found.png" />
        </p>';



        if(isset($_SESSION["id"]) && $_SESSION['id'] == 1)
        {
            $stranica = $stranica.'<form action="ShowQuestion.php" method="post">
        <input type="hidden" name="brisanjeOdgovora" value="'.$odgovor["Id"].'" />
        <input type="submit" value="Obrisi odgovor" />
        </form>';
        }

        $stranica = $stranica.'<textarea class="pitanjeTextBox" disabled>
                    '.$odgovor["Tekst"].'
                </textarea>

                <br />
                <br />';

        $komentari = $veza->query("SELECT * FROM komentar where FK_odgovor='".$odgovor['Id']."'");

        if($pitanje['DozvoljeniKomentari'] == 1)
        {
            $stranica = $stranica.' <input type="button" value="Komentarisi" onclick="PrikaziZaKomentar('.$odgovor["Id"].')" />
        <form class="sakriveno" action="ShowQuestion.php" id="komentarForma'.$odgovor["Id"].'" method="post">
            <input type="text" name="tekst" />
            <input type="submit" value="Spasi komentar"  />
            <input type="hidden" value="'.$odgovor["Id"].'" name="komentar" />
        </form><br /> <br />';
        }

        $stranica = $stranica.' <div class="comments"> <hr class="linijaKomentar" />';

        foreach($komentari as $komentar)
        {
            $stranica = $stranica.' <div class="comment">
                        <img class="userSlika" src="https://cdn1.iconfinder.com/data/icons/user-pictures/100/supportmale-128.png" alt="https://cdn2.iconfinder.com/data/icons/fatcow/32x32/http_status_not_found.png" />
                        '.$komentar["Tekst"].'
                    </div>

                    <br />';

            if(isset($_SESSION["id"]) && $_SESSION['id'] == 1)
            {
                $stranica = $stranica.'<form action="ShowQuestion.php" method="post">
        <input type="hidden" name="brisanjeKomentara" value="'.$komentar["Id"].'" />
        <input type="hidden" name="pitanje" value="'.$id.'" />
        <input type="submit" value="Obrisi komentar" />
        </form>';
            }

            $stranica = $stranica.'<hr class="linijaKomentar" />

                    <br />
                    <br />

                </div>';
        }

        $stranica = $stranica.'<hr class="linija" /> </div>';
    }

    $stranica = $stranica.' <br />
        </div>

    </section>

    <footer class="partial">
        <table id="as">
            <tr class="fr">
                <td class="ft">
                    <u>Kontakt</u>
                </td>
                <td class="ft">
                    <u>Pratite nas</u>
                </td>
                <td class="ft">
                    <u>O nama</u>
                </td>
            </tr>
            <tr class="fr">
                <td class="ft">Tel: +38762123456</td>
                <td class="ft">
                    <a href="https://facebook.com/">
                        <img src="https://cdn2.iconfinder.com/data/icons/micon-social-pack/512/facebook-128.png" alt="https://cdn2.iconfinder.com/data/icons/fatcow/32x32/http_status_not_found.png" class="ikone" />
                    </a>
                </td>
                <td class="ft">Dobrodošli na Bh Stack</td>
            </tr>
            <tr class="fr">
                <td class="ft">Email: dcengic2@etf.unsa.ba</td>
                <td class="ft">
                    <a href="https://twitter.com/">
                        <img src="https://cdn1.iconfinder.com/data/icons/logotypes/32/twitter-128.png" alt="https://cdn2.iconfinder.com/data/icons/fatcow/32x32/http_status_not_found.png" class="ikone" />
                    </a>
                </td>
                <td class="ft">Ova stranica je namijenjena početnicima u programiranju</td>
            </tr>
            <tr class="fr">
                <td class="ft">Adresa: Neka adresa 22</td>
                <td class="ft">
                    <a href="https://plus.google.com/">
                        <img src="https://cdn0.iconfinder.com/data/icons/social-network-7/50/7-128.png" alt="https://cdn2.iconfinder.com/data/icons/fatcow/32x32/http_status_not_found.png" class="ikone" />
                    </a>
                </td>
                <td class="ft">Trebate savjet ili odgovor na pitanje? Pitajte na Bh Stack</td>
            </tr>
        </table>
    </footer>
</body>
</html>';

    echo $stranica;
}
?>