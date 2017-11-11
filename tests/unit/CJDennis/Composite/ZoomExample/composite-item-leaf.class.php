<?php
namespace CJDennis\Composite;

require_once 'composite/leaf.class.php';
require_once 'composite-item.class.php';

class CompositeItemLeaf extends Leaf implements CompositeItem {
  protected $text;

  public function set_text($text) {
    $this->text = $text;
  }

  public function get_text() {
    return $this->text;
  }
}
