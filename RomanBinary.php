<?php
/*
 * A php class to convert convert between Roman Numerals and Arabic Numerals
 * with checks for validity of input
 *
 */
    class RomanBinary {

    private $romanTokens            = ['I'=>1, 'V'=>5, 'X'=>10, 'L'=>50, 'C'=>100, 'D'=>500, 'M'=>1000 ];
    private $subtractionPairs       = ['I'=>'V', 'I'=>'X', 'X'=>'L', 'X' => 'C', 'C' => 'D', 'C' => 'M' ];
    private $illegalRomanValues     = [ 'IM','VM','LM','DM', 'ID','VD','LD','XD', 'IC','VC','LC', 'IC', 'VC', 'VX','DD','VV','LL' ];

    function getBase10($input) {

        $returnValue = 0;
        # Only Roman numerals
        if(preg_match('/[^MDCLXVI]/', $input)){
            return 'Your string must only contain Roman Numerals';
        }
        # Is this a legal string?
        if(in_array($input, $this->illegalRomanValues)){
            return 'That is not a valid roman numeral';
        }

        if(strlen($input) == 1) return $this->romanTokens[$input];

        $count = 0;
        while($count<=strlen($input)){
            $currentToken   = $input[$count]; 
            $nextToken      = $input[$count+1];
            
        print "$count : str length of '$input' = ".strlen($input)."\n";
            if(in_array($currentToken.$nextToken, $this->illegalRomanValues)){
                return 'That is not a valid roman numeral';
            }
            //do subtraction
            if($this->subtractionPairs[$currentToken] == $nextToken )
            {
                $sum = (int)$this->romanTokens[$nextToken] - (int)$this->romanTokens[$currentToken];
                $returnValue += $sum;
                $count++;
            }else{
                $returnValue += (int)$this->romanTokens[$input[$count]];
            }
            #store currentToken for comparision in next iteration
            $count++;
        }
        return $returnValue;
    } 
}
?>
