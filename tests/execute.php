<?php
require_once '../vendor/autoload.php';

use Tests\TestClass;
use Tests\TestClass2;

$class = new TestClass;
$class2 = new TestClass2;

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