<?php
namespace CJDennis\ChainOfResponsibility;

require_once 'phone-number-formatter.class.php';

class AustralianCountryVictorianPhoneNumberFormatter extends PhoneNumberFormatter {
  protected function can_format_phone_number(PhoneNumber $phone_number) {
    return preg_match('/^035\d{7}$/', $phone_number->get_phone_number());
  }

  protected function format_phone_number(PhoneNumber $phone_number) {
    return preg_replace('/^(\d\d)(\d\d)(\d{3})(\d{3})$/', '($1) $2 $3 $4', $phone_number->get_phone_number());
  }
}
