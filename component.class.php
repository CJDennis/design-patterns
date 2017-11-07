<?php
namespace CJDennis\Composite;

require_once 'composite.class.php';

interface Component {
  function get_composite();
  function get_child($index);
}

interface ComponentChildren {
  function add_child(Component $child);
  function remove_child(Component $child);
}

interface ComponentToParent {
  function add_to_parent(Composite $parent);
  function remove_from_parent();
}

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
