<?php
require_once '../vendor/autoload.php';

use Tests\TestClass;
use Tests\TestClass2;
use Tests\TestClass3;
use Tests\TestClass4;

$class = new TestClass;
$class2 = new TestClass2;
$class3 = new TestClass3;
$class4 = new TestClass4;

echo " <br> ===================================================================================================================== <br>";
echo " TEST 1 (TestClass.php) : Set and Get valid parameter";
echo " <br> ===================================================================================================================== <br><br>";

$class->setParamA("Modified value A :)");
echo $class->getParamA() . '<br>';
echo $class->getParamB() . '<br>';
echo $class->getParamC();


echo '<br><br>';
echo " <br> ===================================================================================================================== <br>";
echo " TEST 2 (TestClass.php) : Set invalid parameter";
echo " <br> ===================================================================================================================== <br><br>";

try {
        echo $class->setParamZ('value');
} catch (\Exception $e) {
        echo '<b>Error Message:</b> '. $e->getMessage() . '<br>';
        echo '<b>Error Code:</b> ' . $e->getCode();
}



echo '<br><br>';
echo " <br> ===================================================================================================================== <br>";
echo " TEST 3 (TestClass.php) : Get invalid parameter";
echo " <br> ===================================================================================================================== <br><br>";

try {
        echo $class->getParamZ();
} catch (\Exception $e) {
        echo '<b>Error Message:</b> '. $e->getMessage(). '<br>';
        echo '<b>Error Code:</b> ' . $e->getCode();
}



echo '<br><br>';
echo " <br> ===================================================================================================================== <br>";
echo " TEST 4 (TestClass2.php) : Set and Get valid parameter (included in the list: \$AGS_GETTERS_SETTERS = [])";
echo " <br> ===================================================================================================================== <br><br>";

$class2->setParamA("Modified value A :)");
echo $class2->getParamA() . '<br>';



echo '<br><br>';
echo " <br> ===================================================================================================================== <br>";
echo " TEST 5 (TestClass2.php) : Set invalid parameter (not included int the list: \$AGS_SETTERS = [])";
echo " <br> ===================================================================================================================== <br><br>";

try {
        $class2->setParamB("Modified value B :)");
} catch (\Exception $e) {
        echo '<b>Error Message:</b> '. $e->getMessage(). '<br>';
        echo '<b>Error Code:</b> ' . $e->getCode() . '<br>';
}



echo '<br><br>';
echo " <br> ===================================================================================================================== <br>";
echo " TEST 6 (TestClass2.php) : Get valid parameter (included int the list: \$AGS_GETTERS = [])";
echo " <br> ===================================================================================================================== <br><br>";

echo $class2->getParamB() . '<br>';



echo '<br><br>';
echo " <br> ===================================================================================================================== <br>";
echo " TEST 7 (TestClass2.php) : Set valid parameter (included int the list: \$AGS_SETTERS = [])";
echo " <br> ===================================================================================================================== <br><br>";

$class2->setParamC("Modified value C :)");
echo 'ok';



echo '<br><br>';
echo " <br> ===================================================================================================================== <br>";
echo " TEST 8 (TestClass2.php) : Get invalid parameter (not included int the list: \$AGS_GETTERS = [])";
echo " <br> ===================================================================================================================== <br><br>";

try {
        echo $class2->getParamC();
} catch (\Exception $e) {
        echo '<b>Error Message:</b> '. $e->getMessage(). '<br>';
        echo '<b>Error Code:</b> ' . $e->getCode() . '<br>';
}




echo '<br><br>';
echo " <br> ===================================================================================================================== <br>";
echo " TEST 9 (TestClass3.php) : Convert all values to array, object and json";
echo " <br> ===================================================================================================================== <br><br>";

$class3->setParamA("Modified value A :)")
        ->setParamB("Modified value B :)")
        ->setParamC("Modified value C :)");

echo '->toArray() <br>';
echo '<pre>';
var_dump($class3->toArray());
echo '</pre>';

echo '<br><br>->toObject([\'paramB\']) <br>';
echo '<pre>';
var_dump($class3->toObject(['paramB']));
echo '</pre>';

echo '<br><br>->toJson() <br>';
echo '<pre>';
echo $class3->toJson();
echo '</pre>';



echo '<br><br>';
echo " <br> ===================================================================================================================== <br>";
echo " TEST 10 (TestClass4.php) : Override methods";
echo " <br> ===================================================================================================================== <br><br>";


$class4->setParamA("my text");

echo $class4->getParamA() . '<br>';
echo $class4->getParamB();
