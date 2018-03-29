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


/* SOLVED: Das problem: 2mal hintereinander aufruf von streamOutput(), einmal mit dem $resultType, dann mit dem $result (array)
 *         Man muss die dinge die man im Json haben will, vorher in ein komplexes arrayobjekt packen und 
 *         NUR EINMAL ein json erstellen
 * FIXME :  
 * nur der Firefox (und nur mit der "webentwickler" erweiterung) meint:
SyntaxError: JSON.parse: unexpected non-whitespace character after JSON data at line 1 column 16 of the JSON data
 * 
 * Er hat recht !  Überprüfung mit jsonlint.com  ergab
 * 
Error: Parse error on line 1:
"FLIP-result: " ["Z", "Y", "X", "W",
----------------^
Expecting 'EOF', '}', ':', ',', ']', got '['
 */