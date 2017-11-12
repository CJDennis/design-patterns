<?php
namespace CJDennis\AbstractFactory;

abstract class ProductModel {
  abstract function get_product_name();
  abstract function get_product_price();
  abstract function get_product_availability();
}
