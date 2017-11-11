<?php
namespace CJDennis\Composite;

require_once 'cj-dennis/composite/composite.class.php';

class CompositeSeam extends Composite {
  public function get_child_seam($index) {
    return $this->children[$index];
  }

  public function count_children() {
    return count($this->children);
  }
}
