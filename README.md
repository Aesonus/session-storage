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

By default, session reference used is set to the base level of $_SESSION. This 
can be set to a custom value:

```php
$session = new Session($_SESSION['namespace']);
// Or
$session = new Session();
$session->setup($referenceVar);
```
Note that it can be set to a local reference. Very good for testing.

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
```
phpunit
```
