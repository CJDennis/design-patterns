<?php
namespace CJDennis\AbstractFactory;

require_once 'examples/cj-dennis/abstract-factory/mssql-database-factory.class.php';

class MssqlDatabaseFactoryTest extends \Codeception\Test\Unit {
  /**
   * @var \UnitTester
   */
  protected $tester;

  protected function _before() {
  }

  protected function _after() {
  }

  // tests
  public function testShouldCreateAnInstanceOfDatabaseFactoryWhenCreatingANewMssqlDatabaseFactory() {
    $mssql_database_factory = new MssqlDatabaseFactory();
    $this->assertInstanceOf('CJDennis\AbstractFactory\DatabaseFactory', $mssql_database_factory);
  }

  public function testShouldReturnAnInstanceOfCustomerModelWhenFetchingACustomer() {
    $mssql_database_factory = new MssqlDatabaseFactory();
    $this->assertInstanceOf('CJDennis\AbstractFactory\CustomerModel', $mssql_database_factory->create_customer());
  }

  public function testShouldReturnAnInstanceOfProductModelWhenFetchingACustomer() {
    $mssql_database_factory = new MssqlDatabaseFactory();
    $this->assertInstanceOf('CJDennis\AbstractFactory\ProductModel', $mssql_database_factory->create_product());
  }

  public function testShouldCreateAnInstanceOfMssqlDatabaseFactoryWhenCreatingANewMssqlDatabaseFactory() {
    $mssql_database_factory = new MssqlDatabaseFactory();
    $this->assertInstanceOf('CJDennis\AbstractFactory\MssqlDatabaseFactory', $mssql_database_factory);
  }

  public function testShouldReturnAnInstanceOfMssqlCustomerModelWhenFetchingACustomer() {
    $mssql_database_factory = new MssqlDatabaseFactory();
    $this->assertInstanceOf('CJDennis\AbstractFactory\MssqlCustomerModel', $mssql_database_factory->create_customer());
  }

  public function testShouldReturnAnInstanceOfMssqlProductModelWhenFetchingACustomer() {
    $mssql_database_factory = new MssqlDatabaseFactory();
    $this->assertInstanceOf('CJDennis\AbstractFactory\MssqlProductModel', $mssql_database_factory->create_product());
  }
}
