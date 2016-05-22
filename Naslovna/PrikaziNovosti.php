<?php
    $pitanja = file("Pitanja.csv");
    class Vijest {
        function Vijest($pitanje, $skill, $datum) {
            $this->pitanje = $pitanje;
            $this->skill = $skill;
            $this->datum = $datum;
        }
    }
    $novosti = array();
    for($i = 0; $i < count($pitanja); $i++)
    {
        $novost = $pitanja[$i];
        $prvi = strpos($novost, ",", 0) + 1;
        $drugi = strpos($novost, ",", $prvi);
        $treci = strpos($novost, ",", $drugi+1);
        $naslov = str_replace("&amp;#44", ",", trim(substr($novost, 0, $prvi)));
        $pitanje = str_replace("&amp;#44", ",", trim(substr($novost, $prvi, $drugi - $prvi)));
        $skill = trim(substr($novost, $drugi+1, $treci - $drugi));
        $datum = trim(substr($novost, $treci+1, strlen($novost) - $treci));
        array_push($novosti, new Vijest($pitanje, $skill, $datum));
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
        echo '<div class="novost">
                <span class="broj">'.$indeks.'</span>
                <a href=""><img src="https://cdn1.iconfinder.com/data/icons/user-pictures/100/female1-128.png" alt="https://cdn2.iconfinder.com/data/icons/fatcow/32x32/http_status_not_found.png"  class="userSlika"></a>
                <span class="pitanje">'.$novost->pitanje.'<br />
                    <span class="datum">'.$novost->datum.'</span>
                </span>
                <span class="skill">'.$novost->skill.'</span>
                <hr>
                <br>
            </div>';
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