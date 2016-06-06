<?php
$veza = new PDO("mysql:dbname=spirala4;host=127.3.47.130;charset=utf8", "admin79xADN4", "XnzWJLm_gPwD");
$veza->exec("set names utf8");
$pitanja = $veza->query("select id, naslov, tekst, UNIX_TIMESTAMP(datum) vrijeme2, skill, FK_user from vijest order by datum desc");
if (!$pitanja) {
    $greska = $veza->errorInfo();
    print "SQL greška: " . $greska[2];
    exit();
}

    class Vijest {
        function Vijest($pitanje, $skill, $datum, $id) {
            $this->pitanje = $pitanje;
            $this->skill = $skill;
            $this->datum = $datum;
            $this->id = $id;
        }
    }
    $novosti = array();
    foreach($pitanja as $pitanje)
    {
        array_push($novosti, new Vijest($pitanje['tekst'], $pitanje['skill'], date("Y.m.d h:i:s", $pitanje['vrijeme2']), $pitanje['id']));
    }

    if (isset($_POST["poImenu"]) && $_POST["poImenu"] == 1){
        usort($novosti, "poImenu");
    }
    else{
        usort($novosti, "poDatumu");
    }

    for($i = 0; $i < count($novosti); $i++)
    {
        $novost = $novosti[$i];
        $indeks = $i+1;
        echo '<form method="post" action="ShowQuestion.php"><div class="novost">
                <input type="hidden" name="id" value="'.$novost->id.'" />
                <span class="broj">'.$indeks.'</span>
                <a href=""><img src="https://cdn1.iconfinder.com/data/icons/user-pictures/100/female1-128.png" alt="https://cdn2.iconfinder.com/data/icons/fatcow/32x32/http_status_not_found.png"  class="userSlika"></a>
                <span class="pitanje"><input type="submit" class="mojLink" value="'.$novost->pitanje.'" /><br />
                    <span class="datum">'.$novost->datum.'</span>
                </span>
                <span class="skill">'.$novost->skill.'</span>
                <hr>
                <br>
            </div></form>';
    }

    function poDatumu($p1, $p2){
        $a = $p1->datum;
        $b = $p2->datum;

        $godina = substr($a, 0, 4);
        $mjesec = substr($a, 5, 2);
        $dan = substr($a, 8, 2);
        $sat = substr($a, 11, 2);
        $minuta = substr(14, 2);
        $sekunda = substr(17, 2);

        $prvi = mktime($sat, $minuta, $sekunda, $mjesec, $dan, $godina);

        $godina = substr($b, 0, 4);
        $mjesec = substr($b, 5, 2);
        $dan = substr($b, 8, 2);
        $sat = substr($b, 11, 2);
        $minuta = substr(14, 2);
        $sekunda = substr(17, 2);

        $drugi = mktime($sat, $minuta, $sekunda, $mjesec, $dan, $godina);

        return $drugi > $prvi;
    }
    function poImenu($a, $b)
     {
         return strtolower($a->pitanje) > strtolower($b->pitanje);
     }
?>