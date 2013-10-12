<?php
require_once 'PHPUnit/Autoload.php';
require_once dirname(__FILE__) . '/../RomanBinary.php';
 
class RomanBinaryTest extends PHPUnit_Framework_TestCase {

    private $romanTokens       =   ['I'=>1, 'V'=>5, 'X'=>10, 'L'=>50, 'C'=>100, 'D'=>500, 'M'=>1000 ];
    private $subtractionPairs  =   ['V'=>'I', 'X'=>'I', 'L'=>'X', 'C'=>'X', 'D'=>'C', 'M'=>'C' ];
    private $illegalValues = [ 'IM','VM','LM','DM', 'ID','VD','LD','XD', 'IC','VC','LC', 'IC', 'VC', 'VX' ];

   function testCanCreateClass() {
      $roman = new RomanBinary();
   }
   function testItShouldReturnString() {
      $roman = new RomanBinary();
      $this->assertEquals('X', $roman->roman('X'));
   }
   function testItShouldFailOnNonRomanChars() {
      $roman = new RomanBinary();
      $this->assertEquals('Your string must only contain Roman Numerals', $roman->roman('5'));
   }
   function testItShouldFailOnIllegalCharPatterns() {
      $roman = new RomanBinary();
      while (list($key, $value) = each($this->illegalValues)) {
        $this->assertEquals('That is not a valid roman numeral', $roman->roman($value));
      }
   }
}
?>
