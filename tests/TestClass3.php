<?php

namespace Tests;

use JocelimJr\AutoGettersAndSetters;
use JocelimJr\ConvertData;

class TestClass3
{
    use AutoGettersAndSetters, ConvertData;

    private array $AGS_HIDDEN_PARAMETERS = [
        'paramA'
    ];

    private string $paramA = 'Default value A';
    private string $paramB = 'Default value B';
    private string $paramC = 'Default value C';
}