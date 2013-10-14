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
    #Thousands, #Hundreds, #tens,#singles
    private $arabicToBase10Maps     = [ 
      [1=>'M', '2'=>'MM', '3'=>'MMM' ],
      ['9'=> 'CM', '8' => 'DCCC', '7' => 'DCC', '6' => 'DC', '5' => 'D', '4'=>'CD','3' => 'CCC', '2' => 'CC', '1'=>'C'],
      ['9'=> 'XC', 8 => 'LXXX', 7 => 'LXX', 6 => 'LX', 5 => 'L', 4=>'XL', 3 => 'XXX', 2 => 'XX', 1=>'X'],
      ['9'=> 'IX', 8 => 'VIII', 7 => 'VII', '6' => 'VI', '5'=> 'V', 4=>'IV', '3'=> 'III', '2'=> 'II', '1'=>'I']
    ];

    function convertBase10ToRoman($input) {
        $returnValue = '';
        $input = preg_replace('/,\s/',"",$input);
        # Only Arabic numerals
        if(preg_match('/[^0-9]/', $input)){
            return 'Your string must only contain Arabic Numerals';
        }
        
        $max = 4;
        $count = $max - strlen($input);
        $chars = str_split($input);
        foreach($chars as $currentToken){
            $returnValue .= $this->arabicToBase10Maps[$count][$currentToken];
            $count++;
        }

        return $returnValue;
    } 
    function convertRomanNumeralsToBase10($input) {

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
