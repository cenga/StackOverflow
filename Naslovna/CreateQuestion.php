<!DOCTYPE html>
<html lang="en">
<?php include 'SaveQuestion.php';?>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="CreateQuestion.css" type="text/css" />
    <script src="CreateQuestion.js"></script>
    <link href="Link.css" rel="stylesheet" />
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
    <nav>
        <?php include 'Menu.php';?>
        <input class="desno" id="search" type="search" />
        <label class="desno" for="search">Pretraga</label>
    </nav>
    <section>
        <br><br>
        <hr>
        <form id="createQuestion" method="post" action="CreateQuestion.php">
            <label for="naslov">Naslov</label>
            <input type="text" id="naslov" name="title" onkeyup="validirajNaslov()" required>
            <br><br>
            Ovdje napišite pitanje<br>
            <div class="pitanje">
                <textarea class="pitanjeTextBox" name="pitanje" required autofocus form="createQuestion"></textarea>
            </div>
            <select required class="mojSelect" name="skill">
                <option>C#</option>
                <option>HTML</option>
                <option>SQL</option>
                <option>ASP</option>
                <option>JavaScript</option>
                <option>C++</option>
                <option>Angular JS</option>
                <option>Botstrap</option>
                <option>.NET</option>
            </select>
            <br /> <br />
            <label>Kod</label>
            <input type="text" required name="kod" />
            <br />
            <label>Broj</label>
            <input type="tel" required onblur="validirajBroj()" name="broj" />
            <br /> <br />
            <input type="submit" id="submit" value="Potvrdi unos">
            <input type="hidden" value="value" name="novoPitanje"> 
        </form>
        <br><br>
    </section>
    <footer class="partial">
        <table>
            <tr class="fr">
                <td class="ft"><u>Kontakt</u></td>
                <td class="ft"><u>Pratite nas</u></td>
                <td class="ft"><u>O nama</u></td>
            </tr>
            <tr class="fr">
                <td class="ft">Tel: +38762123456</td>
                <td class="ft"><a href="https://facebook.com/"><img src="https://cdn2.iconfinder.com/data/icons/micon-social-pack/512/facebook-128.png" alt="https://cdn2.iconfinder.com/data/icons/fatcow/32x32/http_status_not_found.png" class="ikone"></a></td>
                <td class="ft">Dobrodošli na Bh Stack</td>
            </tr>
            <tr class="fr">
                <td class="ft">Email: dcengic2@etf.unsa.ba</td>
                <td class="ft"><a href="https://twitter.com/"><img src="https://cdn1.iconfinder.com/data/icons/logotypes/32/twitter-128.png" alt="https://cdn2.iconfinder.com/data/icons/fatcow/32x32/http_status_not_found.png" class="ikone"></a></td>
                <td class="ft">Ova stranica je namijenjena početnicima u programiranju</td>
            </tr>
            <tr class="fr">
                <td class="ft">Adresa: Neka adresa 22</td>
                <td class="ft"><a href="https://plus.google.com/"><img src="https://cdn0.iconfinder.com/data/icons/social-network-7/50/7-128.png" alt="https://cdn2.iconfinder.com/data/icons/fatcow/32x32/http_status_not_found.png" class="ikone"></a></td>
                <td class="ft">Trebate savjet ili odgovor na pitanje? Pitajte na Bh Stack</td>
            </tr>
        </table>
    </footer>
</body>
</html>
