<?php
namespace CJDennis\AbstractFactory;

require_once 'customer-model.class.php';
require_once 'product-model.class.php';

abstract class DatabaseFactory {
  /** return instanceof CustomerModel */
  abstract function create_customer();
  /** return instanceof ProductModel */
  abstract function create_product();
}
