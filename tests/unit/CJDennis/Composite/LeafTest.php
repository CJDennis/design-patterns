<?php
namespace CJDennis\Composite;

require_once 'cj-dennis/composite/leaf.class.php';
require_once 'composite-seam.class.php';

class LeafTest extends \Codeception\Test\Unit {
  /**
   * @var \UnitTester
   */
  protected $tester;

  protected function _before() {
  }

  protected function _after() {
  }

  // tests
  public function testShouldReturnNullWhenGettingComposite() {
    $component = new Leaf();
    $this->assertNull($component->get_composite());
  }

  public function testShouldThrowAnExceptionWhenAddingAChild() {
    $component = new Leaf();
    $this->tester->expectException(new LeafException("A Leaf can't have children"), function () use ($component) {
      $component->add_child(new Leaf());
    });
  }

  public function testShouldThrowAnExceptionWhenRemovingAChild() {
    $component = new Leaf();
    $this->tester->expectException(new LeafException("A Leaf can't have children"), function () use ($component) {
      $component->remove_child(new Leaf());
    });
  }

  public function testShouldThrowAnExceptionWhenAddingToALeafParent() {
    $component = new Leaf();
    $parent_component = new Leaf();
    $this->tester->expectException('Exception', function () use ($component, $parent_component) {
      $component->add_to_parent($parent_component);
    });
  }

  public function testShouldAddToACompositeParent() {
    $component = new Leaf();
    $parent_component = new CompositeSeam();
    $component->add_to_parent($parent_component);
    $this->assertSame($component, $parent_component->get_child_seam(0));
  }

  public function testShouldThrowAnExceptionWhenTheComponentAlreadyHasAParent() {
    $component = new Leaf();
    $parent_component = new Composite();
    $component->add_to_parent($parent_component);
    $this->tester->expectException(new ComponentParentException("This component already has a parent"), function () use ($component, $parent_component) {
      $component->add_to_parent($parent_component);
    });
  }

  public function testShouldThrowAnExceptionWhenRemovingFromALeafParent() {
    $component = new Leaf();
    $parent_component = new Leaf();
    $this->tester->expectException(new ComponentParentException("This component does not have a valid parent"), function () use ($component, $parent_component) {
      $component->remove_from_parent($parent_component);
    });
  }

  public function testShouldRemoveFromACompositeParent() {
    $component = new Leaf();
    $parent_component = new CompositeSeam();
    $component->add_to_parent($parent_component);
    $this->assertSame(1, $parent_component->count_children());
    $component->remove_from_parent($parent_component);
    $this->assertSame(0, $parent_component->count_children());
  }

  public function testShouldThrowAnExceptionWhenGettingAChild() {
    $component = new Leaf();
    $this->tester->expectException(new LeafException("A Leaf can't have children"), function () use ($component) {
      $component->get_child(0);
    });
  }
}
