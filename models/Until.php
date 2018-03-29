<?php

class Until {
    private $untilArray;

    // TODO (1) im construktor  bereits ergebnisarray herstellen, weil vielmehr tut die klasse ja nicht
     public function __construct($arrayToConvert, $stopVal) {
        $this->untilArray = $this->untilling($arrayToConvert, $stopVal);
    }
    
    // MIT While-schleife    ... ANM: alles in allem mühsamer und unleserlicher als die variante mit for-schleife
    private function untilling ($toBeUntilled, $stopUntil) {
        $size = count($toBeUntilled);
        $xi = 0;
        while ($xi<$size && ($toBeUntilled[$xi] != $stopUntil)){
            $resultArray[] = $toBeUntilled[$xi]; // anhängen hinten braucht keinen index
            $xi++;
        }
        if ($xi < $size) $resultArray[] = $toBeUntilled[$xi]; // den stopwert nehmen wir noch mit ins ergebnis
        return $resultArray;
    }

    /* MIT For-schleife
     * private function untilling ($toBeUntilled, $stopUntil) {
    
        $size = count($toBeUntilled);
        for ($xi=0;$xi<$size;$xi++){
            $resultArray[] = $toBeUntilled[$xi]; // anhängen hinten braucht keinen index
            if ($toBeUntilled[$xi] == $stopUntil) break; // ziel erreicht --> raus aus der schleife
        }
        return $resultArray;
    }
     */


    //Ergebnis array zurückliefern  .. ein getter
    public function getUntilled(){
        return $this->untilArray;
    }
}
