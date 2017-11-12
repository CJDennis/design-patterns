<?php
namespace CJDennis\AbstractFactory;

require_once 'cj-dennis/abstract-factory/database-factory.class.php';
require_once 'mssql-customer-model.class.php';
require_once 'mssql-product-model.class.php';

class MssqlDatabaseFactory extends DatabaseFactory {
  public function create_customer() {
    return new MssqlCustomerModel();
  }

  public function create_product() {
    return new MssqlProductModel();
  }
}
