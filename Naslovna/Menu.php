<?php
include 'LoginKod.php';
  echo '<div class="menu">

            <a href="index.php">Početna</a>';

            if($_SESSION["korisnikPrijavljen"]== true)
            {
               echo '<a href="CreateQuestion.php">Postavi pitanje</a>';
            }

            if($_SESSION["korisnikPrijavljen"]== true)
            {
                echo '<a href="ViewProfile.php">Profil</a>';
            }

            if($_SESSION["korisnikPrijavljen"]== true)
            {
                echo '<a href="IzmjenaPassworda.php">Promijeni password</a>';
            }

            if($_SESSION["korisnikPrijavljen"]== false)
            {
                echo '<a href="Login.php">Prijavi se</a>';
            }

            if($_SESSION["korisnikPrijavljen"]== true && isset($_SESSION["id"]) && $_SESSION['id'] == 1)
            {
                echo '<a href="Register.php">Registracija novog autora</a>';
            }

            if($_SESSION["korisnikPrijavljen"]== true)
            {

                echo '<form action="index.php" method="post" accept-charset="utf-8">
            <input class="mojLink" type="submit" value="Odjava">
            <input type="hidden" value="logout" name="aktivno">
            </form></div>';
          }
?>