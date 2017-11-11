<?php
namespace CJDennis\Composite;

require_once 'composite-example.php';

class CompositeExampleTest extends \Codeception\Test\Unit {
  /**
   * @var \UnitTester
   */
  protected $tester;

  protected function _before() {
  }

  protected function _after() {
  }

  // tests
  public function testShouldConcatenateTheTextTogether() {
    // Builds a structure like this:
    // [
    //   'Baz',
    //   [
    //     'Foo',
    //     'Bar',
    //   ],
    // ]
    $component = new CompositeItemLeaf();
    $component->set_text('Foo');
    $composite_component = new CompositeItemComposite();
    $composite_component->add_child($component);

    $component = new CompositeItemLeaf();
    $component->set_text('Bar');
    $composite_component->add_child($component);

    $component = new CompositeItemLeaf();
    $component->set_text('Baz');
    $root_component = new CompositeItemComposite();
    $root_component->add_child($component);
    $root_component->add_child($composite_component);

    $this->assertSame('Baz, Foo, Bar', $root_component->get_text());
  }
}
