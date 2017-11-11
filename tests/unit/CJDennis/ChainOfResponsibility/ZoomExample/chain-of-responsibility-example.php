<?php
namespace CJDennis\ChainOfResponsibility;

require_once 'chain-of-responsibility/request-handler.class.php';

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

class PhoneNumber extends Request {
  protected $phone_number;
  public function __construct($phone_number) {
    $this->phone_number = $phone_number;
  }

  public function get_phone_number() {
    return $this->phone_number;
  }
}

class GenericPhoneNumberFormatter extends PhoneNumberFormatter {
  protected function can_format_phone_number(PhoneNumber $phone_number) {
    return false;
  }

  protected function format_phone_number(PhoneNumber $phone_number) {}
}

class AustralianPhoneNumberFormatter extends PhoneNumberFormatter {
  protected function can_format_phone_number(PhoneNumber $phone_number) {
    return preg_match('/^\d{10}$/', $phone_number->get_phone_number());
  }

  protected function format_phone_number(PhoneNumber $phone_number) {
    return preg_replace('/^(\d\d)(\d{4})(\d{4})$/', '$1 $2 $3', $phone_number->get_phone_number());
  }
}

class AustralianMobilePhoneNumberFormatter extends PhoneNumberFormatter {
  protected function can_format_phone_number(PhoneNumber $phone_number) {
    return preg_match('/^04\d{8}$/', $phone_number->get_phone_number());
  }

  protected function format_phone_number(PhoneNumber $phone_number) {
    return preg_replace('/^(\d{4})(\d{3})(\d{3})$/', '$1 $2 $3', $phone_number->get_phone_number());
  }
}

class AustralianMelbournePhoneNumberFormatter extends PhoneNumberFormatter {
  protected function can_format_phone_number(PhoneNumber $phone_number) {
    return preg_match('/^03[89]\d{7}$/', $phone_number->get_phone_number());
  }

  protected function format_phone_number(PhoneNumber $phone_number) {
    return preg_replace('/^(\d\d)(\d{4})(\d{4})$/', '($1) $2 $3', $phone_number->get_phone_number());
  }
}

class AustralianVictorianPhoneNumberFormatter extends PhoneNumberFormatter {
  protected function can_format_phone_number(PhoneNumber $phone_number) {
    return preg_match('/^035\d{7}$/', $phone_number->get_phone_number());
  }

  protected function format_phone_number(PhoneNumber $phone_number) {
    return preg_replace('/^(\d\d)(\d\d)(\d{3})(\d{3})$/', '($1) $2 $3 $4', $phone_number->get_phone_number());
  }
}
