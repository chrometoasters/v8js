--TEST--
Test V8::executeString() : Exception clearing test
--SKIPIF--
<?php require_once(dirname(__FILE__) . '/skipif.inc'); ?>
--FILE--
<?php

$v8 = new V8Js(null, array(), array(), false);

var_dump($v8->getPendingException());

$v8->clearPendingException();
var_dump($v8->getPendingException());

$v8->executeString('fooobar', 'throw_0');
var_dump($v8->getPendingException());

$v8->clearPendingException();
var_dump($v8->getPendingException());

?>
===EOF===
--EXPECTF--
NULL
NULL
object(V8JsScriptException)#%d (11) {
  ["message":protected]=>
  string(49) "throw_0:1: ReferenceError: fooobar is not defined"
  ["string":"Exception":private]=>
  string(0) ""
  ["code":protected]=>
  int(0)
  ["file":protected]=>
  string(%d) "%s"
  ["line":protected]=>
  int(10)
  ["trace":"Exception":private]=>
  array(1) {
    [0]=>
    array(6) {
      ["file"]=>
      string(%d) "%s"
      ["line"]=>
      int(10)
      ["function"]=>
      string(13) "executeString"
      ["class"]=>
      string(4) "V8Js"
      ["type"]=>
      string(2) "->"
      ["args"]=>
      array(2) {
        [0]=>
        string(7) "fooobar"
        [1]=>
        string(7) "throw_0"
      }
    }
  }
  ["previous":"Exception":private]=>
  NULL
  ["JsFileName":protected]=>
  string(7) "throw_0"
  ["JsLineNumber":protected]=>
  int(1)
  ["JsSourceLine":protected]=>
  string(7) "fooobar"
  ["JsTrace":protected]=>
  string(57) "ReferenceError: fooobar is not defined
    at throw_0:1:1"
}
NULL
===EOF===