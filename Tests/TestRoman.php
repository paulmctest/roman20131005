<?php
require_once 'PHPUnit/Autoload.php';
require_once dirname(__FILE__) . '/../RomanBinary.php';
 
class RomanBinaryTest extends PHPUnit_Framework_TestCase {

    private $romanTokens        =   ['I'=>1, 'V'=>'5', 'X'=>'10', 'L'=>50, 'C'=>100, 'D'=>500, 'M'=>1000 ];
    private $subtractionPairs   =   ['V'=>'I', 'X'=>'I', 'L'=>'X', 'C'=>'X', 'D'=>'C', 'M'=>'C' ];
    private $illegalValues      = [ 'IM','VM','LM','DM', 'ID','VD','LD','XD', 
                                     'IC','VC','LC', 'IC', 'VC', 'VX','DD','VV','LL' ];
    //private $legalExamples      = [ 'M','LM','DM', 'ID','VD','LD','XD', 'IC','VC','LC', 'IC', 'VC', 'VX' ];
    private $additionList       = [ 'MM'=>2000,'MMM'=>3000 ];

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
   function testItShouldFailOnIllegalCharPatterns() {
      $rb = new RomanBinary();
      while (list(, $value) = each($this->illegalValues)) {
        $this->assertEquals('That is not a valid roman numeral', $rb->getBase10($value));
      }
   }
   #Basic Single values test using romanTokes keys and values
   function testSimpleSingles() {
      $rb = new RomanBinary();
      reset($this->romanTokens);
      while (list($key, $value) = each($this->romanTokens)) {
        $this->assertEquals($value, $rb->getBase10($key));
      }
   }

   #Simple incrememntal addition test only
   function testSimpleAddition(){
      $rb = new RomanBinary();
      while (list($key, $value) = each($this->additionList)) {
        $this->assertEquals($value, $rb->getBase10($key));
      }
   }
}
?>
