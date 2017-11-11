<?php
namespace CJDennis\ChainOfResponsibility;

require_once 'phone-number-formatter.class.php';

class AustralianMobilePhoneNumberFormatter extends PhoneNumberFormatter {
  protected function can_format_phone_number(PhoneNumber $phone_number) {
    return preg_match('/^04\d{8}$/', $phone_number->get_phone_number());
  }

  protected function format_phone_number(PhoneNumber $phone_number) {
    return preg_replace('/^(\d{4})(\d{3})(\d{3})$/', '$1 $2 $3', $phone_number->get_phone_number());
  }
}
