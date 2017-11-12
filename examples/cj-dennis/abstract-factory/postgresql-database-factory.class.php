<?php
namespace CJDennis\AbstractFactory;

require_once 'cj-dennis/abstract-factory/database-factory.class.php';
require_once 'postgresql-customer-model.class.php';
require_once 'postgresql-product-model.class.php';

class PostgresqlDatabaseFactory implements DatabaseFactory {
  public function create_customer() {
    return new PostgresqlCustomerModel();
  }

  public function create_product() {
    return new PostgresqlProductModel();
  }
}
