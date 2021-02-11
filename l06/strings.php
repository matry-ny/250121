<?php

echo('TEST');
echo 'Hello world';
echo 'Other Hello world', PHP_EOL;

print 'Smth';
print PHP_EOL;

$g1 = print 'test 123';
var_dump($g1);

$name = 'Dmytro';
echo 'Hello, user with name \'$name\'\n', PHP_EOL;
echo "Hello, user with name \"{$name}\"\n";

$htmlId = 'test';
$nowdoc = <<<'HTML'
<script type="text/javascript">
    document.getElementById('#{$htmlId}').innerHTML;
</script>
HTML;
echo $nowdoc, PHP_EOL;

$heredoc = <<<HTML
<script type="text/javascript">
    document.getElementById('#{$htmlId}').innerHTML;
</script>
HTML;
echo $heredoc, PHP_EOL;
