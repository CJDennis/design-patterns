<?php
namespace CJDennis\AbstractFactory;

require_once 'cj-dennis/abstract-factory/customer-model.class.php';

class PostgresqlCustomerModel implements CustomerModel {
  public function get_customer_name() {}
  public function get_customer_address() {}
  public function get_customer_orders() {}
}
