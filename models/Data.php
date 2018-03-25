<?php


/**
 * Holt daten aus json file und stellt eine methode zur vefügung die sie übergibt
 *
 * @author ego
 */
class Data {
    private $charactArray = array();
    //COnstruktor  ruft einlesen und lokales ablegen auf
    public function __construct() {
        $charactArray = $this->readJson();
    }
    
    private function readJson(){
        
    }
    
    public function getCharacters() {  // a getter
        
    }
}
