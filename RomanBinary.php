<?php
    class RomanBinary {

    public $romanTokens       =   ['I'=>1, 'V'=>5, 'X'=>10, 'L'=>50, 'C'=>100, 'D'=>500, 'M'=>1000 ];
    private $subtractionPairs  =   ['V'=>'I', 'X'=>'I', 'L'=>'X', 'C'=>'X', 'D'=>'C', 'M'=>'C' ];
    public $illegalValues = [
                    'IM','VM','LM','DM', 
                    'ID','VD','LD','XD', 
                    'IC','VC','LC',
                    'IC', 'VC',
                    'VX' 
                ];

    function roman($string) {
        if(!preg_match('/^[MDCLXVI]+$/', $string)){
            return 'Your string must only contain Roman Numerals';
        }
        if(in_array($string, $this->illegalValues)){
            return 'That is not a valid roman numeral';
        }
        return $string;
    } 
}
?>
