<?php
namespace CJDennis\ChainOfResponsibility;

require_once 'chain-of-responsibility/request-handler.class.php';
require_once 'phone-number.class.php';

abstract class PhoneNumberFormatter extends RequestHandler {
  protected function can_handle_request(Request $request) {
    return $this->can_format_phone_number($request);
  }

  protected function fulfil_request(Request $request) {
    return $this->format_phone_number($request);
  }

  abstract protected function can_format_phone_number(PhoneNumber $phone_number);
  abstract protected function format_phone_number(PhoneNumber $phone_number);
}
