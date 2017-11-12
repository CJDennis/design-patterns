<?php
namespace CJDennis\Builder;

require_once 'examples/cj-dennis/builder/html-reader.class.php';
require_once 'examples/cj-dennis/builder/office-text.class.php';

class OfficeTextTest extends \Codeception\Test\Unit {
  /**
   * @var \UnitTester
   */
  protected $tester;

  protected function _before() {
  }

  protected function _after() {
  }

  // tests
  public function testSomeFeature() {
    $office_text = new OfficeText();
    $html_reader = new HtmlReader($office_text);
    $html_reader->build();
    $this->assertSame('\BHello, World!\b', $office_text->get_result());
  }
}
