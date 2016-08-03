# Inpsyde – Dynamic test examples

This repositories shows examples on dynamic software testing (at the moment only for PHP _unit tests_). It focuses on the setup, configuration and basic usage of the important testing tools like PHPUnit and Mockery. The code examples are however a bit synthetic or hokey, so don't use the code as role model for proper OOP design. They might be replaced by better, real world examples some times.

The repository is used to support the introduction of people to practical software testing by showing concrete examples.

## Table Of Contents

* [Installation](#installation)
* [Usage](#usage)
* [PHP tests](#php-tests)
* [Crafted by Inpsyde](#crafted-by-inpsyde)
* [License](#license)
* [Contributing](#contributing)

## Installation

Create a local copy of this repository by check out via git:

```
~$ git clone git@github.com:inpsyde/dynamic-test-examples.git
```

Change to the directory and run composer:

```
~$ cd dynamic-test-examples
dynamic-test-examples$ composer install
```

## Usage

Run PHPUnit _unit tests_ (from within the project directory): 

```
$ vendor/bin/phpunit
```

## PHP tests

In this repository we want to show the setup of plain _unit tests_ that runs _in isolation_ of any dependency where the tested components solely act with _mocks and stubs_ as well as the setup of a system test, that actually bootstraps the WordPress core to run tests against a real working system (system tests).

### General setup

The central framework to set up dynamic PHP tests (unit or system tests) with is [PHPUnit](https://phpunit.de/). Therefore it's required as a «dev-dependency» via composer:

```
$ composer require phpunit/phpunit --dev --prefer-dist
```

In the `composer.json`:

```
"require-dev": {
	"phpunit/phpunit": "^5.4",
}
```

#### Unit tests


For unit tests, we choose [Mockery](http://docs.mockery.io/en/latest/) as mocking framework for classes and [BrainMonkey](https://brain-wp.github.io/BrainMonkey/) as an extension of mockery to mock functions. It also comes with pre-configured mocks of the WordPress action and filter functions. Both packages are combined and pre-configured in [`inpsyde/monkery-test-case`](https://github.com/inpsyde/monkery-test-case) which is therefore our next dev-dependency:

```
$ composer require inpsyde/monkery-test-case --dev --prefer-dist
```

In the `composer.json`:

```json
"require-dev": {
	"phpunit/phpunit": "^5.4",
	"inpsyde/monkery-test-case": "^2.0"
}
```

The PHPUnit configuration for unit tests should be stored within the `phpunit.xml.dist` file. The file `phpunit.xml` should be listed in `.gitignore` to allow locally overwrite the default test configuration. Normally, the the bootstraping process of PHP unit tests is simply to include the composer autoload file. Thus it can be mentioned directly in the PHPUnit XML declaration:

```xml
<?xml version="1.0" encoding="UTF-8"?>
<phpunit
	bootstrap="vendor/autoload.php"
    <!-- ... -->
>
	<!-- ... -->
</phpunit>
```

#### System tests

@todo


## Crafted by Inpsyde

The team at [Inpsyde](http://inpsyde.com) is engineering the Web since 2006.

## License

Copyright (c) 2016 David Naber, Inpsyde

Good news, this plugin is free for everyone! Since it's released under the [MIT License](LICENSE) you can use it free of charge on your personal or commercial website.

## Contributing

All feedback / bug reports / pull requests are welcome.