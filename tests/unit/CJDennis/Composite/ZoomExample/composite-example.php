<?php
require_once 'composite/leaf.class.php';
require_once 'composite/composite.class.php';

interface CompositeExample {
  // All public functions that should be defined for both leaf nodes and composites
  function get_text();
}

class CompositeExampleLeaf extends CJDennis\Composite\Leaf implements CompositeExample {
  protected $text;

  public function set_text($text) {
    $this->text = $text;
  }

  public function get_text() {
    return $this->text;
  }
}

class CompositeExampleComposite extends CJDennis\Composite\Composite implements CompositeExample {
  public function get_text() {
    $separator = '';
    $text = '';
    foreach ($this->children as $child) {
      $text .= "{$separator}{$child->get_text()}";
      $separator = ', ';
    }

    return $text;
  }
}
