<?php

namespace Tests;

use JocelimJr\AutoGettersAndSetters;

class TestClass2
{
    use AutoGettersAndSetters;

    private $AGS_GETTERS_SETTERS = [
        'paramA'
    ];

    private $AGS_GETTERS = [
        'paramB'
    ];

    private $AGS_SETTERS = [
        'paramC'
    ];

    private string $paramA = 'Default value A';
    private string $paramB = 'Default value B';
    private string $paramC = 'Default value C';

}