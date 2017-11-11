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
    $this->assertNull($request_handler->get_successor());
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
    $this->assertNull($request_handler->get_successor());
  }

  public function testShouldConstructARequestHandlerWithARequestHandlerParent() {
    $request_handler_parent = new RequestHandlerSeam();
    $request_handler_child = new RequestHandlerSeam($request_handler_parent);
    $this->assertSame($request_handler_parent, $request_handler_child->get_successor());
  }

  public function testShouldThrowAnExceptionWhenARequestIsNotHandled() {
    $request_handler = new RequestHandlerSeam();
    $request = new Request();
    $this->tester->expectException('CJDennis\ChainOfResponsibility\UnhandledRequestException', function () use ($request_handler, $request) {
      $request_handler->handle_request($request);
    });
  }

  public function testShouldGetTheResponseFromTheRequestHandler() {
    $request_handler = new RequestHandlerSeam();
    $request_handler->set_can_handle_request();
    $request_handler->set_response(42);
    $request = new Request();
    $this->assertSame(42, $request_handler->handle_request($request));
  }

  public function testShouldGetTheResponseFromTheParentRequestHandlerWhenNotHandledByTheChildRequestHandler() {
    $request_handler_parent = new RequestHandlerSeam();
    $request_handler_parent->set_can_handle_request();
    $request_handler_parent->set_response(47);
    $request_handler_child = new RequestHandlerSeam($request_handler_parent);
    $request_handler_child->set_response(42);
    $request = new Request();
    $this->assertSame(47, $request_handler_child->handle_request($request));
  }
}
