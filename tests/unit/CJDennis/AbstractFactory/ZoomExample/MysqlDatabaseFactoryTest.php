<?php
namespace CJDennis\AbstractFactory;

require_once 'examples/cj-dennis/abstract-factory/mysql-database-factory.class.php';

class MysqlDatabaseFactoryTest extends \Codeception\Test\Unit {
  /**
   * @var \UnitTester
   */
  protected $tester;

  protected function _before() {
  }

  protected function _after() {
  }

  // tests
  public function testShouldCreateAnInstanceOfDatabaseFactoryWhenCreatingANewMysqlDatabaseFactory() {
    $mysql_database_factory = new MysqlDatabaseFactory();
    $this->assertInstanceOf('CJDennis\AbstractFactory\DatabaseFactory', $mysql_database_factory);
  }

  public function testShouldReturnAnInstanceOfCustomerModelWhenFetchingACustomer() {
    $mysql_database_factory = new MysqlDatabaseFactory();
    $this->assertInstanceOf('CJDennis\AbstractFactory\CustomerModel', $mysql_database_factory->create_customer());
  }

  public function testShouldReturnAnInstanceOfProductModelWhenFetchingACustomer() {
    $mysql_database_factory = new MysqlDatabaseFactory();
    $this->assertInstanceOf('CJDennis\AbstractFactory\ProductModel', $mysql_database_factory->create_product());
  }

  public function testShouldCreateAnInstanceOfMysqlDatabaseFactoryWhenCreatingANewMysqlDatabaseFactory() {
    $mysql_database_factory = new MysqlDatabaseFactory();
    $this->assertInstanceOf('CJDennis\AbstractFactory\MysqlDatabaseFactory', $mysql_database_factory);
  }

  public function testShouldReturnAnInstanceOfMysqlCustomerModelWhenFetchingACustomer() {
    $mysql_database_factory = new MysqlDatabaseFactory();
    $this->assertInstanceOf('CJDennis\AbstractFactory\MysqlCustomerModel', $mysql_database_factory->create_customer());
  }

  public function testShouldReturnAnInstanceOfMysqlProductModelWhenFetchingACustomer() {
    $mysql_database_factory = new MysqlDatabaseFactory();
    $this->assertInstanceOf('CJDennis\AbstractFactory\MysqlProductModel', $mysql_database_factory->create_product());
  }
}
