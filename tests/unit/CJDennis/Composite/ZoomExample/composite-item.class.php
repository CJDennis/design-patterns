<?php
namespace CJDennis\Composite;

interface CompositeItem {
  // All public functions that should be defined for both leaf nodes and composites
  function get_text();
}
