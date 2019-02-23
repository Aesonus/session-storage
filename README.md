[![Build Status](https://travis-ci.org/Aesonus/session-storage.svg?branch=master)](https://travis-ci.org/Aesonus/session-storage)

# Session Storage

Allows for access to session superglobal with a fluent interface

## Installation

```
composer require aesonus/session-storage
```

## Usage

Instantiate a new instance:

```php
$session = new Session();
```

Set the key before setting, getting, or clearing data:

```php
$session->setKey('foo')->set('bar');
```

Set, get, or clear multiple keys' values using the fluent interface:

```php
$value = $session
    ->setKey(0)->set('foo')
    ->setKey(1)->set('bar')
    ->setKey('clearme')->clear();
    ->setKey('getme')->get();
```

Refer to PHP Docs and tests for more information.

## Tests

Require dev dependencies then run the following:
```
./vendor/bin/phpunit
```
