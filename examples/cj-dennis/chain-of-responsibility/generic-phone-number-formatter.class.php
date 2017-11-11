<?php
namespace CJDennis\ChainOfResponsibility;

require_once 'phone-number-formatter.class.php';

class GenericPhoneNumberFormatter extends PhoneNumberFormatter {
  protected function can_format_phone_number(PhoneNumber $phone_number) {
    return false;
  }

  protected function format_phone_number(PhoneNumber $phone_number) {}
}
