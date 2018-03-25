<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PhpLoopController
 *
 * @author ego
 */
class PhpLoopController {
    
    private $Characters = array();  // hier bekommen wir unsere daten lokal gelagert
    private $getParam1;             // hier werden die requestparameter zwischengelagert
    private $getParam2;
 
    private $jsonView;
    
    // ########  1  Konstruktor Holt Rohdaten über eigene Klasse 
    public function __construct() {
        // TODO (1) Characterarray befüllen
        $RawData = new Data();
        $this->Characters = $RawData->getCharacters();

    }

    // ######## Debug Helferlein
    public function msg($tag = "",$toShow=""){ // methoden überladen geht in php nicht, ergo trick mit zuweisung in der parameterdefinition
        if (DEBUG==1) {
            echo $tag . ": " . $toShow . "<br />\n";
        }
    }

    // ########  2
    private function route(){
        //GET parameter holen 
        if( isset($_GET['simulation']) ){
            $paramNumOf = 1;
            $this->getParam1 = $_GET['simulation'];
            if (isset ($_GET['wert'])) {
                $this->getParam2 = $_GET['wert'];
                $paramNumOf +=1;
            }
            return $paramNumOf;
        }
    }
    
    // ########  3
    public function loopLogic(){
        $result = 0; // soll mal ein chararray werden 
        // TODO (2) GET parameter holen
        $this->msg("Jetzt geht's lohooos  :-)");
        // TODO (3) request parameter holen & entscheiden welche loop und aufrufen
        $numOfParams = $this->route();
        if ($numOfParams != 0){
            $this->msg("ParAnz",$numOfParams);
            $this->msg("Par1",$this->getParam1);
            $this->msg("Par2",$this->getParam2);
            switch ($this->getParam1){
                case "FLIP":
                    $loopObject = new Flip($this->Characters);
                    $resultType = "FLIP-result: ";
                    $result = $loopObject->getFlipped();
                    break;
                case "ODD":
                    $loopObject = new Odd;
                    $resultType = "ODD-result: ";
                    $result =  $loopObject->getOdded($this->Characters);                  
                    break;
                case "UNTIL":
                    // ################## hier gehört noch geprüft ob es param2 gibt und ob er im range liegt A-Z
                    // uppercase könnte man auch noch irgendwo machen !!
                    $loopObject = new Until($this->getParam2);
                    $resultType = "UNTIL-result: ";
                    $result = $loopObject->getUntilled($this->Characters,$this->getParam2);
                    break;
                default:
                    $resultType = "NO Result";
                    $result = ""; // .. damit kein nicht existentes Variaberl' herumliegt
                    break;
            }            
        } else echo "Missing Parameter(s)";
        
        // TODO (4) Output basteln und retournieren
        if (isset($result)) { // falls es ein ergebnis gibt dann ausgabe erstellen
            $this->msg("Ergebnis",implode(",",$result));
            
            // TODO (4) Json objekt instanzieren und Methode zur ausgeabe aufrufen
            $this->jsonView = new JsonView();     
            $this->jsonView->streamOutput($resultType); //Ausgabe als json
            $this->jsonView->streamOutput($result); //Ausgabe als json
        }       
    }
    
    
}
