<?php

include 'vendor/autoload.php';

$generator = new \RandomLib\Generator([new \RandomExt\Source\Cspan()], new \RandomLib\Mixer\Hash());

// Generate a whole number between 5 and 15.
$randomInt = $generator->generateInt(5, 15);

echo "Random # between 5 and 15: $randomInt\n";

// Generate a whole number between -100 and 100.
$randomInt = $generator->generateInt(-100, 100);

echo "Random # between -100 and 100: $randomInt\n";

// Generate a 32 character string
$randomString = $generator->generateString(32, \RandomLib\Generator::CHAR_ALPHA);

echo "Random 32 character string of letters: $randomString\n";
