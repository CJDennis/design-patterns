<?php
namespace CJDennis\AbstractFactory;

abstract class CustomerModel {
  abstract function get_customer_name();
  abstract function get_customer_address();
  abstract function get_customer_orders();
}
