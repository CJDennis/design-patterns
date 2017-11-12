<?php
namespace CJDennis\AbstractFactory;

require_once 'cj-dennis/abstract-factory/product-model.class.php';

class MssqlProductModel implements ProductModel {
  public function get_product_name() {}
  public function get_product_price() {}
  public function get_product_availability() {}
}
