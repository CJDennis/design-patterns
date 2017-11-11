<?php
namespace CJDennis\Composite;

require_once 'cj-dennis/composite/composite.class.php';
require_once 'composite-item.class.php';

class CompositeItemComposite extends Composite implements CompositeItem {
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
