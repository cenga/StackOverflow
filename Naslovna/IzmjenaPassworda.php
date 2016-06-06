<!DOCTYPE html>
<?php include 'Password.php';?>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="Login.css" type="text/css" />
    <link href="IzmjenaPassworda.css" rel="stylesheet" />
    <link href="Link.css" rel="stylesheet" />
    <script src="IzmjenaPassworda.js"></script>
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
    <br />
    <br />
    <hr class="gornjiHr" />
    <br />
    <br />
    <form id="forma" method="post" action="Password.php">
        <p class="naslovForme">Izmjena passworda</p>
        <table>
            <tr>
                <td>
                    <label>Stari password</label>
                </td>
                <td>
                    <input type="password" required id="stariPw" name="stari" />
                </td>
            </tr>

            <tr>
                <td>
                    <label>Novi password</label>
                </td>
                <td>
                    <input type="password" required id="pw" name="novi" />
                </td>
            </tr>

            <tr>
                <td>
                    <label>Potvrdi password</label>
                </td>
                <td>
                    <input type="password" id="cpw" name="cnovi" />
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="submit" id="submit" value="Potvrdi" />
                </td>
            </tr>

        </table>
    </form>

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
</html>
