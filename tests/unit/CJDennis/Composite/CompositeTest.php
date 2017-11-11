<?php
namespace CJDennis\Composite;

require_once 'cj-dennis/composite/composite.class.php';

class CompositeTest extends \Codeception\Test\Unit {
  /**
   * @var \UnitTester
   */
  protected $tester;

  protected function _before() {
  }

  protected function _after() {
  }

  // tests
  public function testShouldReturnSelfWhenGettingComposite() {
    $component = new Composite();
    $this->assertInstanceOf('CJDennis\Composite\Composite', $component->get_composite());
  }

  public function testShouldAddAChild() {
    $component = new Composite();
    $component->add_child(new Composite());
  }

  public function testShouldThrowAnExceptionWhenRemovingANonexistentChild() {
    $component = new Composite();
    $child_component = new Composite();
    $this->tester->expectException(new CompositeException("Child to remove not found"), function () use ($component, $child_component) {
      $component->remove_child($child_component);
    });
  }

  public function testShouldRemoveAChild() {
    $component = new Composite();
    $child_component = new Composite();
    $component->add_child($child_component);
    $component->remove_child($child_component);
  }

  public function testShouldThrowAnExceptionWhenAddingToALeafParent() {
    $component = new Composite();
    $parent_component = new Leaf();
    $this->tester->expectException('Exception', function () use ($component, $parent_component) {
      $component->add_to_parent($parent_component);
    });
  }

  public function testShouldAddToACompositeParent() {
    $component = new Composite();
    $parent_component = new Composite();
    $component->add_to_parent($parent_component);
  }

  public function testShouldThrowAnExceptionWhenTheComponentAlreadyHasAParent() {
    $component = new Composite();
    $parent_component = new Composite();
    $component->add_to_parent($parent_component);
    $this->tester->expectException(new ComponentParentException("This component already has a parent"), function () use ($component, $parent_component) {
      $component->add_to_parent($parent_component);
    });
  }

  public function testShouldThrowAnExceptionWhenRemovingFromALeafParent() {
    $component = new Composite();
    $parent_component = new Leaf();
    $this->tester->expectException(new ComponentParentException("This component does not have a valid parent"), function () use ($component, $parent_component) {
      $component->remove_from_parent($parent_component);
    });
  }

  public function testShouldRemoveFromACompositeParent() {
    $component = new Composite();
    $parent_component = new Composite();
    $component->add_to_parent($parent_component);
    $component->remove_from_parent($parent_component);
  }

  public function testShouldGetAChild() {
    $component = new Composite();
    $child_component = new Composite();
    $component->add_child($child_component);
    $this->assertSame($child_component, $component->get_child(0));
  }
}
