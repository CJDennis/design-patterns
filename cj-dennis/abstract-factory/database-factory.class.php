<?php
namespace CJDennis\AbstractFactory;

require_once 'customer-model.class.php';
require_once 'product-model.class.php';

interface DatabaseFactory {
  /** return instanceof CustomerModel */
  function create_customer();
  /** return instanceof ProductModel */
  function create_product();
}
