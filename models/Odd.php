<?php
/**
 * Bekommt ein characterarray im construct aufruf und wandelt es in die 
 * "ge-odde-te" variante (nur die an den ungeraden index-stellen)
 * Methode getOdded gibt dieses array zurück
 * @author ego
 */
class Odd {
    private $oddArray;
    // TODO (1) im construktor  bereits ergebnisarray herstellen, weil vielmehr tut die klasse ja nicht
    public function __construct($arrayToConvert) {
        $this->oddArray = $this->odd($arrayToConvert);
    }
    
    private function odd ($toBeOdded) {
        $size = count($toBeOdded);
        for ($xi=0;$xi<$size;$xi++){
            if ($xi % 2 == 0) {
                $resultArray[] = $toBeOdded[$xi]; // anhängen hinten braucht keinen index
            }
        }
        return $resultArray;
    }


    //Ergebnis array zurückliefern  .. ein getter
    public function getOdded(){
        return $this->oddArray;
    }
   
}
