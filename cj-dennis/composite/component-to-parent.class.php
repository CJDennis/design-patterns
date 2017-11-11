<?php
namespace CJDennis\Composite;

interface ComponentToParent {
  function add_to_parent(Composite $parent);
  function remove_from_parent();
}
