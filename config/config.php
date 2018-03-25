<?php

//Für's debuggen errorausgabe (im htmlcode geliefert) einschalten
error_reporting(E_ALL);

// Allgemeine konstanten definieren
define("DATAPATH", 'C:\xampp\htdocs\Uebung2\data\\'); // da wo daten herkommen
define("DEBUG",1);  // schaltet debugmessages ein/aus

// Klassendateien includieren
include "models/Data.php";
include "models/Flip.php";
include "models/Odd.php";
include "models/Until.php";
include "controller/PhpLoopController.php";

//include "view/JsonView.php";


