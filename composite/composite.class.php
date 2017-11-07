<?php
namespace CJDennis\Composite;

require_once 'component.class.php';

class CompositeException extends \Exception {}

class Composite implements Component, ComponentChildren, ComponentToParent {
  use ComponentParent;

  protected $children;

  public function __construct() {
    // $this->children could be a class instead of an array
    $this->children = [];
  }

  public function get_composite() {
    return $this;
  }

  public function add_child(Component $child) {
    $this->children[] = $child;
  }

  public function remove_child(Component $child) {
    $index = array_search($child, $this->children, true);
    if ($index === false) {
      throw new CompositeException("Child to remove not found");
    }
    unset($this->children[$index]);
  }

  public function get_child($index) {
    return $this->children[$index];
  }
}
