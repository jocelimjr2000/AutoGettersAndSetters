<?php

namespace Tests;

use JocelimJr\AutoGettersAndSetters;

class TestClass4
{
    use AutoGettersAndSetters;

    private string $paramA = 'Default value A';
    private string $paramB = 'Default value B';
    private string $paramC = 'Default value C';
    
    public function setParamA($value)
    {
        $this->paramA = 'Overridden setParamA() - Value: <b>' . $value . ' </b>';
    }

    public function getParamB()
    {
        return 'Overridden getParamB()';
    }

}