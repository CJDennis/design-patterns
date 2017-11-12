<?php
namespace CJDennis\AbstractFactory;

interface CustomerModel {
  function get_customer_name();
  function get_customer_address();
  function get_customer_orders();
}
