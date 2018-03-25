<?php

/**
 * Bekommt ein characterarray im construct aufruf und wandelt es in die 
 * "ge-flip-te" variante (erster ist letzter)
 * Methode getFlipped gibt dieses array zurück
 * @author ego
 */
class Flip {
    
    private $flippedArray;
    // TODO (1) im construktor  bereits ergebnisarray herstellen, weil vielmehr tut die klasse ja nicht
    public function __construct($arrayToConvert) {
        $this->flippedArray = $this->flip($arrayToConvert);
    }
    
    private function flip ($toBeFlipped) {
        $size = count($toBeFlipped);
        for ($xi=$size;$xi>0;$xi--){
            //$resultIndex = 0;
            $resultArray[] = $toBeFlipped[$xi-1]; // anhängen hinten braucht keinen index
            //$resultIndex++;
        }
//        echo implode(", ", $resultArray);
        return $resultArray;
    }

    //Ergebnis array zurückliefern  .. ein getter
    public function getFlipped(){
        return $this->flippedArray;
    }
}
