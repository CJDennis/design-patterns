<?php
namespace CJDennis\Composite;

require_once 'composite-seam.class.php';

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
    $component = new CompositeSeam();
    $child_component = new Composite();
    $component->add_child($child_component);
    $this->assertSame($child_component, $component->get_child_seam(0));
  }

  public function testShouldThrowAnExceptionWhenRemovingANonexistentChild() {
    $component = new Composite();
    $child_component = new Composite();
    $this->tester->expectException(new CompositeException("Child to remove not found"), function () use ($component, $child_component) {
      $component->remove_child($child_component);
    });
  }

  public function testShouldRemoveAChild() {
    $component = new CompositeSeam();
    $child_component = new Composite();
    $component->add_child($child_component);
    $this->assertSame(1, $component->count_children());
    $component->remove_child($child_component);
    $this->assertSame(0, $component->count_children());
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
    $parent_component = new CompositeSeam();
    $component->add_to_parent($parent_component);
    $this->assertSame($component, $parent_component->get_child_seam(0));
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
    $parent_component = new CompositeSeam();
    $component->add_to_parent($parent_component);
    $this->assertSame(1, $parent_component->count_children());
    $component->remove_from_parent($parent_component);
    $this->assertSame(0, $parent_component->count_children());
  }

  public function testShouldGetAChild() {
    $component = new Composite();
    $child_component = new Composite();
    $component->add_child($child_component);
    $this->assertSame($child_component, $component->get_child(0));
  }
}
