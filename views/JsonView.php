<?php

/**
 Macht ein json-format aus dem übergebenen array 
 * und schickt es als html hinaus (response to browser
 * 
 * @author: ego
 */
class JsonView {
    
    /**
     * unser Konstruktor bereitet das Objekt darauf vor arbeiten zu können.
     * Dazu werden hier die Header gesetzt um JSON aus zu geben
     */
    public function __construct() {
        header('Content-Type: application/json'); // ist wohl eine ziemich tief eingebettete funktion ...
    }

    public function streamOutput($data){       
        //umwandlung in json string - ACHTUNG: json_encode vs. json_decode
        $jsonOutput = json_encode($data);
        //tatsächliche Ausgabe an den Client
        echo $jsonOutput;        
    }
}
