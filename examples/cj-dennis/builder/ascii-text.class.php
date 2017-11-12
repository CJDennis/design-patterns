<?php
namespace CJDennis\Builder;

require_once 'text-builder.class.php';

class AsciiText extends TextBuilder {
  protected $representation = '';

  public function build_text($text) {
    $this->representation .= $text;
  }

  public function get_result() {
    return $this->representation;
  }
}
