<?php
namespace CJDennis\AbstractFactory;

require_once 'cj-dennis/abstract-factory/database-factory.class.php';
require_once 'mysql-customer-model.class.php';
require_once 'mysql-product-model.class.php';

class MysqlDatabaseFactory extends DatabaseFactory {
  public function create_customer() {
    return new MysqlCustomerModel();
  }

  public function create_product() {
    return new MysqlProductModel();
  }
}
