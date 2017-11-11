<?php
namespace CJDennis\ChainOfResponsibility;

require_once 'cj-dennis/chain-of-responsibility/request-handler.class.php';

class RequestHandlerSeam extends RequestHandler {
  protected $can_handle_request = false;

  public function set_can_handle_request() {
    $this->can_handle_request = true;
  }

  protected function can_handle_request(Request $request) {
    return $this->can_handle_request;
  }

  protected function fulfil_request(Request $request) {}
}
