<?php

$int = 1;
$float = 1.002;
$string = 'test';
$bool = true;
//$bool = false;
$array = [1, 2, 'test'];
$object = new stdClass();
$null = null;

$file = fopen(__DIR__ . '/math.php', 'rb');
fclose($file);

$callable = static function () {
};

var_dump((string)1.002);
var_dump((int)'521.7');
var_dump((float)'521.7');
var_dump((int)' 521 eggs');
var_dump((int)'eggs 521');
var_dump((int)true);
var_dump((int)false);
var_dump((bool)'');
var_dump((bool)'0');
var_dump((bool)0);
var_dump((bool)[]);
var_dump((bool)'test');
var_dump((bool)'1');
var_dump((bool)1);
var_dump((bool)[1]);

var_dump(is_float(1.1));
var_dump(is_int(1));
var_dump(is_string('1'));
var_dump(is_bool(false));
var_dump(is_array([1]));
var_dump(is_object(new stdClass()));
var_dump(is_numeric('1'));

$t123 = 12;
var_dump(isset($t123));

var_dump(empty(0));

echo null, PHP_EOL;
echo false, PHP_EOL;

print null;
print false;
echo PHP_EOL;

var_dump(null);
var_dump(false);
var_dump(new stdClass());
var_dump($file);
