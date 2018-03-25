<?php

/**
 * - Ruft im Konstruktor die rohdatenherbeischaffung auf (liest ein json file ein mit einem chararray A-Z)
 * - Methode route() kümmert sich um die aufrufparameter "request vom Browser
 *  -- Aufrufparameter:  "simulation"  werte: FLIP ; ODD ; UNTIL  /  "wert"  werte:  a-z , A-Z (der parameter für die UNTIL funktion)
 * - Methode loopLogic() wickelt den job ab (quasi die main-methode
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
                    $loopObject = new Flip($this->Characters); //erzeugt ein FLIP element und damit auch gleich die ergebnistabelle
                    $resultType = "FLIP-result: ";             // für eine nette ausgabe
                    $result = $loopObject->getFlipped();       // ergebnistabelle abholen
                    break;
                case "ODD":
                    $loopObject = new Odd($this->Characters);
                    $resultType = "ODD-result: ";
                    $result =  $loopObject->getOdded();                  
                    break;
                case "UNTIL":                  
                    if ($numOfParams != 2) { // geprüft ob es param2 gibt
                        echo "Missing Stop Parameter";
                        break;               // lazy logic .. aber nachdem's eh schon ein brak hier gibt ... was soll's
                    }
                    // ################ gehörte noch geprüft ob er im range liegt A-Z  ??????
                    
                    $this->getParam2 =  strtoupper($this->getParam2) ;// uppercase aus dem parameter machen !!
                    
                    $loopObject = new Until($this->Characters, $this->getParam2);
                    $resultType = "UNTIL-result: ";
                    $result = $loopObject->getUntilled();
                    break;
                default:
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
        } else {
            echo ("Wrong request (use (FLIP | ODD | UNTIL) ; while UNTIL needs a stop Character also");
        }      
    }
    
    
}
