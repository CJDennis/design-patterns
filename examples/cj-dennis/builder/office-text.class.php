<?php
namespace CJDennis\Builder;

require_once 'text-builder.class.php';

class OfficeText extends TextBuilder {
  protected $representation = '';

  public function build_text($text) {
    $this->representation .= $text;
  }

  public function build_style($style) {
    switch ($style) {
      case 'START_BOLD': {
        $this->representation .= '\B';
        break;
      }
      case 'END_BOLD': {
        $this->representation .= '\b';
        break;
      }
    }
  }

  public function get_result() {
    return $this->representation;
  }
}
