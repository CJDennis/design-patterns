<?php
namespace CJDennis\ChainOfResponsibility;

require_once 'examples/cj-dennis/chain-of-responsibility/chain-of-responsibility-example.php';

class ChainOfResponsibilityExampleTest extends \Codeception\Test\Unit {
  /**
   * @var \UnitTester
   */
  protected $tester;

  protected function _before() {
  }

  protected function _after() {
  }

  // tests
  public function testShouldFormatAMelburnianPhoneNumber() {
    $australian_phone_number_formatter = new AustralianPhoneNumberFormatter();
    $mobile_number_formatter = new AustralianMobilePhoneNumberFormatter($australian_phone_number_formatter);
    $melbourne_number_formatter = new AustralianMetropolitanVictorianPhoneNumberFormatter($mobile_number_formatter);
    $victorian_number_formatter = new AustralianCountryVictorianPhoneNumberFormatter($melbourne_number_formatter);
    $generic_number_formatter = new GenericPhoneNumberFormatter($victorian_number_formatter);

    $phone_number = new PhoneNumber('0398765432');
    $this->assertSame('(03) 9876 5432', $generic_number_formatter->handle_request($phone_number));
  }

  public function testShouldFormatACountryVictorianPhoneNumber() {
    $australian_phone_number_formatter = new AustralianPhoneNumberFormatter();
    $mobile_number_formatter = new AustralianMobilePhoneNumberFormatter($australian_phone_number_formatter);
    $melbourne_number_formatter = new AustralianMetropolitanVictorianPhoneNumberFormatter($mobile_number_formatter);
    $victorian_number_formatter = new AustralianCountryVictorianPhoneNumberFormatter($melbourne_number_formatter);
    $generic_number_formatter = new GenericPhoneNumberFormatter($victorian_number_formatter);

    $phone_number = new PhoneNumber('0354321987');
    $this->assertSame('(03) 54 321 987', $generic_number_formatter->handle_request($phone_number));
  }

  public function testShouldFormatAnAustralianMobilePhoneNumber() {
    $australian_phone_number_formatter = new AustralianPhoneNumberFormatter();
    $mobile_number_formatter = new AustralianMobilePhoneNumberFormatter($australian_phone_number_formatter);
    $melbourne_number_formatter = new AustralianMetropolitanVictorianPhoneNumberFormatter($mobile_number_formatter);
    $victorian_number_formatter = new AustralianCountryVictorianPhoneNumberFormatter($melbourne_number_formatter);
    $generic_number_formatter = new GenericPhoneNumberFormatter($victorian_number_formatter);

    $phone_number = new PhoneNumber('0432198765');
    $this->assertSame('0432 198 765', $generic_number_formatter->handle_request($phone_number));
  }

  public function testShouldFormatAnAustralianPhoneNumber() {
    $australian_phone_number_formatter = new AustralianPhoneNumberFormatter();
    $mobile_number_formatter = new AustralianMobilePhoneNumberFormatter($australian_phone_number_formatter);
    $melbourne_number_formatter = new AustralianMetropolitanVictorianPhoneNumberFormatter($mobile_number_formatter);
    $victorian_number_formatter = new AustralianCountryVictorianPhoneNumberFormatter($melbourne_number_formatter);
    $generic_number_formatter = new GenericPhoneNumberFormatter($victorian_number_formatter);

    $phone_number = new PhoneNumber('0543219876');
    $this->assertSame('05 4321 9876', $generic_number_formatter->handle_request($phone_number));
  }
}
