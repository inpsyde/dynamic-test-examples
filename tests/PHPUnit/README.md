# PHP unit tests with PHPUnit

This directory contains all PHPUnit test classes for PHP _unit tests_. It's a good practice to use one test class for each code class following the naming schema: `Acme\Domain\Class.php` is tested in `Acme\Domain\ClassTest.php`. Even though, PHPUnit takes care of the auto loading of the `*Test.php` classes within this directory, you should follow the namespaces and PSR-4 directory structure of your source code with the test class arrangement.

## Basic configuration

Each test class extends somehow from the class `PHPUnit_Framework_TestCase`. Every public method in your test class, that starts with `test` in its name, is treated as a _single test_ from PHPUnit.

As we want to avoid side effects between singe test, it's important to clean up configured mocks or other environment stuff after each single test. PHPUnit does this for its internals automatically. For custom configuration you have to declare the methods `setUp()` and `tearDown()` in your test class:

```php

class MyTest extends PHPUnit_Framework_TestCase {

	protected function setUp() {
	
		parent::setUp();
		// do your custom initializing here
	}
	
	protected function tearDown() {
	
		parent::tearDown();
		// do your custom clean up here
	}
}
```

A concrete example for that is the usage of a mocking framework like Mockery: 

```php

class MyTest extends PHPUnit_Framework_TestCase {


	protected function tearDown() {
	
		parent::tearDown();
		Mockery::close();
	}
}
```

The package `inpsyde/monkery-test-case` provides a pre configured test class that does that for you: `MonkeryTestCase\MockeryTestCase` that itself extends `PHPUnit_Framework_TestCase` so you can extend this with your own test class.

