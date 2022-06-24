<?php
require_once 'vendor/autoload.php';
require_once './Models/bibleVerse.php';
class bibleVerseController {
    
    public function show(){
        $bibleVerse = new bibleVerse();
        $verset = $bibleVerse->generateRandomVerse(array()/*array(18, 39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64)*/);
        require_once './Views/bibleVerse/show.php';
    }
    
}
