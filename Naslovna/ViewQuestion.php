<!DOCTYPE html>

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

    <section>
        <br />
        <br />

        <div class="main">
            <div class="question">
                <p>
                    <img class="userSlika" src="https://cdn1.iconfinder.com/data/icons/user-pictures/101/malecostume-128.png" alt="https://cdn2.iconfinder.com/data/icons/fatcow/32x32/http_status_not_found.png" />
                    <b>Naslov</b>
                </p>
                <textarea class="pitanjeTextBox" disabled>
                    Pitanje
                </textarea>

                <br />
                <br />

            </div>
            <br />
            <br />
            <hr class="linija" />
            <br />
            <h2>Odgovori</h2>
            <br />

            <div class="question">
                <p>
                    <img class="tacnoSlika" src="https://cdn4.iconfinder.com/data/icons/flat-game-ui-buttons-icons-2/80/1-33-128.png" alt="https://cdn2.iconfinder.com/data/icons/fatcow/32x32/http_status_not_found.png" />
                    <img class="userSlika" src="https://cdn1.iconfinder.com/data/icons/user-pictures/100/female1-128.png" alt="https://cdn2.iconfinder.com/data/icons/fatcow/32x32/http_status_not_found.png" />
                </p>
                <textarea class="pitanjeTextBox tacan" disabled>
                    Odgovor
                </textarea>

                <br />
                <br />
                <div class="comments">
                    <hr class="linijaKomentar" />
                    <div class="comment">
                        <img class="userSlika" src="https://cdn1.iconfinder.com/data/icons/user-pictures/100/supportmale-128.png" alt="https://cdn2.iconfinder.com/data/icons/fatcow/32x32/http_status_not_found.png" />
                        Za svaki komentarrr
                    </div>

                    <br />
                    <hr class="linijaKomentar" />

                    <br />
                    <br />

                </div>
                <hr class="linija" />
            </div>
            <br />
        </div>

      <form action="ShowQuestion.php" method="post">
          <input type="hidden" name="brisanjeNovosti" value="" />
          <input type="submit" />
      </form>




        <img class="slika" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS5FT3DfnbOyCiAmEgQMFqjzxVfHNeBFSfUGWA09c-Ck2BWhup5Iw" alt="https://cdn2.iconfinder.com/data/icons/fatcow/32x32/http_status_not_found.png" />
        <img class="slika" src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcSxIVciAAfRuMmks9pspgfQwEoHIAWYHKDGDilyvxZ-Q1cxYoSs" alt="https://cdn2.iconfinder.com/data/icons/fatcow/32x32/http_status_not_found.png" />
        <img class="slika" src="http://image.shutterstock.com/z/stock-vector-brain-gears-in-light-bulb-idea-vector-illustration-template-design-137494883.jpg" alt="https://cdn2.iconfinder.com/data/icons/fatcow/32x32/http_status_not_found.png" />
        <img class="slika" src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcTt-XGjBozQQAEQbPR_nKCUBUYeCqgev3xrZa9D-g2-ZtlBiEy9" alt="https://cdn2.iconfinder.com/data/icons/fatcow/32x32/http_status_not_found.png" />

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
</html>
