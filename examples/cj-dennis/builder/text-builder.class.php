<?php
namespace CJDennis\Builder;

abstract class TextBuilder {
  public function build_text($text) {}
  public function build_style($style) {}
  abstract public function get_result();
}
