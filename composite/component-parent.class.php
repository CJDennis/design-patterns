<?php
namespace CJDennis\Composite;

require_once 'component-to-parent.class.php';

class ComponentParentException extends \Exception {}

trait ComponentParent {
  protected $parent_component;

  public function add_to_parent(Composite $parent_component) {
    if ($this->parent_component !== null) {
      throw new ComponentParentException("This component already has a parent");
    }
    $parent_component->add_child($this);
    $this->parent_component = $parent_component;
  }

  public function remove_from_parent() {
    if (!($this->parent_component instanceof Composite)) {
      throw new ComponentParentException("This component does not have a valid parent");
    }
    $this->parent_component->remove_child($this);
    $this->parent_component = null;
  }
}
