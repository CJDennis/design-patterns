<?php
namespace CJDennis\Composite;

interface ComponentChildren {
  function add_child(Component $child);
  function remove_child(Component $child);
}
