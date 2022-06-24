<?php

class bibleVerse {
    
    public function generateRandomVerse($multimeCarti = array()){
        
        $rutaTextBiblic = "./assets/ro_cornilescu.json";
        $textBiblie = file_get_contents($rutaTextBiblic);
        
        if($textBiblie != false){
                    
            $carti = array(
        // Vechiul Testament
        /*0 => "Geneza",
        1 => "Exodul",
        2 => "Levitic",
        3 => "Numeri",
        4 => "Deuteronom",
        5 => "Iosua",
        6 => "Judecatori",
        7 => "Rut",
        8 => "1 Samuel",
        9 => "2 Samuel",
        10 => "1 Regi",
        11 => "2 Regi",
        12 => "1 Cronici",
        13 => "2 Cronici",
        14 => "Ezra",
        15 => "Neemia",
        16 => "Estera",
        17 => "Iov",*/
        0 => "Psalmii",
        /*19 => "Proverbele",
        20 => "Eclesiastul",
        21 => "Cantarea Cantarilor",
        22 => "Isaia",
        23 => "Ieremia",
        24 => "Plangerile lui Ieremia",
        25 => "Ezechiel",
        26 => "Daniel",
        27 => "Osea",
        28 => "Ioel",
        29 => "Amos",
        30 => "Obadia",
        31 => "Iona",
        32 => "Mica",
        33 => "Naum",
        34 => "Habacuc",
        35 => "Tefania",
        36 => "Hagai",
        37 => "Zaharia",
        38 => "Maleahi",*/
        // Noul Testament
        1 => "Matei",
        2 => "Marcu",
        3 => "Luca",
        4 => "Ioan",
        5 => "Faptele Apostolilor",
        6 => "Romani",
        7 => "1 Corinteni",
        8 => "2 Corinteni",
        9 => "Galateni",
        10 => "Efeseni",
        11 => "Filipeni",
        12 => "Coloseni",
        13 => "1 Tesaloniceni",
        14 => "2 Tesaloniceni",
        15 => "1 Timotei",
        16 => "2 Timotei",
        17 => "Tit",
        18 => "Filimon",
        19 => "Evrei",
        20 => "Iacov",
        21 => "1 Petru",
        22 => "2 Petru",
        23 => "1 Ioan",
        24 => "2 Ioan",
        25 => "3 Ioan",
        26 => "Iuda"/*,
        65 => "Apocalipsa"*/
    );
            $json = json_decode($textBiblie, true);

            if(sizeof($multimeCarti) > 0){
                $randPosCarte = random_int(0, sizeof($multimeCarti)-1);
                $carte = $multimeCarti[$randPosCarte];
            }
            else{
                $carte = random_int(0, 26);
            }

            $capitole = $json[$carte]['chapters'];
            $capitol = random_int(0, sizeof($capitole)-1);

            $versete = $json[$carte]['chapters'][$capitol];
            $verset = random_int(0, sizeof($versete)-1);

            $textRezultat = $json[$carte]['chapters'][$capitol][$verset];
            $capitol++;
            $verset++;
            $textRezultat .= "<br>" . $carti[$carte] . " " . $capitol . ":".$verset;
            return $textRezultat;

        }
        else{
            return null;
        }
    }
    
}
