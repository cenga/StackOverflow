<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="Login.css" type="text/css" />
    <script src="Login.js"></script>
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
    <br> <br>
    <hr class="gornjiHr">
    <br>
    <br>

    <form action="index.php" method="post" id="forma">
        <p class="naslovForme">Login</p>
        <h5>username i pw su: cenga</h5>
        <table>
            <tr>
                <td><label  id="lusername">Username</label></td>
                <td><input type="text" name="user" required onkeyup="validirajUsername()"></td>
            </tr>

            <tr>
                <td><label id="lpw">Password</label></td>
                <td><input type="password" name="password" required onkeyup="validirajPw()"></td>
            </tr>
            <tr>
                <td>
                    <label for="c">Zapamti me</label>
                    <input type="checkbox" checked id="c">
                </td>
                </tr>
            <tr>
                <td colspan="2"><input type="submit" id="submit" onclick="validiraj()" value="Login"></td>
            </tr>
        </table>
        <input type="hidden" value="login" name="aktivno"/>
        <br>
    </form>

    <footer class="partial">
        <table id="as">
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
