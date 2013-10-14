<?php
    /* process.php
     * a page to control the processing of an html form and 
     * make appropriate calls to the class RomanBinary
     * 
     * Params: expects an string named 'input' which contains the string to convert
     * and a string from a radio button named 'numberType' which will be 'roman' or 'arabic'
     * 
     */     

# This page does nothing without POST data
if(!isset($_POST['input']) ) {   
    header('Location: index.php'); 
    exit(1);
};
require_once dirname(__FILE__) . '/RomanBinary.php';

// our JSON return code starts at 0;
$aResponse['returnVal'] = 0;
$oRb = new RomanBinary();
if($_POST['check']=='roman'){
    $aResponse['returnVal'] = 1;
    $aResponse['response']  = $oRb->convertRomanNumeralsToBase10($_POST['input']);
}
if($_POST['check']=='arabic'){
    $aResponse['returnVal'] = 1;
    $aResponse['response']  = $oRb->convertBase10ToRoman($_POST['input']);
}

echo json_encode($aResponse);
?>
