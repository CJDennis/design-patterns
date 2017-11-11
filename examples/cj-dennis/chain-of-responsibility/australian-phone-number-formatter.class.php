<?php
namespace CJDennis\ChainOfResponsibility;

require_once 'phone-number-formatter.class.php';

class AustralianPhoneNumberFormatter extends PhoneNumberFormatter {
  protected function can_format_phone_number(PhoneNumber $phone_number) {
    return preg_match('/^\d{10}$/', $phone_number->get_phone_number());
  }

  protected function format_phone_number(PhoneNumber $phone_number) {
    return preg_replace('/^(\d\d)(\d{4})(\d{4})$/', '$1 $2 $3', $phone_number->get_phone_number());
  }
}
