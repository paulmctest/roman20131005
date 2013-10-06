<?php
require_once 'PHPUnit/Autoload.php';
require_once dirname(__FILE__) . '/../RomanBinary.php';
 
class RomanBinaryTest extends PHPUnit_Framework_TestCase {

   function testCanCreateClass() {
      $wrapper = new RomanBinary();
   }
/* 
   function testItShouldWrapAnEmptyString() {
      $rn = new RomanBinary();
      $this->assertEquals('', $rn->roman(''));
   }
*/ 
}
?>
