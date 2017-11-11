<?php
namespace CJDennis\ChainOfResponsibility;

class PhoneNumber extends Request {
  protected $phone_number;
  public function __construct($phone_number) {
    $this->phone_number = $phone_number;
  }

  public function get_phone_number() {
    return $this->phone_number;
  }
}
