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
        $this->charactArray = $this->readJson();
//        echo implode(", ", $this->charactArray);
    }
    
    private function readJson(){
        $dataFilePath = DATAPATH . "characters.json";
        $dataFile = file_get_contents($dataFilePath);
        $jsonObject = json_decode($dataFile);
    
        return $jsonObject->alphabetUpper; //im json heisst das array "alphabetUpper"
    }
    
    public function getCharacters() {  // a getter
        return $this->charactArray;
    }
}
