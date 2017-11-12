<?php
namespace CJDennis\AbstractFactory;

require_once 'examples/cj-dennis/abstract-factory/postgresql-database-factory.class.php';

class PostgresqlDatabaseFactoryTest extends \Codeception\Test\Unit {
  /**
   * @var \UnitTester
   */
  protected $tester;

  protected function _before() {
  }

  protected function _after() {
  }

  // tests
  public function testShouldCreateAnInstanceOfDatabaseFactoryWhenCreatingANewPostgresqlDatabaseFactory() {
    $postgresql_database_factory = new PostgresqlDatabaseFactory();
    $this->assertInstanceOf('CJDennis\AbstractFactory\DatabaseFactory', $postgresql_database_factory);
  }

  public function testShouldReturnAnInstanceOfCustomerModelWhenFetchingACustomer() {
    $postgresql_database_factory = new PostgresqlDatabaseFactory();
    $this->assertInstanceOf('CJDennis\AbstractFactory\CustomerModel', $postgresql_database_factory->create_customer());
  }

  public function testShouldReturnAnInstanceOfProductModelWhenFetchingACustomer() {
    $postgresql_database_factory = new PostgresqlDatabaseFactory();
    $this->assertInstanceOf('CJDennis\AbstractFactory\ProductModel', $postgresql_database_factory->create_product());
  }

  public function testShouldCreateAnInstanceOfPostgresqlDatabaseFactoryWhenCreatingANewPostgresqlDatabaseFactory() {
    $postgresql_database_factory = new PostgresqlDatabaseFactory();
    $this->assertInstanceOf('CJDennis\AbstractFactory\PostgresqlDatabaseFactory', $postgresql_database_factory);
  }

  public function testShouldReturnAnInstanceOfPostgresqlCustomerModelWhenFetchingACustomer() {
    $postgresql_database_factory = new PostgresqlDatabaseFactory();
    $this->assertInstanceOf('CJDennis\AbstractFactory\PostgresqlCustomerModel', $postgresql_database_factory->create_customer());
  }

  public function testShouldReturnAnInstanceOfPostgresqlProductModelWhenFetchingACustomer() {
    $postgresql_database_factory = new PostgresqlDatabaseFactory();
    $this->assertInstanceOf('CJDennis\AbstractFactory\PostgresqlProductModel', $postgresql_database_factory->create_product());
  }
}
