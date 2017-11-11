<?php
namespace CJDennis\Composite;

interface Component {
  function get_composite();
  function get_child($index);
}
