<?php

class Until {
    private $untilArray;

    // TODO (1) im construktor  bereits ergebnisarray herstellen, weil vielmehr tut die klasse ja nicht
    public function __construct($stopChar) {
            $this->untilArray = array();
            // TODO   BEFÜLLEN !!!!
    }
    //Ergebnis array zurückliefern  .. ein getter
    public function getUntilled(){
        $this->untilArray[0] = ("A");  // NUR ZUM TESTEN MUSS NOCH ERSETZT WERDEN
        return $this->untilArray;
    }

}
