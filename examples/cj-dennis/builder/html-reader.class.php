<?php
namespace CJDennis\Builder;

require_once 'html-element.class.php';
require_once 'text-builder.class.php';

class HtmlReader {
  protected $structure;
  protected $builder;

  public function __construct(TextBuilder $builder) {
    $this->builder = $builder;
    $this->structure = [];
    $this->structure[] = new HtmlElement(HtmlElement::STYLE, 'START_BOLD');
    $this->structure[] = new HtmlElement(HtmlElement::TEXT, 'Hello, World!');
    $this->structure[] = new HtmlElement(HtmlElement::STYLE, 'END_BOLD');
  }

  public function build() {
    foreach ($this->structure as $object) {
      switch ($object->get_type()) {
        case HtmlElement::TEXT: {
          $this->builder->build_text($object->get_text());
          break;
        }
        case HtmlElement::STYLE: {
          $this->builder->build_style($object->get_style());
          break;
        }
      }
    }
  }
}
