<?php
namespace CJDennis\Builder;

require_once 'examples/cj-dennis/builder/html-reader.class.php';
require_once 'examples/cj-dennis/builder/ascii-text.class.php';

class AsciiTextTest extends \Codeception\Test\Unit {
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
    $ascii_text = new AsciiText();
    $html_reader = new HtmlReader($ascii_text);
    $html_reader->build();
    $this->assertSame('Hello, World!', $ascii_text->get_result());
  }
}
