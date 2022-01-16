# Auto Getters and Setters

Auto getters and setters.

## Basic Usage

```php
use JocelimJr\AutoGettersAndSetters;

class MyClass
{
    use AutoGettersAndSetters;

    private ?string $parameterA = null;
    private ?string $parameterB = null;
}

// Init object
$myClass = new MyClass;

// Set values
$myClass->setParameterA('Value A');
$myClass->setParameterB('Value B');

// Get Values
echo $myClass->getParameterA();
echo $myClass->getParameterB();
```

## Advanced usage

```php
<?php
use JocelimJr\AutoGettersAndSetters;

class MyClass
{
    use AutoGettersAndSetters;

    private $AGS_GETTERS_SETTERS = [
        'parameterA'
    ];

    private $AGS_GETTERS = [
        'parameterB'
    ];

    private $AGS_SETTERS = [
        'parameterC'
    ];

    private ?string $parameterA = null;
    private ?string $parameterB = null;
    private ?string $parameterC = null;
}

// Init object
$myClass = new MyClass;

// Set values
$myClass->setParameterA('Value A');     // Ok
$myClass->setParameterB('Value B');     // Error (MethodNotAccessibleException)
$myClass->setParameterC('Value C');     // Ok

// Get Values
echo $myClass->getParameterA();         // Ok
echo $myClass->getParameterB();         // Ok
echo $myClass->getParameterC();         // Error (MethodNotAccessibleException)
```

## Convert Data

```php
<?php
use JocelimJr\AutoGettersAndSetters;
use JocelimJr\ConvertData;

class MyClass
{
    use AutoGettersAndSetters, ConvertData;

    private $AGS_HIDDEN_PARAMETERS = [
        'parameterA'
    ];

    private ?string $parameterA = null;
    private ?string $parameterB = null;
    private ?string $parameterC = null;
}

// Init object
$myClass = new MyClass;

// Set values
$myClass->setParameterA('Value A');
$myClass->setParameterB('Value B');
$myClass->setParameterC('Value C');


var_dump($myClass->toArray());

array(2) {
  ["parameterB"]=>
  string(19) "Value B"
  ["parameterC"]=>
  string(19) "Value C"
}

var_dump($myClass->toObject(['parameterB']));

object(stdClass)#6 (1) {
  ["parameterC"]=>
  string(19) "Value C"
}

echo $myClass->toJson();

{"parameterB": "Value B", "parameterC": "Value C"}

```
