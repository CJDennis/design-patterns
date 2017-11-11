<?php
namespace CJDennis\ChainOfResponsibility;

require_once 'request.class.php';

class UnhandledRequestException extends \Exception {}

abstract class RequestHandler {
  protected $successor;

  public function __construct(RequestHandler $successor = null) {
    $this->successor = $successor;
  }

  final public function handle_request(Request $request) {
    $result = null;
    if ($this->can_handle_request($request)) {
      $result = $this->fulfil_request($request);
    }
    elseif ($this->successor) {
      $result = $this->successor->handle_request($request);
    }
    else {
      throw new UnhandledRequestException();
    }

    return $result;
  }

  abstract protected function can_handle_request(Request $request);
  abstract protected function fulfil_request(Request $request);
}
