<?php

namespace Tests;

use JocelimJr\AutoGettersAndSetters;

class TestClass
{
    use AutoGettersAndSetters;

    private string $paramA = 'Default value A';
    private string $paramB = 'Default value B';
    private string $paramC = 'Default value C';

}