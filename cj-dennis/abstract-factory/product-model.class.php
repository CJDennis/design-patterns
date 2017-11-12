<?php
namespace CJDennis\AbstractFactory;

interface ProductModel {
  function get_product_name();
  function get_product_price();
  function get_product_availability();
}
