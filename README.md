qub
====
PHP 5.5+ magic mediator and native state transformation utility 

[![Build Status](https://travis-ci.org/jgswift/qub.png?branch=master)](https://travis-ci.org/jgswift/qub)

## Installation

Install via [composer](https://getcomposer.org/):
```sh
php composer.phar require jgswift/qub:dev-master
```

## Description

qub is a relatively simple utility that mediates state machines for any given object

qub constitutes a flexible and non-invasive way to associate potentially disparate (well formed) systems

qub is conceptually similar to the many-to-many or joint-table pattern found in relational database theory

qub adds conceptually barely anything to object-oriented programming in php but has many conceivable applications

qub uses 3 transformations to modify state and they are ASK, TELL, and TRANSLATE respectively

qub provides 4 drivers to run transformations immediately (run-time) or from stored lists (collections/queues/stacks)

qub can mediate both object and arrayaccess magic with comparable performance

## Transformations

Ask - requests state information from mediator

Tell - instructs mediator to update it's internal state

Translate - requests translated information. should always result in identical output given the same arguments

## Usage

This is minimal example of a user being asked what it's name is using the run-time state driver
```php
<?php
class User {
    function getName() {
        return 'Bob';
    }
}

$system = new qub\System(new qub\Driver\Immediate);

$user = $system->mediate(new User);

$name = $user->getName();

var_dump($name); // returns "Bob"
```

Following that, here is an expanded example that also tells the user to update it's own internal state
```php
<?php
class User {
    private $name;

    function getName() {
        return $this->name;
    }

    function setName($name) {
        $this->name = $name;
    }
}

$system = new qub\System(new qub\Driver\Immediate);

$user = $system->mediate(new User);

$user->setName('Bob');

$name = $user->getName();

var_dump($name); // returns "Bob"
```

Most patterns can be addressed using qub, for example the view pattern commonly found in Model-View-Controller
This example relies on the TRANSLATE transformation as view rendering should be identical given the same input
```php
<?php
class UserView {
    function render(User $user) {
        return '<html>';
    }
}

$system = new qub\System(new qub\Driver\Immediate);

$user = new User;

$view = $system->mediate(new UserView);

$html = $view('render',[$user]);

var_dump($html); // returns "<html>"
```
Note: TRANSLATE transformations are mediated by default through __invoke magic for both object and array mediators.

Note: Once PHP adds support for variadic arguments, TRANSLATE magic will be updated accordingly

Note: All of the above examples use the run-time driver, please consult the unit tests for implementation details regarding delayed drivers