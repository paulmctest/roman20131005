<?php
/*
 * A php class to convert convert between Roman Numerals and Arabic Numerals
 * with checks for validity of input
 *
 */
    class RomanBinary {

    private $romanTokens            = ['I'=>1, 'V'=>5, 'X'=>10, 'L'=>50, 'C'=>100, 'D'=>500, 'M'=>1000 ];
    private $subtractionPairs       = ['IV', 'IX', 'XL', 'XC', 'CD', 'CM' ];
    private $illegalRomanValues     = [ 'IM','VM','LM','DM', 'ID','VD','LD','XD', 'IC','VC','LC', 'IC', 'VC', 'VX','DD','VV','LL', 'IIII', 'VVVV', 'XXXX', 'LLLL', 'CCCC','DDDD','MMMM' ];

    function getBase10($input) {

        $returnValue = 0;
        # Only Roman numerals
        if(preg_match('/[^MDCLXVI]/', $input)){
            return 'Your string must only contain Roman Numerals';
        }
        # Is this a legal string?
        if($this->checkValidRoman($input)){
           return 'That is not a valid roman numeral';
        }
        # let's not loop for single values which are a simple lookup of existing arrays
        if(strlen($input) == 1) return $this->romanTokens[$input];

        $count = 0;
        while($count<strlen($input)){
            $currentToken   = $input[$count]; 
            $nextToken      = $input[$count+1];
            $checkToken     = $currentToken.$nextToken;
            //do subtraction
            if(in_array($checkToken, $this->subtractionPairs ))
            {
                $sum = (int)$this->romanTokens[$nextToken] - (int)$this->romanTokens[$currentToken];
                $returnValue += $sum;
                //skip the next value
                $count++;
            }else{
                $returnValue += (int)$this->romanTokens[$input[$count]];
            }
            $count++;
        }
        return $returnValue;
    } 

    function checkValidRoman($string)
    {
        foreach($this->illegalRomanValues AS $testMatch){
            if(preg_match("/$testMatch/", $string)) return 1;
        }
    }

}
?>
