<?php
namespace CJDennis\ChainOfResponsibility;

require_once 'request-handler-seam.class.php';

class RequestHandlerTest extends \Codeception\Test\Unit {
  /**
   * @var \UnitTester
   */
  protected $tester;

  protected function _before() {
  }

  protected function _after() {
  }

  // tests
  public function testShouldConstructARequestHandlerWithNoParentHandler() {
    $request_handler = new RequestHandlerSeam();
  }

  public function testShouldFailToConstructARequestHandlerWithANonRequestHandlerParent() {
    $this->tester->expectException('Exception', function () {
      $request_handler = new RequestHandlerSeam(new \stdClass);
    });
  }

  public function testShouldFailToConstructARequestHandlerWithANonObjectAsParent() {
    $this->tester->expectException('Exception', function () {
      $request_handler = new RequestHandlerSeam(42);
    });
  }

  public function testShouldConstructARequestHandlerWithANullParent() {
    $request_handler = new RequestHandlerSeam(null);
  }

  public function testShouldConstructARequestHandlerWithARequestHandlerParent() {
    $request_handler_parent = new RequestHandlerSeam();
    $request_handler_child = new RequestHandlerSeam($request_handler_parent);
  }

  public function testShouldThrowAnExceptionWhenARequestIsNotHandled() {
    $request_handler = new RequestHandlerSeam();
    $request = new Request();
    //$request_handler->handle_request($request);
    $this->tester->expectException('CJDennis\ChainOfResponsibility\UnhandledRequestException', function () use ($request_handler, $request) {
      $request_handler->handle_request($request);
    });
  }

  public function testShouldHandleARequest() {
    $request_handler = new RequestHandlerSeam();
    $request_handler->set_can_handle_request();
    $request = new Request();
    $request_handler->handle_request($request);
  }

  public function testShouldPassTheRequestToTheParentToHandle() {
    $request_handler_parent = new RequestHandlerSeam();
    $request_handler_parent->set_can_handle_request();
    $request_handler_child = new RequestHandlerSeam($request_handler_parent);
    $request = new Request();
    $request_handler_child->handle_request($request);
  }
}
