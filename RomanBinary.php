<?php
    class RomanBinary {

    public $romanTokens       =   ['I'=>1, 'V'=>5, 'X'=>10, 'L'=>50, 'C'=>100, 'D'=>500, 'M'=>1000 ];
    private $subtractionPairs  =   ['V'=>'I', 'X'=>'I', 'L'=>'X', 'C'=>'X', 'D'=>'C', 'M'=>'C' ];
    private $illegalValues      = [ 'IM','VM','LM','DM', 'ID','VD','LD','XD', 'IC','VC','LC', 'IC', 'VC', 'VX','DD','VV','LL' ];

    function getBase10($input) {

        $returnValue = '';
        # Only Roman numerals
        if(preg_match('/[^MDCLXVI]/', $input)){
            return 'Your string must only contain Roman Numerals';
        }
        # Is this a legal string?
        if(in_array($input, $this->illegalValues)){
            return 'That is not a valid roman numeral';
        }

        //$returnValue = (int)$this->romanTokens[$input];
        //return $returnValue;
        if(strlen($input) == 1) return $this->romanTokens[$input];

        for($i=0;$i<strlen($input);$i++){
            
            $currentValue += $this->romanTokens[$input[$i]];
            $returnValue = $currentValue;
        }
/*
*/
        return $returnValue;
    } 
}
?>
