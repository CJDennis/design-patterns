<?php
namespace CJDennis\Builder;

require_once 'text-builder.class.php';

class HtmlElement {
  const TEXT = 1;
  const STYLE = 2;

  protected $type;
  protected $content;

  public function __construct($type, $content) {
    $this->type = $type;
    $this->content = $content;
  }

  public function get_type() {
    return $this->type;
  }

  public function get_text() {
    return $this->content;
  }

  public function get_style() {
    return $this->content;
  }
}
