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
    
    private $Characters = array(); // hier bekommen wir unsere daten lokal gelagert
     
    public function __construct() {
        $Data = new Data();
        $this->Characters = getCharacters();
    }
}
