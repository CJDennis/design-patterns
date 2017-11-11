<?php
namespace CJDennis\Composite;

require_once 'component.class.php';
require_once 'component-children.class.php';
require_once 'component-parent.class.php';

class LeafException extends \Exception {}

class Leaf implements Component, ComponentChildren, ComponentToParent {
  use ComponentParent;

  public function get_composite() {
    return null;
  }

  public function add_child(Component $child) {
    throw new LeafException("A Leaf can't have children");
  }

  public function remove_child(Component $child) {
    throw new LeafException("A Leaf can't have children");
  }

  public function get_child($index) {
    throw new LeafException("A Leaf can't have children");
  }
}
