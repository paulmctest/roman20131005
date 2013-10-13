<?php
require_once 'PHPUnit/Autoload.php';
require_once dirname(__FILE__) . '/../RomanBinary.php';
 
class RomanBinaryTest extends PHPUnit_Framework_TestCase {

    private $romanTokens             = ['I'=>1, 'V'=>5, 'X'=>10, 'L'=>50, 'C'=>100, 'D'=>500, 'M'=>1000 ];
    private $illegalValues           = [ 'IM','VM','LM','DM', 'ID','VD','LD','XD', 'IC','VC','LC', 'IC', 'VC', 'VX','DD','VV','LL' ];
    private $legalExamples           = [ 'M','LM','DM', 'ID','VD','LD','XD', 'IC','VC','LC', 'IC', 'VC', 'VX' ];
    private $validAdditionList       = [ 'III' => 3, 'CC' => 200, 2000,'MMM'=>3000 ];
    private $validSubtractionList    = ['IV'=>-4,'IX'=>9, 'XL' => -40, 'XC' => 90, 'CD'=>-400, 'CM' => 900 ];

   function testCanCreateClass() {
      $rb = new RomanBinary();
   }
   function testItShouldReturnString() {
      $rb = new RomanBinary();
      $this->assertEquals('10', $this->romanTokens['X']);
   }
   function testItShouldFailOnNonRomanChars() {
      $rb = new RomanBinary();
      $this->assertEquals('Your string must only contain Roman Numerals', $rb->getBase10('5'));
   }
   function testItShouldFailOnNonRomanCharPatterns() {
      $rb = new RomanBinary();
      while (list(, $value) = each($this->illegalRomanValues)) {
        $this->assertEquals('That is not a valid roman numeral', $rb->getBase10($value));
      }
   }
   #Basic Single values test using romanTokes keys and values
   function testRomanSimpleSingles() {
      $rb = new RomanBinary();
      while (list($key, $value) = each($this->romanTokens)) {
        $this->assertEquals($value, $rb->getBase10($key));
      }
   }

   #Simple incrememntal addition test only
   function testRomanSimpleAddition(){
      $rb = new RomanBinary();
      while (list($key, $value) = each($this->validAdditionList)) {
        $this->assertEquals($value, $rb->getBase10($key));
      }
   }

   #Simple test of Roman values which subtract (IV, IX, XL)
   function testRomanSimpleSubtraction(){
      $rb = new RomanBinary();
      while (list($key, $value) = each($this->validSubtractionList)) {
        $this->assertEquals($value, $rb->getBase10($key));
      }
   }
}
?>
